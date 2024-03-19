<?php
include"connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style type="text/css">
      
        .table > :not(caption) > * > * {
            color: white;
            background-color: var(--bs-able-bg);
        }

    </style>

</head>

<body style="background-color:#004528; ">

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
                echo '<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="books.php">Books</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>';
                echo '<li class="nav-item"><a class="nav-link active" href="profile.php">Profile</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                echo '</ul>';
                echo '</div>';
                echo '<img class="rounded-circle" style="height: 30px; width: 30px; margin-right: 5px;" src="p.png" alt="display pic">';
                echo '<div class="navbar-text ms-auto text-white">Welcome '.$_SESSION['login_user'].'</div>';
            }
            else
            {
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
    </nav>
</header>

<div class="container-sm mt-5">
    <section class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 d-flex justify-content-center align-items-center form-box">
                <form action="" method="post">
                    <button class="btn btn-primary" style="float: left;" type="submit" name="submit1">Edit</button>
                </form>
            </div>
        </div>
        <div class="container wrappered text-center" style="width: 500px; color:white;">
            <?php
            if(isset($_POST['submit1']))
            {
                ?>
                    <script type="text/javascript">
                        window.location="edit.php";
                    </script>
                <?php
            }
            $q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_user]'");
            ?>
            <h2>My profile</h2>
            <?php
                $row=mysqli_fetch_assoc($q);
                echo "<div><img class='rounded-circle' style='height: 110px; width: 120px;' src='p.png'></div>";
            ?>
            <div><b>Welcome,</b>
                <h4>
                    <?php echo $_SESSION['login_user'];?>
                </h4>
            </div>
            <?php
            echo "<b>";
                echo "<table class='table table-bordered table-transparent'>";
                    echo "<tr>";
                        echo "<td><b>Name: </b></td>";
                        echo "<td>".$row['name']."</td>";
                    echo "</tr>";
                

                    echo "<tr>";
                        echo "<td><b>Username: </b></td>";
                        echo "<td>".$row['username']."</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td><b>Password: </b></td>";
                        echo "<td>".$row['password']."</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td><b>Contact: </b></td>";
                        echo "<td>".$row['contact']."</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td><b>Email: </b></td>";
                        echo "<td>".$row['email']."</td>";
                    echo "</tr>";

                echo "</table>";
            echo "</b>";
            ?>

        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>
