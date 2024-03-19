<?php
include"navbar.php";
include"connection.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Register </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: black;
    }

    .input-box {
        position: relative;
        width: 340px;
        height: 50px;
        color: white;
        border-bottom: 2px solid #e4e4e4;
        margin: 30px 0;
    }

    .input-box input {
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        color: white;
        font-size: 16px;
        font-weight: 500;
        padding-right: 30px;
    }

    .input-box label {
        position: absolute;
        top: 50%;
        left: 0;
        color: white;
        transform: translateY(-50%);
        font-size: 16px;
        font-weight: 500;
        pointer-events: none;
        transition: .5s ease;
    }

    .input-box input:focus~label,
    .input-box input:valid~label {
        top: -5px;
    }

    .input-box .icon {
        position: absolute;
        top: 13px;
        color: white;
        right: 0;
        font-size: 19px;
    }

    .remember-forgot {
        font-size: 14.5px;
        font-weight: 500;
        color: white;
        margin: -15px 0 15px;
        display: flex;
        justify-content: space-between;
    }

    .remember-forgot label input {
        color: white;
        accent-color: #e4e4e4;
        margin-right: 3px;
    }


    .btn {
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

    .btn:hover {
        box-shadow: none;
        background-color: #c4103d;
    }

    .login-register {
        font-size: 14.px;
        font-weight: 500;
        margin-top: 25px;
        color: white;
    }
    #hover1 {
  font-weight: bold;
  color: white;
    }
</style>

<body>

    <div class="container-sm">
        <section class="container">
            <div class="row justify-content-center align-items-center" style="height: 90vh;">
                <div class="col-md-6 d-flex justify-content-center align-items-center form-box">
                    <form name="Login" action="#" method="post">
                        <h2 style="color: white;">Sign Up</h2>
                        <div class="input-box">
                            <span class="icon"><i class='bx bx-user'></i></span>
                            <input type="text" name="name" required>
                            <label>Name</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><i class='bx bx-user'></i></span>
                            <input type="text" name="username" required>
                            <label>Username</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><i class='bx bx-phone'></i></span>
                            <input type="text" name="contact" required>
                            <label>Phone No</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><i class='bx bx-envelope'></i></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><i class='bx bx-user'></i></span>
                            <input type="text" name="student_ID" required>
                            <label>Student Id</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>

                        <button type="submit" name="submit" class="btn">Sign In</button>
                        <div class="login-register">
                            <p>Already have an account? <a href="student.php" class="Register-link">Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

</body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['submit']))
{
  $count=0;
  $sql="SELECT username from `student`";
  $res=mysqli_query($db,$sql);

  while($row=mysqli_fetch_assoc($res))
  {
    if($row['username']==$_POST['username'])
    {
      $count=$count+1;
    }
  }
  if($count==0)
  {
    mysqli_query($db,"INSERT INTO `student` VALUES('$_POST[name]', '$_POST[username]', '$_POST[contact]', '$_POST[email]', '$_POST[student_ID]', '$_POST[password]', 'p.png');");
  ?>
    <script type="text/javascript">
     alert("Registration successful");
    </script>
  <?php
  }
  else
  {

    ?>
      <script type="text/javascript">
        alert("The username already exist.");
      </script>
    <?php

  }

}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>