<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start();
include('includes/db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');  
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch notifications from the database
$query = "SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die('MySQL prepare statement failed: ' . $conn->error);  // If the query fails, output error
}
// Fetch the count of unread notifications
$query_unread = "SELECT COUNT(*) FROM notifications WHERE user_id = ? AND is_read = 0";
$stmt_unread = $conn->prepare($query_unread);

if ($stmt_unread === false) {
    die('MySQL prepare statement failed: ' . $conn->error);  // If the query fails, output error
}

$stmt_unread->bind_param("i", $user_id);
$stmt_unread->execute();
$stmt_unread->bind_result($unread_count);
$stmt_unread->fetch();
$stmt_unread->close();

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Notifications</title>
    <link rel="stylesheet" href="css/notification.css">
    <link rel="stylesheet" href="css/no_message.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include('web_navbar.php'); ?>
    <div class="container">

        <?php if ($result && $result->num_rows > 0): ?>
    <ul class="notification-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <li class="notification-item">
                <?php if ($row['notification_type'] == 'message'): ?>
                    <!-- If it's a message notification, wrap the header in a link -->
                    <p class="notification-header">
                        <a href="chat.php?user_id=<?php echo $row['sender_id']; ?>" class="notification-header">
                            <?php echo htmlspecialchars($row['message']); ?>
                        </a>
                    </p>

                <?php elseif ($row['notification_type'] == 'post'): ?>

                    <!-- If it's a post notification, link to the item detail page -->
                    <p class="notification-header">
                        <a href="item_detail.php?item_id=<?php echo $row['item_id']; ?>" class="notification-header">
                        <?php echo htmlspecialchars($row['message']); ?>
                        </a>
                    </p>
                <?php endif; ?>
                
                <p class="notification-date">Posted on: <?php echo $row['created_at']; ?></p>
                
                <?php if ($row['is_read'] == 0): ?>
                    <span class="new-notification">(New)</span>
                <?php endif; ?>

                <br>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p class="no-items-message">No notifications found.</p>
<?php endif; ?>

        

</body>
</html>
<?php
include 'includes/footer.php';
?>

