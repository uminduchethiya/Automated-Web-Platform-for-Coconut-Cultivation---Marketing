<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>COCOME  </title>
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
                           <a href="admin/admin_login.php">  <button class="dropdown-item" type="button">Cocomeadmin</button></a>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">sin</button>
                           
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
                            
                            
                
           <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <a href="index.php" class="nav-item nav-link active" style="padding-left:320px;">Home</a>
                            <a href="shop.php" class="nav-item nav-link" style="padding-left:60px;">Shop</a>
                            <a href="Blog.html" class="nav-item nav-link "style="padding-left:60px;">Blog</a>
                            
                            <a href="contact.php" class="nav-item nav-link"style="padding-left:60px;">Contact</a>
         
         <!-- <a href="wishlist.php"style="padding-left:100px;"   ><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a> -->
         <a href="cart.php" style="padding-left:320px;"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         
     

                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3" >
        <div class="row px-xl-5" >
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner "style="width:1450px;margin-top: 50px;">
                        <div class="carousel-item position-relative active " style="height:600px;">
                            <img class="position-absolute w-100 h-100" src="img/coconutflour.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" >
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Caring Nature for Caring Life</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">COCOME Products</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="shop.php">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height:600px;">
                            <img class="position-absolute w-100 h-100" src="img/coco.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" >
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">HIGH QUALITY</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Coconut Related Products</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="shop.php">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 600px;">
                            <img class="position-absolute w-100 h-100" src="img/cocoheda.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" >
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Grow  Some Coconuts!</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Get Info About Cultivations</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="blog.html">Blog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Cash On Delivery</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="categories/Coconut_Peat_Products.php">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Coir-Pots.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Coconut Peat Products</h6>
                            <small class="text-body">5 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="categories/Coconut_Ekal_Products.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/ekel.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Coconut Ekel Product</h6>
                            <small class="text-body">10 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="categories/Coconut_Water_Products.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/water.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Coconut Water Product</h6>
                            <small class="text-body">2 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="categories/Coconut_Kernal_Products.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/cocon.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Coconut Kernal Product</h6>
                            <small class="text-body">15 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="categories/Coconut_Fiber_Products.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/fiiber.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Coconut Fiber Product</h6>
                            <small class="text-body">15 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="categories/Coconut_Shell_Products.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/shell.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Coconut Shell Product</h6>
                            <small class="text-body">10 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="categories/Coconut_Convenience_Products.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/convi.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Coconut Convenience Food Product</h6>
                            <small class="text-body">5 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="categories/Coconut_Inflorescence_Food_Products.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/gula.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Coconut Inflorescence Based Food Product</h6>
                            <small class="text-body">5 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
    </div>
    <!-- Categories End -->


   

    <!-- two side -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="contactandabout mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/cocow.jpg" alt="">
                    <div class="ww">
                        <h6 class="text-white text-uppercase">Get Information</h6>
                        <h3 class="text-white  mb-3">Coconut Cultivation</h3>
                        <a href="Blog.html" class="btn btn-primary">Blog</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contactandabout mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/coco.jpg" alt="">
                    <div class="ww">
                        <h6 class="text-white text-uppercase">Caring Nature for Caring Life</h6>
                        <h3 class="text-white mb-30">Cocome Products</h3>
                        <a href="shop.php" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- twoside End -->


    

    

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