<?php

include 'components/connect.php';

// session_start();

// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
//    header('location:admin_login.php');
// };


if(isset($_POST['add'])){


    if(!isset($_SESSION['email']))
    {
        $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

     $categories = $_POST['categories'];
   $categories = filter_var($categories, FILTER_SANITIZE_STRING);
   
   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = 'uploaded_img/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = 'uploaded_img/'.$image_02;

   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pnumber = $_POST['pnumber'];
  $pnumber = filter_var($pnumber, FILTER_SANITIZE_STRING);



   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);


   $pcode = $_POST['pcode'];
    $pcode = filter_var($pcode, FILTER_SANITIZE_STRING);

   


  

   $select_products = $conn->prepare("SELECT * FROM `listing` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'product name already exist!';
   }else{

      $insert_products = $conn->prepare("INSERT INTO `listing`(name,categories,image_01, image_02,price,email,pnumber,details,pcode) VALUES(?,?,?,?,?,?,?,?,?)");
      $insert_products->execute([$name, $categories, $image_01, $image_02, $price, $email,
         $pnumber,$details,$pcode]);

      if($insert_products){
         if($image_size_01 > 2000000 OR $image_size_02 > 2000000 ){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            
            $message[] = 'new product added!';
         }

      }

   }  
    }
    else
    {
        header('location:login.php');
        
    }

    

};



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
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
    <!-- Navbar End -->


<div class="wrapper">
      <div class="title">
         LISTING DETAILS FORM
      </div>
      <div class="form">
         <form action="" method="POST" enctype="multipart/form-data">
         <div class="input_field">
            <label>Name</label>
            <input type="text" class="input" name="name">
      </div>
   
      <div class="input_field">
            <label>Categories</label>
            <div class="catagory_select" >
               <select name="categories" >
                  <option  >select</option>
                  <option value="p">Coconut Peat Products</option>
                  <option value="e">Coconut Ekal Products</option>
                  <option value="w">Coconut Water Products</option>
                  <option value="k">Coconut Kernal Products</option>
                  <option value="f">Coconut Fiber Products</option>
                  <option value="s">Coconut Shell Products</option>
                  <option value="pd">Coconut Convenience Products</option>
                  <option value="m">Coconut Inflorescence Food Products</option>

                  
               </select>
            </div>
      </div>
      
         <div class="input_field">
            <label>image 01 (required) </label>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="input" required>
        </div>

        <div class="input_field">
            <label>image 02 (required)</label>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="input" required>
        </div>

        <div class="input_field">
            <label>Price</label>
            <input type="text" class="input" name="price" onkeypress="if(this.value.length == 10) return false;"required max="9999999999">
      </div>

     
               
      <div class="input_field">
            <label>Email Address</label>
            <input type="text" class="input" name="email">
      </div>
      <div class="input_field">
            <label>Phone Number</label>
            <input type="text" class="input" name="pnumber">
      </div>
      <div class="input_field">
            <label>details</label>
            <textarea class="textarea" name="details"></textarea>
      </div>
      <div class="input_field">
            <label>Postal Code</label>
            <input type="text" class="input" name="pcode">
      </div>
      
      <div class="input_field">
         
         <input type="submit" value="add product" class="btn" name="add" style="width:100% ;height: 50px;" >

      </div>
      </form>
   </div>
</div>

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
