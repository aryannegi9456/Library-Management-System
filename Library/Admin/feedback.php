<?php
 include"navbar.php";
 include"connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="student.html">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
     .header {
        position: absolute;
        top: 0;
        left: 0;
        width: auto;
        padding: 25px 12.5%;
        background: transparent;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100;
    }

    body {
        background: #020100;
    } 

    .navbar a {
        position: relative;
        font-size: 16px;
        color: #e4e4e4;
        text-decoration: none;
        font-weight: 500;
        margin-right: 30px;


    }

    .navbar a::after {
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

    .navbar a:hover::after {
        transform: translateY(0px);
        opacity: 1;
    }

    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 75%;
        height: 550px;
        background: url() no-repeat;
        background-size: cover;
        background-position: center;
        border-radius: 10px;
        margin-top: 20px;
    }

    .container .content {
        position: absolute;
        top: 0;
        left: 0;
        width: 58%;
        height: calc(100% - 160px);
        background: transparent;
        padding: 80px;
        color: #e4e4e4;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
    }

    .content .logo {
        font-size: 30px;

    }

    .text-sci h2 {
        font-size: 40px;
        line-height: 1;
    }

    .text-sci h2 span {
        font-size: 25px;
    }

    .text-sci p {
        font-size: 16px;
        margin: 20px 0;
    }

    .social-icons a i {
        font-size: 22px;
        color: #e4e4e4;
        margin-right: 10px;
        transition: .5s ease;
    }

    .social-icons a:hover i {
        transform: scale(1.2);
    }

    .container .logreg-box {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 0;
        right: 0;
        width: calc(100% - 58%);
        height: 100%;
        background-color: rgba(0, 0, 0, 0.1);
        color: white;
    }
  
    .logreg-box .form-box {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        background: transparent;
        color: #e4e4e4;
    }

    .form-box h2 {
        font-size: 32px;
        text-align: center;
    }

    .form-box input {
        width: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px 15px;
        border: 1px solid #5c5c5c;
        border-radius: 3px;
        background: black;
        font-size: 16px;
        color:white;
    }

    .btn {
        margin-top:10px;
        width: 100%;
        height: 45px;
        background: #c4103d;
        border: none;
        outline: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        color: #e4e4e4;
        font-weight: 500;
        box-shadow: 0 0 10px rgba(0, 0, 0, .5);
    }

    #hover3 {
  font-weight: bold;
  color: white;
    }
</style>

    <div class="container">
        <div class="content">
            <h2 class="logo"><i class='bx bx-library'></i>LibraTrak <br>Library</h2>
            <div class="text-sci">
                <h2>Welcome! <br><span>To Our New Website.</span></h2>
                <p>You can manage your details regarding books here.</p>
                <div class="social-icons">
                    <a href=""><i class='bx bxl-linkedin'></i></a>
                    <a href=""><i class='bx bxl-instagram'></i></a>
                    <a href=""><i class='bx bxl-facebook'></i></a>
                    <a href=""><i class='bx bxl-twitter'></i></a>
                </div>
            </div>
        </div>

        <div class="logreg-box">
            <div class="form-box">
                <form style="" action="" method="post">
                    <h2>Give your Feedback</h2>
                    <input type="text" name="Comment" placeholder="Write something..."><br>
                    <button type="submit" name="Submit" class="btn">Comment</button>
		        </form> 
            </div>

            
        </div>
    </div>
</body>
</body>
</html>