<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!--- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    ---->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    //session_start();
                    $_SESSION["user"] = "yes";
                    echo "<script>alert('Hello! Welcome to our Profile'); window.location.href='index.html';</script>"; //change the index.php TO index.html
                    //header("Location: index.php");
                    die();
                }else{
                    echo "<script>alert('Your password is incorrect ');</script>";
                    //echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<script>alert('Your email does not match in our database');</script>";
                //echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <div class="overlay">
            <!----This will not have a content-->
        </div>
        <div class="titleDiv">
            <h1 class="title">Login</h1>
            <span class="subTitle">Welcome back!</span>
        </div>
        <!----formSection-->
        <form action="login.php" method="post">
            <div class="rows grid">
                <!---- User Name -->
                <div class="row">
                    <label for="Email">Email</label>
                    <input type="email" placeholder="Enter your Email:" name="email" class="form-control" required>
                </div>
                
                <!---- Password -->
                <div class="row">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter your Password:" name="password" class="form-control" required>
                </div>

                <!---- Submit Button -->
                <div class="row">
                    <input type="submit" value="Login" name="login" class="loginBTN">

                    <span class="registerLink">Don't have an account?
                        <a href="registration.php">Register Here!</a>
                    </span>
                </div>
            </div>
        </form>
    </div>
</body>
</html>