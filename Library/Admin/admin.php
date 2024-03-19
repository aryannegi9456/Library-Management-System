<?php
include"connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                echo '</ul>';
                echo "<div><img class='rounded-circle' style='height: 110px; width: 120px;' src='p.jpg'></div>";
                echo '<div class="navbar-text ms-auto text-white">'.$_SESSION['login_user'].'</div>';
                echo '</div>';
            }
            else
            {
                ?>
                <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="books.php">Books</a></li>
                <li class="nav-item"><a class="nav-link active" href="admin.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>
                </ul>
                </div>
                <?php
            }
            ?>
        </div>
    </nav>
</header>

    <div class="container-sm">
        <section class="container">
            <div class="row justify-content-center align-items-center" style="height: 90vh;">
                <div class="col-md-6 d-flex justify-content-center align-items-center form-box">
                    <form name="Login" action="#" method="post">
                        <h2 style="color: white;">Sign In</h2>
                        <div class="input-box">
                            <span class="icon"><i class='bx bx-user'></i></span>
                            <input type="text" name="username" required>
                            <label>Username</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>

                        <div class="remember-forgot">
                            <label><input type="checkbox">Remember me</label>
                        </div>

                        <button type="submit" name="submit" class="btn">Sign In</button>
                        <div class="login-register">
                            <a href="update_password.php">Forgot Password</a>
                            <p>Dont't have an account? <a href="register.php" class="Register-link">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>


</body>

<?php
if(isset($_POST['submit']))
{
    $count=0;
    $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' AND password='$_POST[password]';");
    $row=mysqli_fetch_assoc($res);
    $count=mysqli_num_rows($res);
    if($count==0)
    {
        ?>
<!-- <div class="wrong" style="color: red; margin-top: 200px; padding-left: 57%;">
    <strong>The username and password doesn't match</strong>
</div> -->
<script type="text/javascript">
    alert("The username and password doesn't match.");    
</script>
<?php
    }
    else{
        $_SESSION['login_user']= $_POST['username'];
        $_SESSION['pic']=$_row['pic'];
        ?>
<script type="text/javascript">
    window.location = "index.php";
</script>
<?php
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>