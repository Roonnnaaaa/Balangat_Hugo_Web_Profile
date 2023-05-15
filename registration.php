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
    <title>Registration Form</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <?php

        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
                //echo "<script>alert('All fields are required');</script>";
                array_push($errors,"All fields are required");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //echo "<script>alert('Email is not valid!');</script>";
                array_push($errors, "Email is not valid");
            }
            if (strlen($password)<8) {
                //echo "<script>alert('Password must be at least 8 charactes long');</script>";
                array_push($errors,"Password must be at least 8 charactes long");
            }
            if ($password!==$passwordRepeat) {
                //echo "<script>alert('Password does not match');</script>";
                array_push($errors,"Password does not match");
            }
            require_once "database.php";
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
                array_push($errors,"Email already exists!");
            }
            if (count($errors)>0) {
                foreach ($errors as  $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
            else{
                $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    //echo "<script>alert('You are registered successfully');</script>";
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                }else{
                    die("Something went wrong");
                }
            }
          
        }

        ?>

        <div class="overlay">
            <!----This will not have a content-->
        </div>
        <div class="reg_titleDiv">
            <h1 class="title">Register</h1>
            <span class="subTitle">Thanks for choosing us!</span>
        </div>
            <!----formSection-->
            <form action="" method="POST">
                <div class="rows grid">
                    <!---- User Name -->
                    <div class="row">
                        <label for="username">Full Name</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Full Name:" required>
                    </div>

                    <!---- Email Add -->
                    <div class="row">
                        <label for="email">Email Address</label>
                        <input type="emamil" class="form-control" name="email" placeholder="Email:" required>
                    </div>
                    
                    <!---- Password -->
                    <div class="row">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password:" required>
                    </div>

                    <!---- Password -->
                    <div class="row">
                        <label for="password">Repeat Password</label>
                        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:" required>
                    </div>

                    <!---- Submit Button -->
                    <div class="row">
                        <input type="submit" class="loginBTN" value="Register" name="submit">

                        <span class="registerLink">Have an account already?
                            <a href="login.php">Login</a>
                        </span>
                    </div>
                </div>
            </form>
      </div>
    </div>
</body>
</html>