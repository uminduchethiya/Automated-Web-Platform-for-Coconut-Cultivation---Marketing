<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update_payment'])){
   // $listing_id = $_POST['id'];
   //  $price = $_POST['price'];
   // $price = filter_var($price, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `listing` SET price = $price WHERE id = ?");
   $update_payment->execute([$price, $id]);
   $message[] = 'payment status updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `listing` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Listing</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin1.css">

</head>
<body style=" background-color: black;">

<?php include '../components/admin_header.php'; ?>

<section class="orders">

<h1 class="heading">Listing</h1>

<div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `listing`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> id : <span><?= $fetch_orders['id']; ?></span> </p>
      <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> category : <span><?= $fetch_orders['categories']; ?></span> </p>
      <p> price : <span><?= $fetch_orders['price']; ?></span> </p>
      <p> email : <span><?= $fetch_orders['email']; ?></span> </p>
      <!-- <p> contact No : <span>$<?= $fetch_orders['pnumber']; ?>/-</span> </p> -->
      <!-- <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p> -->
      <form action="" method="post">
      
        <div class="flex-btn">
         
         <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
   ?>

</div>

</section>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>