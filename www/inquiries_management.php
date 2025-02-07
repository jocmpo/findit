<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start();
include('includes/db.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: auth.php");
    exit();
}

// Handle reply submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message_id = $_POST['message_id']; // The message to reply to
    $sender_id = 1; // Admin's ID (assuming admin has user_id = 1)
    $recipient_id = $_POST['sender_id']; // The user who sent the original message
    $message = mysqli_real_escape_string($conn, $_POST['reply_message']); // Admin's reply

    // Insert the reply into the messages table
    $query = "INSERT INTO messages (sender_id, recipient_id, message, timestamp) VALUES (?, ?, ?, NOW())";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "iis", $sender_id, $recipient_id, $message);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success'] = "Reply sent to the user!";
        } else {
            $_SESSION['error'] = "Failed to send reply. Please try again.";
        }
        mysqli_stmt_close($stmt);
    }
}

// Fetch all messages sent to the admin
$query = "SELECT messages.id, users.name, messages.message, messages.timestamp, messages.sender_id 
          FROM messages JOIN users ON messages.sender_id = users.id WHERE recipient_id = 1 ORDER BY messages.timestamp DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Queries</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2><img src="assets/img/logo.png" alt="" width="80" height="80">Lost and Found</h2>
        <ul>
            <li><a href="admin_dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp; Dashboard</a></li>
            <li><a href="user_management.php"><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp; Users</a></li>
            <li><a href="chat_management.php"><i class="fa fa-comments"></i>&nbsp;&nbsp;&nbsp; Messages</a></li>
            <li><a href="item_management.php"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;&nbsp; Records</a></li>
            <li><a href="inquiries_management.php"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;&nbsp; Inquiries</a></li>
            <li><a href="report_management.php"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp; Reports</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp; Logout</a></li>
        </ul>
    </div>

    <div class="dashboard-container">
        <h1>Customer Queries</h1>

    <!-- Display success/error messages -->
    <?php
    if (isset($_SESSION['success'])) {
        echo "<div class='success' id='success-msg'>" . $_SESSION['success'] . "</div>";
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo "<div class='error' id='error-msg'>" . $_SESSION['error'] . "</div>";
        unset($_SESSION['error']);
    }
    ?>

    <!-- Display all messages -->
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        
        <div class="message">
        <div class="message-header">
            <p> <i class="fas fa-user-circle"></i> <strong><?php echo htmlspecialchars($row['name']); ?></strong></p>
        </div>
        <div class="message-body">
            <p><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
        </div>
        <small style="font-size: 0.8em; color: grey;"><?php echo date("F j, Y, g:i a", strtotime($row['timestamp'])); ?></small>

    <!-- Reply form -->
    <form action="inquiries_management.php" method="POST">
        <textarea name="reply_message" rows="3" placeholder="Your reply" required></textarea><br>
        <input type="hidden" name="message_id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="sender_id" value="<?php echo $row['sender_id']; ?>">
        <button type="submit" class="send-reply-btn">Send Reply</button>
    </form>
</div>

    <?php endwhile; ?>

    <script>
// JavaScript to hide success and error messages after 2 seconds
window.onload = function() {
    setTimeout(function() {
        const successMsg = document.getElementById('success-msg');
        const errorMsg = document.getElementById('error-msg');
        
        // Add grey background before hiding
        if (successMsg) {
            successMsg.style.backgroundColor = '#d3d3d3'; // Grey background for success
            successMsg.style.display = 'none';
        }
        if (errorMsg) {
            errorMsg.style.backgroundColor = '#d3d3d3'; // Grey background for error
            errorMsg.style.display = 'none';
        }
    }, 1000);
};

</script>
</body>
</html>
