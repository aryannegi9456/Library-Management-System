<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
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

<body style="background-color:#004528;marfgin-bottom:50px; ">
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
                    echo '<li class="nav-item"><a class="nav-link" href="books.php">Books</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>';
                    echo '<li class="nav-item"><a class="nav-link active" href="profile.php">Profile</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                    echo '</ul>';
                    echo '<div class="navbar-text ms-auto text-white">Welcome ' . $_SESSION['login_user'] . '</div>';
                    echo '</div>';
                } 
                else {
                ?>
                    <div class="collapse navbar-collapse" id="mynav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link active" href="books.php">Books</a></li>
                            <li class="nav-item"><a class="nav-link" href="student.php.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>
    </header>
    <div class="container mt-5">
        <h2 style="text-align: center; color:white;"><b>Edit Information</b></h2>
        <?php
		
		$sql = "SELECT * FROM Student WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$name=$row['name'];
			$username=$row['username'];
			$password=$row['password'];
			$email=$row['email'];
			$contact=$row['contact'];
		}

	?>
        <div class="profile_info" style="text-align: center;">
            <span style="color:white;">Welcome</span>
            <h4 style="color:white;"><?php echo $_SESSION['login_user']; ?></h4>
        </div><br>
        <form action="#" class="d-flex" method="post" enctype="multipart/form-data" style="padding-left: 460px;">
        <div class="row">
            <div class="">
                <label style="color:white;"><h5>Name:</h5></label>
                <input class="form-control" style="width:400px;"aria-label="Search" type="text" name="name" value="<?php echo $name; ?>"><br>
            </div>
            <div class="">
                <label style="color:white;"><h5>Username:</h5></label>
                <input class="form-control" style="width:400px;" aria-label="Search" type="text" name="username" value="<?php echo $username; ?>"><br>
            </div>
            <div class="">
                <label style="color:white;"><h5>Password:</h5></label>
                <input class="form-control" style="width:400px;" aria-label="Search" type="text" name="password" value="<?php echo $password; ?>"> <br>
            </div>
            <div class="">
                <label style="color:white;"><h5>Email:</h5></label>
                <input class="form-control" style="width:400px;" aria-label="Search" type="text" name="email" value="<?php echo $email; ?>"> <br>
            </div>
            <div class="">
                <label style="color:white;"><h5>Phone No::</h5></label>
                <input class="form-control" style="width:400px;" aria-label="Search" type="text" name="contact" value="<?php echo $contact; ?>"> <br>
            </div>
            <div class="">
                <button class="btn btn-primary" type="submit" name="submit">Save</button>
            </div>
        </div>
    </form>
    </div>

    <?php 

		if(isset($_POST['submit']))
		{

			$name=$_POST['name'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE Student SET name='$name', username='$username', password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>

    </body>

</html>