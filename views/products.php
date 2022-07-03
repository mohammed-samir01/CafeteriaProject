
<?php require "../models/database.php"; ?>

<?php

   if(isset($_POST['add_to_cart'])){

      $p_name           = $_POST['product_name'];
      $p_price          = $_POST['product_price'];
      $p_image          = $_POST['product_image'];
      $product_quantity = 1;

      $selectquery = "select * from cart where name = '$p_name'";
      $res = $conn->query($selectquery) or die('query failed');


      if($res->rowCount() > 0){
         $message[] = 'Product Already Added To Cart';
      }else{
         $insert_product = "insert into cart (name, price, image, quantity) values ('$p_name', '$p_price', '$p_image', '$product_quantity')";
         $insert_product = $conn->query($insert_product) or die('query failed');
         $message[] = 'Product Added To Cart Succesfully';
         
      }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

   <section class="products">

      <h1 class="heading">latest products</h1>

      <div class="box-container">

      <?php
            $sel_query = " SELECT products.name, products.price, products.image, categories.cat_name FROM products , categories  WHERE products.id_categories = categories.id";
            $data      = $conn->query($sel_query);
               if($data->rowCount() > 0){
               while($row=$data->fetch(PDO::FETCH_ASSOC)){
      ?>

         <form action="" method="post">
            <div class="box">
               <img src="../public/uploaded_img/<?php echo $row['image'];?>" alt="">
               <h3><?php echo $row['name'];?></h3>
               <div class="price"><?php echo $row['price'];?>$</div>
               <div class="price"><?php echo $row['cat_name'];?></div>
               <input type="hidden" name="product_name" value="<?php echo $row['name'];?>">
               <input type="hidden" name="product_price" value="<?php echo $row['price'];?>">
               <input type="hidden" name="product_cat" value="<?php echo $row['cat_name'];?>">
               <input type="hidden" name="product_image" value="<?php echo $row['image'];?>">
               <input type="submit" class="btn" value="add to cart" name="add_to_cart">
            </div>
         </form>

         <?php };
            }else{
               echo "<div class='empty'>no product added</div>";
            }

         ?>

      </div>

   </section>

</div>

<!-- custom js file link  -->
<script src="../public/js/script.js"></script>

</body>
</html>

               
