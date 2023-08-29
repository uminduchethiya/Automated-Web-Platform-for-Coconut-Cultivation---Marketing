<?php

if(isset($_POST["add"])){
$con=mysqli_connect("localhost","dse_user","123","cocome");


$name=$_POST["name"];
$email=$_POST["email"];
$pnumber=$_POST["pnumber"];
$message=$_POST["message"];


 $sql="INSERT INTO contact(name,email,pnumber,message)values('$name','$email','$pnumber','$message')";
    $ret=mysqli_query($con,$sql);

    $succ="Thank you!";


    echo "<script type='text/javascript'>alert('$succ');location='home.html'</script>";

    mysqli_close($con);
}

?>
 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>COCOME</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


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
                            <button class="dropdown-item" type="button">Sin</button>
                            
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
                <h5 class="m-0">+94 772933146</h5>
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
    <!-- Navbar End -->





    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Contact</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">

                <div class="contact-form bg-light p-30"style="margin-right:50px;" >
                    <div id="success"></div>
                    <form  action="" method="post">
                        <div class="control-group">
                            <input type="text" name="name" class="form-control"  placeholder="Your Name" 
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" name="email"  class="form-control" placeholder="Your Email" 
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" name="pnumber"  class="form-control"  placeholder="Phone number" 
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" name="message"  rows="8"  placeholder="Message" 
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div> 
                            <input type="submit" value="Submit" class="btn btn-primary py-2 px-4" name="add" >

                           
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%;height: 250px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.6903425750884!2d80.2218387145539!3d6.037162395627765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae173b12f4deb15%3A0x31ccbc33eb91d2ac!2sNIBM%20Galle%20Centre!5e0!3m2!1sen!2slk!4v1666779058348!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> No:132,Sea line,Galle</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>chamindutharaka@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+94 772933146</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

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
    <script src="js/main.js"></script>
</body>

</html>