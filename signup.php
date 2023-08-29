<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
//

// include 'components/connect.php';

// session_start();

// if(isset($_SESSION['user_id'])){
//    $user_id = $_SESSION['user_id'];
// }else{
//    $user_id = '';
 
// };
if(isset($_POST["reji"]))
{
   //create a new PHPMailer object:
    $mail = new PHPMailer(true);

$uname =$_POST["uname"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$cpass=$_POST["cpass"];
$type=$_POST["type"];
$con=mysqli_connect("localhost","dse_user","123");
mysqli_select_db($con ,"cocome");


$sql = "SELECT * FROM user WHERE email='$email' ";
        $result= mysqli_query($con, $sql);
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if($pass != $cpass)
                {
                     $message="dosent match password and confirm password!";
                     echo "<script type='text/javascript'>alert('$message')</script>";
                }
                else
                {
                    if($row['email'] == $email)
                     {  
                     echo '<script>alert("Username is Taken ")</script>';
                     }
                     else
                     {
                        $sql="INSERT INTO user(uname,email,password,type)values('$uname','$email','$pass','$type')";
                          $ret=mysqli_query($con,$sql);

                        $succ="Successfully Registerd!";
                        


                       echo "<script type='text/javascript'>alert('$succ');location='index.html'</script>";
                       //email
//
 try {
       
        //Server settings
        //$mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'cocomestore1@gmail.com';                     //SMTP username
        $mail->Password   = 'cevcyroqrjdbwrdc';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('cocomestore1@gmail.com', 'cocome');
        $mail->addAddress($email);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);       
        //$verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Users Registrtion';
        $mail->Body    = '<div style="width: 700px ; background-color:lightgreen; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Welcome to Cocome</div><p>Hi,<br>'.$uname.',<br>Thank you for joining with us !'.$email.'</p><p>Stay with us for new product and inforamtion.</p>
           <p>please <a href="mailto:cocomestore1@gmail.com"><b><u>contact</u></b></a> us for more Details. </p>
            <p>Thank You.<br>Sincerely yours,<br>The Cocome Team</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

         } 
    catch (Exception $e)
     {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }

//     


     // header('location:index.html');
   
     //disconnect 
      mysqli_close($con); 
        
    }
    }
    // else
    // {
    //     echo '<script>alert("UserEmail Filed cannot be blank")</script>';
    
    // }


                      // mysqli_close($con);
                
}



?>
<!-- 
// if(isset($_GET['reji'])){

//    $uname = $_POST['uname'];
//    $uname = filter_var($uname, FILTER_SANITIZE_STRING);
//    $email = $_POST['email'];
//    $email = filter_var($email, FILTER_SANITIZE_STRING);
//    $pass = sha1($_POST['pass']);
//    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
//    $cpass = sha1($_POST['cpass']);
//    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
//    $type = sha1($_POST['type']);
//    $type = filter_var($type, FILTER_SANITIZE_STRING);

//    $select_user = $conn->prepare("SELECT * FROM 'user' WHERE name = ?");
//    $select_user->execute([$uname,]);
//    $row = $select_user->fetch(PDO::FETCH_ASSOC);

//    if($select_user->rowCount() >0){
//       $message[] = 'username already exists!';
//    }else{
//       if($pass != $cpass){
//          $message[] = 'confirm password not matched!';
//       }else{
//          $insert_user = $conn->prepare("INSERT INTO 'user' (name,email,password,type) VALUES(?,?,?,?)");
//          $insert_user->execute([$uname, $email,  $cpass, $type]);
//          $message[] = 'registered successfully, login now please!';
//       }
//    }

// } -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Css-->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="shop.css">
	<title></title>
