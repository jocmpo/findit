<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lost & Found Platform</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/background.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="maincontainer">
        <div>
            <span class="maintitle">Welcome to Lost & Found Platform!</span></br>
            <span class="mainsub">Your go-to platform for finding lost items.</span><br>
            <button><a href="auth.php">Come Join Us!</a></button>
        </div>
    </div>
    <div class="desccontain">
        <img src="css/img/index-1.png" id="indexpic1"><br>
        <h3 class="desctitle">YOU FOUND US!</h3><br>
        <p class="desctext1">
        Welcome to LnF, the platform to help reunite lost items with their owners. Report, search, and claim lost items easily. Let us help you reconnect with what’s important!
        </p>
    </div>
    <div class="desccontain">
        <div>
            <img src="css/img/index-2.png" id="indexpic2">
        </div>
        <div class="desctext2">
            <h3 class="desctitle2">POST A LOST ITEM</h3>
            <p>
                Lost an item? Make a post about it. Find a picture of your lost item, add a description and where you
                last saw it.
            </p>
        </div>
    </div>
    <div class="desccontain">
        <div>
            <h3 class="desctitle2">FOUND A LOST ITEM?</h3>
            <p class="desctext2">
                You may come across a lost item where you go
            </p>
        </div>
        <div>
            <img src="css/img/index-3.png" id="indexpic3">
        </div>
        <div>
            <img src="css/img/index-4.png" id="indexpic4">
        </div>
        <div>
            <h3 class="desctitle2">TELL THE OWNER</h3>

            <p class="desctext2">
                Give the owner a message! Tell them where you last saw the missing item.
            </p>
        </div>
    </div>

    <div class="desccontain">
        <div>

            <img src="css/img/index-5.png" id="indexpic5">
        </div>
        <div>
            <h3 class="desctitle2">FIND WHATS LOST IN YOUR AREA</h3>
            <p class="desctext2">
                Sniff out any lost items nearby with the help of LnFs location system.
            </p>
        </div>
    </div>


    <div class="profile-container">
        <div class="profile">
            <div class="profile-img">
                <img src="css/img/profile1.jpg" alt="Profile 1">
            </div>
            <div class="profile-info">
                <p><strong>Name:</strong> Gavin Marty Del Val</p>
                <p><strong>Nickname:</strong> "Fakefoureyes"</p>
                <p><strong>Email:</strong> john.doe@example.com</p>
            </div>
        </div>
        <div class="profile">
            <div class="profile-img">
                <img src="css/img/profile2.jpg" alt="Profile 2">
            </div>
            <div class="profile-info">
                <p><strong>Name:</strong> Joan Mae Ocampo</p>
                <p><strong>Nickname:</strong>"JM"</p>
                <p><strong>Email:</strong> jane.smith@example.com</p>
            </div>
        </div>
        <div class="profile">
            <div class="profile-img">
                <img src="css/img/profile3.jpg" alt="Profile 3">
            </div>
            <div class="profile-info">
                <p><strong>Name:</strong> Shiena Mae Miranda</p>
                <p><strong>Nickname:</strong> "Mai"< /p>
                        <p><strong>Email:</strong> mirandamimai984@gmail.com</p>
            </div>
        </div>
    </div>
</body>

</html>