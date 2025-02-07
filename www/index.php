<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start();

include('includes/db.php');
if (!isset($_SESSION['user'])) {
    include('navbar.php');
}else{
    include('web_navbar.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Platform</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" media="screen and (min-width: 900px)" href="css/widescreen.css">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="css/smallscreen.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<!-- WOW.js (for animations) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script>
    new WOW().init();
</script>

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
        <h2 class="desctitle">YOU FOUND US!</h2><br>
        <div class="desctext1">
            <p>
            Welcome to LnF, your go-to platform for reuniting lost items with their owners. Easily report, search, or claim lost belongings through our secure and user-friendly website, connecting you with your community to recover what matters.
            </p>
            <p class="descsub">
                Start your search or report a found item today, and
                let us help you reconnect with what you've lost!
            </p>
        </div>
    </div>
    <div class="desccontain">
        <div>
            <img src="css/img/index-2.png" class="indexpic2">
        </div>
        <div class="desctext2">
            <h2 class="desctitle2">POST A LOST ITEM</h2>
            <p>
            Lost an item? Don't worry—make a post about it! Upload a picture, provide a detailed description, and mention where you last saw it. The more details you share, the better the chances of someone recognizing and returning it to you.
            </p>
        </div>
    </div>
    <div class="desccontain">
        <div>
            <img src="css/img/index-3.png" class="indexpic2">
        </div>
        <div>
            <h2 class="desctitle2">FOUND A LOST ITEM?</h2>
            <p class="desctext2">
            You may come across a lost item anywhere you go—a dropped wallet, a missing ID, or even a misplaced phone. If you find something that seems important to someone, take a moment to report it. Your small act of kindness could help reunite it with its rightful owner.
            </p>
        </div>
    </div>
    <div class="desccontain">
        <div>
            <img src="css/img/index-4.png" class="indexpic2">
        </div>
        <div>
            <h2 class="desctitle2">TELL THE OWNER</h2>
            <p class="desctext2">
            Give the owner a message and let them know where you last saw the missing item. Providing details about the location, time, and any other helpful information can make a big difference in helping them retrieve what they lost. A small effort from you could mean a lot to someone searching for their belongings.
            </p>
        </div>
    </div>

    <div class="desccontain">
        <div>
            <img src="css/img/index-5.png" class="indexpic2">
        </div>
        <div>
            <h2 class="desctitle2">WHAT'S LOST NEAR YOU?</h2>
            <p class="desctext2">
            Sniff out any lost items nearby using LnF’s location system, making it easier to track down missing belongings and reunite them with their owners. Keep an eye out and help bring lost items back where they belong!
            </p>
        </div>
    </div>

  <!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1>Developers</h1>
        </div>
        <div class="row g-5 justify-content-center">  <!-- Increased spacing -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative rounded overflow-hidden mb-4">  <!-- Added bottom margin -->
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="css/img/profile1.png" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Gavin Marty Del Val</h5>
                        <p class="text-primary"></p>
                        <div class="team-social text-center">
                            <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item position-relative rounded overflow-hidden mb-4">  <!-- Added bottom margin -->
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="css/img/profile2.jpg" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Joan Mae Ocampo</h5>
                        <p class="text-primary"></p>
                        <div class="team-social text-center">
                            <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item position-relative rounded overflow-hidden mb-4">  <!-- Added bottom margin -->
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="css/img/profile3.png" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Shiena Mae Miranda</h5>
                        <p class="text-primary"></p>
                        <div class="team-social text-center">
                            <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

<script>
    function toggleLinks(element) {
        let links = element.parentElement.nextElementSibling.querySelector(".social-links");
        if (links.style.display === "none" || links.style.display === "") {
            links.style.display = "block";
        } else {
            links.style.display = "none";
        }
    }
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    function revealOnScroll() {
        const sections = document.querySelectorAll(".desccontain");

        sections.forEach((section) => {
            const sectionTop = section.getBoundingClientRect().top;
            const triggerBottom = window.innerHeight * 0.85;

            if (sectionTop < triggerBottom) {
                section.classList.add("show");
            }
        });
    }

    // Run on scroll
    window.addEventListener("scroll", revealOnScroll);

    // Run on page load (in case some sections are already in view)
    revealOnScroll();
});
</script>

</body>
</html>


    <?php include('includes/footer.php'); ?>
