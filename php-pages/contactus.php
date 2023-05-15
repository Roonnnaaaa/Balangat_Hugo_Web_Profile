<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    $alert = '';

    if(isset($_POST["submit"])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ronamay.balangat@bicol-u.edu.ph'; //MY GMAIL ACCOUNT-USERNAME
            $mail->Password = 'lbqwuejatqmextoz'; //MY GMAIL APP PASSWORD!!!
            $mail->SMTPSecure = 'tls';
            $mail->Port = '587';

            $mail->setFrom('ronamay.balangat@bicol-u.edu.ph'); //MY GMAIL ACCOUNT-USERNAME
            $mail->addAddress('ronabalangat2130@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'Message Received from Contact:'. $fname . $lname;
            $mail->Body = "Name: $fname $lname <br> Phone: $phone <br> Email: $email <br> Context: $message";

            $mail->send();

            echo
            "
            <script>
            alert('Your Message is Sent Successfully!!!');
            document.location.href = 'contactus.php';
            </script>
            ";

        }catch(Exception $e){
            echo
            "
            <script>
            alert('ERROR!!!');
            document.location.href = 'contactus.php';
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!------------------ UNICONS ------------------->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <!------------------ CSS ------------------->
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="main.css">
    <title>ContactUS</title>
</head>
<body>
    <header>
		<div class="container">
			<h2>LOGO</h2>
            <div class="navbar">
                <nav>
                    <ul>
                        <li>
                            <a href="index.html" class="nav-icon">
                                <i class="uil uil-estate"></i>
                                Home
                            </a>
                        </li>
    
                        <li>
                            <a href="about.html" class="nav-icon">
                                <i class="uil uil-user"></i>
                                About
                            </a>
                        </li>
    
                        <li>
                            <a href="skills.html" class="nav-icon">
                                <i class="uil uil-file-alt"></i>
                                Skills
                            </a>
                        </li>
    
                        <li>
                            <a href="portfolio.html" class="nav-icon">
                                <i class="uil uil-mountains-sun"></i>
                                Portfolio
                            </a>
                        </li>
    
                        <li>
                            <a href="contactus.php" class="nav-icon">
                                <i class="uil uil-message"></i>
                                ContactUs
                            </a>
                        </li>
                        <li>
                            <!----<a href="contactus.html" class="nav-icon">
                                <i class="uil uil-message"></i>
                                ContactUs
                            </a>
                            ---->
                            <a href="logout.php" class="logoutBtn">Logout</a>
                        </li>
                    </ul>
                </nav>
			<button class="hamburger">
				<div class="bar"></div>
			</button>
		</div>
	</header>
	<nav class="mobile-nav">
		<a href="index.html">Home</a>
		<a href="about.html">About</a>
		<a href="skills.html">Skills</a>
        <a href="portfolio.html">Portfolio</a>
		<a href="contactus.php">ContactUs</a>
        <a href="logout.php">Logout</a>
	</nav>
    

    <div class="con-title">
        <h2>Get in Touch</h2>
    </div>
    <div class="contactUs">
        <div class="con-box">
            <div class="contact_form">
                <h3>Send a Message</h3>
                <form method="POST" action="#">
                    <div class="formBox">
                        <div class="contactInfo">
                            <div class="inputBox">
                                <span>First Name</span> <br>
                                <input name="fname" type="text" name="firstname" placeholder="John" required>
                            </div>
                            <div class="inputBox">
                                <span>Last Name</span> <br>
                                <input name="lname" type="text" name="lastname" placeholder="Doe" required>
                            </div>
                        </div>

                        <div class="contactInfo">
                            <div class="inputBox">
                                <span>Email</span> <br>
                                <input name="email" type="text" name="email" placeholder="johndoe@email.com" required>
                            </div>
                            <div class="inputBox">
                                <span>Mobile</span> <br>
                                <input name="phone" type="text" name="mobile" placeholder="+63 967 546 1202" required>
                            </div>
                        </div>

                        <div class="write">
                            <div class="inputBox">
                                <span>Message</span> <br>
                                <textarea name="message" placeholder="Write your message...." name="message" required></textarea>
                            </div>
                        </div> 
                        <div class="submit">
                            <input type="submit"name="submit"  value="Send">
                            <span>Sending your message...</span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="left">
                <!--INFO BOX-->
                <div class="info">
                    <h3>Contact Info</h3>
                    <div class="infoBox">
                        <div>
                            <span><i class="fa fa-location-dot"></i></span>
                            <a href="#">Sto.Domingo, Albay <br>PHILIPPINES </a>
                        </div>
                        <div>
                            <span><i class="fa-regular fa-envelope"></i></span>
                            <a href="#">loremipsum@email.com</a>
                        </div>
                        <div>
                            <span><i class="fa fa-phone"></i></span>
                            <a href="#">+63 967 546 1202</a>
                        </div>
                        <!-- SOCIAL MEDIA LINKS -->
                        <ul class="sci">
                            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!--MAP-->
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d78293.06245770978!2d123.72327456168807!3d13.236122439206664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a1aac08a5af425%3A0x45f717012f7c19ce!2sSanto%20Domingo%2C%20Albay!5e0!3m2!1sen!2sph!4v1683207824332!5m2!1sen!2sph" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="js/main.js"></script>
    <script src="js/contact.js"></script>
</html>