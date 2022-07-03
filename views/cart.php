<?php

include '../models/database.php';?>

<?php

   if(isset($_POST['update_update_btn'])){
      $update_value = $_POST['update_quantity'];
      $update_id = $_POST['update_quantity_id'];
      $update_quantity_query = "update cart set quantity = '$update_value' where id = '$update_id'";
      $update_quantity_query = $conn->query($update_quantity_query) or die("query failed");
      if($update_quantity_query){
         header('location:cart.php');
      };
   };

   if(isset($_GET['remove'])){
      $remove_id = $_GET['remove'];
      $remove_product = "delete from cart where id = '$remove_id'";
      $remove_product = $conn->query($remove_product);
      header('location:cart.php');
   };

   if(isset($_GET['delete_all'])){
      $remove_all_product = "delete from cart";
      $remove_all_product = $conn->query($remove_all_product);
      header('location:cart.php');
   }
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../public/css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

   <section class="shopping-cart">

      <h1 class="heading">shopping cart</h1>

      <table>

         <thead>
            <th>image</th>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>total price</th>
            <th>action</th>
         </thead>

         <tbody>
            
         <?php 
         
         $select_cart = "select * from cart";
         $select_cart = $conn->query($select_cart);
         $grand_total = 0;
         if($select_cart->rowCount() > 0){
            while($row=$select_cart->fetch(PDO::FETCH_ASSOC)){
         ?>
         <tr>
            <td><img src="../public/uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo number_format($row['price']); ?>$</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $row['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $row['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td><?php echo $sub_total = number_format($row['price'] * $row['quantity']); ?>$</td>
            <td><a href="cart.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('remove <?php echo $row['name']; ?> from cart ?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td><?php echo $grand_total; ?>$</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all products ?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>
         </tbody>

      </table>

      <div class="checkout-btn">
         <a href="checkout.php" class="btn ">procced to checkout</a>
      </div>

   </section>

</div>
   
<!-- custom js file link  -->
<script src="../public/js/script.js"></script>

</body>
</html>