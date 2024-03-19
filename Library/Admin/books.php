<?php
include "connection.php";
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Books</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        /* body {
        background: #020100;
    } */

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #e4e4e4;
            background-color: ;
        }

        th {
            background-color: #80ccc5;
        }

        #hover2 {
            font-weight: bold;
            color: white;
        }

        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
        }

        .sidenav {
            height: 100%;
            margin-top: 80px;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #000;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-width: 450px) {
            .sidenav {
                margin-top:360px;
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .h:hover {
            color: white;
            width: 300px;
            height: 50px;
            background-color: #00544c;
        }

        #d{
            width:400px;
            float:right;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-black navbar-dark">
            <div class="container">
                <h2 class="navbar-brand"><i class='bx bx-library'></i>LibraTrak <br>Library</h2>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mynav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                if (isset($_SESSION['login_user'])) {
                    echo '<div class="collapse navbar-collapse" id="mynav">';
                    echo '<ul class="navbar-nav">';
                    echo '<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>';
                    echo '<li class="nav-item"><a class="nav-link active" href="books.php">Books</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                    echo '</ul>';
                    echo '<div class="navbar-text ms-auto text-white">Welcome ' . $_SESSION['login_user'] . '</div>';
                    echo '</div>';
                } else {
                ?>
                    <div class="collapse navbar-collapse" id="mynav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link active" href="books.php">Books</a></li>
                            <li class="nav-item"><a class="nav-link" href="admin.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>
            <form action="#" class="d-flex" method="post" name="form1">
                <input class="form-control me-2" aria-label="Search" type="text" name="search" placeholder="Search books..."
                    required>
                <button class="btn btn-outline-success" type="submit" name="submit"><i class='bx bx-search'></i></button>
            </form>
        </nav>
    </header>

    <div class="container">
        <?php
        if (isset($_SESSION['login_user'])) {
        ?>
            <div id="mySidenav" class="sidenav" style="color:white;">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <?php
                echo "<div><img class='rounded-circle' style='height: 110px; width: 100px; margin-left:90px;' src='p.png'></div>";
                echo "<div class='user-name' style='margin-left: 80px; font-size: 20px;'>Welcome " . $_SESSION['login_user'] . "</div>";
                ?>

                <div class="h"><a href="add.php">Add books</a></div>
                <div class="h"><a href="request.php">Book Request</a></div>
                <div class="h"><a href="issue_info.php">Issue Information</a></div>
                <div class="h"><a href="expired.php">Expired List</a></div>
                <div class="h"><a href="fine.php">Fines</a></div>
            </div>
            </div>

            <div id="main">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        <?php
        }
        ?>
            <form action="#" class="d-flex" method="post" name="form1" id="d">
                <input class="form-control me-2" aria-label="Search" type="text" name="Book_id" placeholder="Enter book ID"
                    required>
                <button class="btn btn-outline-success" type="submit" name="submit1">Delete</button>
            </form>

        <div class="container" style="margin-top:70px;">
            <h2 style="color: black;">List of Books</h2>

            <?php
            if (isset($_POST['submit'])) {
                $q = mysqli_query($db, "SELECT * from Books where Name like '%$_POST[search]%'");
                if (mysqli_num_rows($q) == 0) {
                    echo "<h3 style='color: white;'>Sorry! No books found. Try searching again.</h3>";
                } else {
                    echo "<table class='table-bordered'>";
                    echo "<tr style='background-color: white;'>";
                    echo "<th>ID</th>";
                    echo "<th>Book-Name</th>";
                    echo "<th>Authors Name</th>";
                    echo "<th>Edition</th>";
                    echo "<th>Status</th>";
                    echo "<th>Quantity</th>";
                    echo "<th>Department</th>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($q)) {
                        echo "<tr style='background-color: white;'>";
                        echo "<td>" . $row['Book_id'] . "</td>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Authors'] . "</td>";
                        echo "<td>" . $row['Edition'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>" . $row['Quantity'] . "</td>";
                        echo "<td>" . $row['Department'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            } else {
                $res = mysqli_query($db, "SELECT * FROM `Books` ORDER BY `Books`.`Book_id` ASC;");

                echo "<table class='table-bordered'>";
                echo "<tr style='background-color: white;'>";
                echo "<th>ID</th>";
                echo "<th>Book-Name</th>";
                echo "<th>Authors Name</th>";
                echo "<th>Edition</th>";
                echo "<th>Status</th>";
                echo "<th>Quantity</th>";
                echo "<th>Department</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr style='background-color: white;'>";
                    echo "<td>" . $row['Book_id'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Authors'] . "</td>";
                    echo "<td>" . $row['Edition'] . "</td>";
                    echo "<td>" . $row['Status'] . "</td>";
                    echo "<td>" . $row['Quantity'] . "</td>";
                    echo "<td>" . $row['Department'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            if(isset($_POST['submit1']))
            {
                if(isset($_SESSION['login_user']))
                {
                    mysqli_query($db,"DELETE from Books where Book_id='$_POST[Book_id]';");
                    ?>
                    <script type="text/javascript">
                         alert("Book Deleted successfuuly");
                    </script>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.body.style.backgroundColor = "white";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
