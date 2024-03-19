<?php
include"connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<style type="text/css">
    body{
    }


    .bg-image {
        background-image: url('image9.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 100vw;
    height: 100vh;
}

</style>
<body>

    <header>
        <nav class="navbar navbar-expand-sm bg-black navbar-dark">
            <div class="container-sm">
                <h2 class="navbar-brand"><i class='bx bx-library'></i>LibraTrak <br>Library</h2>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mynav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" id="hover2" href="books.php">Books</a></li>
                        <li class="nav-item"><a class="nav-link active" id="hover" href="student.php">Student</a></li>
                        <li class="nav-item"><a class="nav-link" id="hover3" href="feedback.php">Feedback</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
 
    <div class="container-fluid bg-image d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-md-6">
                <div class="wrapper" 
                    style="background-color: black; height: 400px; width: 400px; opacity: 0.6; color: white; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <h1 style="text-align: center; font-size: 40px;"><b>Change your Password</b></h1>
                    <form action="" method="post">
                        <input type="text" name="username" class="form-control" placeholder="Username" required><br>
                        <input type="text" name="email" class="form-control" placeholder="Email" required><br>
                        <input type="password" name="password" class="form-control"   placeholder="New Password" required><br>
                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
   </div>

   <?php
       if(isset($_POST['submit']))
       {
          if(mysqli_query($db, "UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';"))
          {
            ?>
            <script type="text/javascript">
            alert("The password has been updated successfully.");
            </script>
            <?php
          }

       }
   ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</html>