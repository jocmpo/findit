<?php

$user_id = $_SESSION['user_id'];
$photo = 'css/img/user.png';

// Fetch the current profile picture and name from the database
$query = "SELECT photo, name FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($db_picture, $name);
if ($stmt->fetch() && $db_picture) {
    $photo = $db_picture;
}
$stmt->close();

?>

<nav class="navbar">
    <div class="navbar-left">
        <a onclick="openNav()" class="navbar-link"><img src="css/img/menu.svg"></a>
    </div>
    <div id="mySidenav" class="sidenav">
        
        <div class="sidehead">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="profile.php">
                <img src="<?php echo htmlspecialchars($photo); ?>" alt="Profile Picture" class="profile-photo">
            </a>
        </div>

        <h3 class="user-name" style="text-align: center;">
            <a href="profile.php" style="text-decoration: none; color: inherit;">
                <?php echo isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']) : 'Guest'; ?>
            </a>
        </h3>
</div>
        <div class="sidecon">
            <a href="faq.php">FAQ</a>
            <a href="about.php">About Us</a>
            <a href="inquiry.php">Contact Us</a>
            <a href="terms.php">Terms & Privacy Policy</a>
            <div class="logout">
                <a href="logout.php"><i class="fa fa-arrow-circle-left"></i> Logout</a>
            </div>
        </div>

    </div>
    <div class="navbar-right">
        <ul class="navbar-links">
            <li><a href="dashboard.php" class="navbar-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>" id="home"><i class="fa fa-home"></i></a></li>
            <li><a href="post_item.php" class="navbar-link <?php echo basename($_SERVER['PHP_SELF']) == 'post_item.php' ? 'active' : ''; ?>" id="post"><i class="fa fa-pencil-square"></i></a></li>
            <li><a href="search.php" class="navbar-link <?php echo basename($_SERVER['PHP_SELF']) == 'search.php' ? 'active' : ''; ?>" id="search"><i class="fa fa-search"></i></a></li>
            <li><a href="notification.php" class="navbar-link <?php echo basename($_SERVER['PHP_SELF']) == 'notification.php' ? 'active' : ''; ?>" id="notif"><i class="fa fa-bell"></i></a></li>
            <li><a href="chat.php" class="navbar-link <?php echo basename($_SERVER['PHP_SELF']) == 'chat.php' ? 'active' : ''; ?>" id="chat"><i class="fa fa-comment"></i></a></li>
        </ul>
    </div>

</nav>
<link rel="stylesheet" href="css/web_navbar.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.3)";
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "rgba(244, 244, 244)";
    }
</script>

<style>
    
    .navbar {
    display: none;
}

@media (min-width: 700px) {

/* Navbar Styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #4b84ff;
    padding: 10px 20px;
    top: 0;
    z-index: 1000;
    /* Ensure it stays on top of other content */
    width: 100%;
    position: fixed;
    /* Fixed position for the navbar */
    left: 0;
    right: 0;
    box-sizing: border-box;
    /* Prevents padding from affecting width */
}

/* Left side - Home Icon */
.navbar-left {
    display: flex;
    align-items: center;
}

.navbar-link {
    text-decoration: none;
    color: #ffffff;
    font-size: 15px;
    padding: 8px 15px;
    transition: background-color 0.3s ease;
}

.navbar-link:hover {
    background-color: #296dff;
    /* Highlighted color */
    border-radius: 8px;
}

/* Center - Navbar Links */
.navbar-center {
    flex-grow: 1;
    text-align: center;
}

.navbar-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
}

.navbar-links li {
    margin: 0 15px;
}

.navbar-link.active {
    background-color: #296dff;
    color: #ffffff;
    border-radius: 8px;
}

/* Right side - Settings Icon and Dropdown */
.navbar-right {
    display: flex;
    align-items: center;
}

.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 30px;
    right: 0;
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    min-width: 150px;
}

.dropdown-content a {
    color: #14171a;
    padding: 10px 15px;
    text-decoration: none;
    display: block;
    font-size: 14px;
}

.dropdown-content a:hover {
    background-color: #e8f5fe;
    color: #1da1f2;
}

.dropdown:hover .dropdown-content {
    display: block;
}

}

</style>