</head>
<body>
	 <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                         <a href="login.php">  <button class="dropdown-item" type="button">Sign in</button></a>
                          <a href="signup.php">  <button class="dropdown-item" type="button">Sign up</button></a>
                           <a href="listing.php">  <button class="dropdown-item" type="button">Selling</button></a>
                        </div>
                    </div>
                   
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">SIN</button>
                            
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.html" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary navic px-2">Coco</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Me</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+74 77 293 146</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid navic mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(24.8% - 20px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">

                            
                        </div>
                        <a href="categories/Coconut_Peat_Products.php" class="nav-item nav-link">Coconut Peat Products</a>
                        <a href="categories/Coconut_Ekal_Products.php" class="nav-item nav-link">Coconut Ekal Products</a>
                        <a href="categories/Coconut_Water_Products.php" class="nav-item nav-link">Coconut Water Products</a>
                        <a href="categories/Coconut_Kernal_Products.php" class="nav-item nav-link">Coconut Kernal Products</a>
                        <a href="categories/Coconut_Fiber_Products.php" class="nav-item nav-link">Coconut Fiber Products</a>
                        <a href="categories/Coconut_Shell_Products.php" class="nav-item nav-link">Coconut Shell Products</a>
                        <a href="categories/Coconut_Convenience_Products.php" class="nav-item nav-link">Coconut Convenience Products</a>
                        <a href="categories/Coconut_Inflorescence_Food_Products.php" class="nav-item nav-link">Coconut Inflorescence Food Products</a>
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg navic navbar-dark py-3 py-lg-0 px-0">
                    
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0 ">
                            <a href="index.html" class="nav-item nav-link active" style="padding-left:320px;">Home</a>
                            <a href="shop.php" class="nav-item nav-link" style="padding-left:60px;">Shop</a>
                            <a href="Blog.html" class="nav-item nav-link "style="padding-left:60px;">Blog</a>
                            
                            <a href="contact.php" class="nav-item nav-link"style="padding-left:60px;">Contact</a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
<!--signup Signup-->
<section style="padding-left: 550px;">
		<div class="form login" style="margin-top:50px;">
			<div class="form-content">
				<header>Signup</header>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="field input-field">
						<input type="text" placeholder="Username" class="input" name="uname">
					</div>
					<div class="field input-field">
						<input type="email" placeholder="Email" class="input" name="email">
					</div>
					<div class="field input-field">
						<input type="password" placeholder="Password" class="input" name="pass">
					</div>
					<div class="field input-field">
						<input type="password" placeholder="Confirm Password" class="Confirm Password" name="cpass">
						<i class='bx bx-hide eye-icon'></i>
					</div>
					<div class="field input-field">
						<label style="font-size: 16px; color: black;"> Customer Type</label>
						<select name="type" style="width: 200px; height: 40px; padding-left: 55px;">
							<option>-Select-</option>
							<option value="seller">Seller</option>
							<option value="buyer">Buyer</option>
						</select>
					</div>
					
					<div class="field input-field">
					  <button type="submit" name="reji" value="signup">Sign up</button>

					</div>
				
				<div class="form-link">
						<span>Already have an account ?<a href="http://localhost:81/pp/login.php" class="link login-link">Login</a></span>
					</div>
			</div>
			<div class="line"></div>
			<div class="media-options">
				<a href="#" class="field facebook">
				<i class='bx bxl-facebook-square facebook-icon' style='color:#ffffff'  ></i>
				<span>Login with Facebook</span>
				</a>
			</div>
			<div class="media-options">
				<a href="#" class="field google">
				<img src="google.png" alt="" class="google-img">
				<span>Login with Google</span>
				</a>
			</div>
            </form>
		</div>
	</section>
	
    <!-- Footer Start -->
    <div class="container-fluid navic text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4 text-uppercase">It’s Time To Go Cocome</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> No:132,Sea line,Galle</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>chamindutharaka@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+94 7729 33146</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="Home.html"><i class="fa fa-angle-right mr-2"></i>    Home</a>
                            <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>    Shop</a>
                            <a class="text-secondary mb-2" href="Blog.html"><i class="fa fa-angle-right mr-2"></i>    Blog</a>
                           
                            <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>        Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="Home.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="login.php"><i class="fa fa-angle-right mr-2"></i>Sign in</a>
                            <a class="text-secondary mb-2" href="signup.php"><i class="fa fa-angle-right mr-2"></i>Sign up</a>
                            
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Receive CocoMe Newsletter</h5>
                        
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-30">Follow Us</h6>
                        <div class="d-flex" >
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">NIBM</a>. All Rights Reserved
                    
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>