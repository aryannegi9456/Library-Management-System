<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Managemnet System</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<style type="text/css">
    body {
        padding-bottom: 50px;
        background-color: rgb(246, 126, 0);
    }

    .zoom-underline {
        display: inline-block;
        font-size: 20px;
        text-decoration: none;
        position: relative;
        color: black;
        transition: font-size 0.3s, text-decoration 0.3s;
    }

    .zoom-underline:hover {
        font-size: 24px;
        text-decoration: underline;
    }

    #framer-row a:hover {
        color: white;
        transition: all ease 1s;
        border-radius: 5px;
        text-decoration: underline;
    }

    #framer5 img {
        height: 200px;
    }

    #framer6 h2 {
        font-family: sans-serif;
        font-size: 48px;
        font-weight: 700;
        text-align: center;
        color: rgb(0, 48, 73);
    }


    #framer7 p {
        font-family: sans-serif;
        line-height: 1.5em;
        text-align: center;
        color: rgb(0, 48, 73);
    }

    #framer8 {
        background-color: red;
        margin: 0 auto;
        width: 170px;
        height: 60px;
        border-radius: 8px;
    }

    #framer8 a {
        font-family: sans-serif;
        font-size: 19px;
        font-weight: 700;
        position: relative;
        color: black;
        text-decoration: none;
    }

    #framer8 a::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 2px;
        background: #e4e4e4;
        border-radius: 5px;
        transform: translateY(10px);
        opacity: 0;
        transition: .5s;
    }

    #framer8 a:hover::after {
        transform: translateY(0px);
        opacity: 1;
    }

    #social-icons a i {
        font-size: 22px;
        color: black;
        margin-right: 10px;
        transition: .5s ease;
    }

    #social-icons a:hover i {
        transform: scale(1.2);
    }

</style>

<body>
    
<header>
    <nav class="navbar navbar-expand-sm bg-black navbar-dark">
        <div class="container">
            <h2 class="navbar-brand"><i class='bx bx-library'></i>LibraTrak <br>Library</h2>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mynav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <?php
            if(isset($_SESSION['login_user']))
            {
                echo '<div class="collapse navbar-collapse" id="mynav">';
                echo '<ul class="navbar-nav">';
                echo '<li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="books.php">Books</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                echo '</ul>';
                echo '<div class="navbar-text ms-auto text-white">';
                echo '<img class="rounded-circle" style="height: 30px; width: 30px; margin-right: 5px;" src="p.jpg" alt="display pic">';
                echo $_SESSION['login_user'].'</div>';
                echo '</div>';
            }
            else
            {
                ?>

<div class="collapse navbar-collapse" id="mynav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="books.php">Books</a></li>
        <li class="nav-item"><a class="nav-link" href="student.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>
    </ul>
</div>
                        <?php

                    }
                ?>
            </div>
        </nav>
    </header>

    <section class="container-fluid" style="background-color: rgb(246, 126, 0);">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h2
                style="font-family: sans-serif; font-size: 65px; font-weight: 700; text-align: center; color: rgb(0, 48, 73)">
                Unlock the Power of Organized Records</h2>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3
                    style="font-family: sans-serif; font-size: 20px; font-weight: 700; line-height: 1.5em; text-align: center; letter-spacing: -0.025em; margin: 10px;">
                    No more lost books or chasing late returns! LibraTrak makes it effortless for students to track
                    their library records.
                </h3>
                <img src="image2.png" alt="" style="margin: 10px;">
                <h3
                    style="font-family: sans-serif; font-size: 20px; font-weight: 700; line-height: 1.5em; text-align: center; letter-spacing: -0.025em; margin: 10px;">
                    With an intuitive dashboard, administrators can now manage library operations with a few clicks.
                </h3>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-wrap" id="framer-row">
            <div class="d-flex justify-content-center">
                <div class="framer2 mb-4"
                    style="width: 320px; height: 350px; background-color: rgb(255, 140, 16); border-radius: 15px; display: flex; flex-direction: column;">
                    <div class="f1"
                        style="width: 280px; height: 200px; background-color: rgb(246, 126, 0); margin: 20px; border-radius: 15px; display: flex; justify-content: center; align-items: center;">
                        <img style="height: 190px;" src="image3.png" alt="">
                    </div>
                    <h3
                        style="padding-left: 20px; padding-top: -200px; font-family: sans-serif; font-weight: 700; line-height: 1.5em; text-align: left; font-size: 20px;">
                        <a href="student.php" class="zoom-underline">Students</a>
                    </h3>
                    <p
                        style="padding-top: 10px; padding-left: 20px; font-family: sans-serif; font-size: 14px; line-height: 1em; text-align: left;">
                        Library records harmony</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="framer2 mb-4"
                    style="width: 320px; height: 350px; background-color: rgb(255, 140, 16); border-radius: 15px; display: flex; flex-direction: column;">
                    <div class="f1"
                        style="width: 280px; height: 200px; background-color: rgb(246, 126, 0); margin: 20px; border-radius: 15px; display: flex; justify-content: center; align-items: center;">
                        <img style="height: 190px;" src="image4.png" alt="">
                    </div>
                    <h3
                        style="padding-left: 20px; padding-top: -200px; font-family: sans-serif; font-weight: 700; line-height: 1.5em; text-align: left; font-size: 20px;">
                        <a href="student.php" class="zoom-underline">Administrators</a>
                    </h3>
                    <p
                        style="padding-top: 10px; padding-left: 20px; font-family: sans-serif; font-size: 14px; line-height: 1em; text-align: left;">
                        Streamlined Operations</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="framer2 mb-4"
                    style="width: 320px; height: 350px; background-color: rgb(255, 140, 16); border-radius: 15px; display: flex; flex-direction: column;">
                    <div class="f1"
                        style="width: 280px; height: 200px; background-color: rgb(246, 126, 0); margin: 20px; border-radius: 15px; display: flex; justify-content: center; align-items: center;">
                        <img style="height: 190px;" src="image5.png" alt="">
                    </div>
                    <h3
                        style="padding-left: 20px; padding-top: -200px; font-family: sans-serif; font-weight: 700; line-height: 1.5em; text-align: left; font-size: 20px;">
                        <a href="" class="zoom-underline">Progress</a>
                    </h3>
                    <p
                        style="padding-top: 10px; padding-left: 20px; font-family: sans-serif; font-size: 14px; line-height: 1em; text-align: left;">
                        Track and analyze</p>
                </div>
            </div>
        </div>
        <div id="framer5" class="d-flex justify-content-center align-items-center">
            <img src="image6.png" alt="">
        </div>
        <div id="framer6" class="d-flex justify-content-center align-items-center">
            <h2>Get Started</h2>
        </div>
        <div id="framer7" class="d-flex justify-content-center align-items-center">
            <p>Take control of your library ecosystem today. Sign up and watch LibraTrack revoultionize your
                record-keeping and library management</p>
        </div>
        <div id="framer8" class="d-flex justify-content-center align-items-center">
            <a href="register.php">Create Account</a>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <img src="image7.png" alt="">
        </div>
        <div class="d-flex justify-content-center align-items-center" id="social-icons">
            <a href=""><i class='bx bxl-linkedin'></i></a>
            <a href=""><i class='bx bxl-instagram-alt'></i></a>
            <a href=""><i class='bx bxl-facebook'></i></a>
            <a href=""><i class='bx bxl-twitter'></i></a>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>

                                              