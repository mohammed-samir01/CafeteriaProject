
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cafateria</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../public/css/style.css">

</head>
<body>
   
<?php require "../models/database.php" ?>

<?php

session_start();
   if(isset($_SESSION["message"])){
      $message = $_SESSION["message"];
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
      unset($_SESSION['message']);
      session_destroy();
   }
?>

<?php require "./header.php" ?>

<div class="container">

<section>

<form action="../controllers/productController.php" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new product</h3>
   <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
   <label>Categories</label>
   <select name="p_cat" required>
      <option></option>
      <option value=1>Hot Drinks</option>
      <option value=2>Cold Drinks</option>
      <option value=3>Fresh Drinks</option>
   </select>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the product" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>product Cateogry</th>         
         <th>action</th>
      </thead>

      <tbody>
      <?php
      $data = $conn->query("select * from products");
            if($data->rowCount() > 0){
               while($row=$data->fetch(PDO::FETCH_ASSOC)){
         ?>

         <tr>
            <td><img src="../public/uploaded_img/<?php echo $row['image'];?>" height="100" alt=""></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['price'];?>$</td>
            <td><?php echo $row['id_categories'];?></td>
            <td>
               <a href="../controllers/productController.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete <?php echo $row['name']; ?> ?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="addproduct.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php };
            }else{
               echo "<div class='empty'>no product added</div>";
            }

         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php

      if(isset($_GET['edit'])){

         $id_product  = $_GET['edit'];
         $selectequery = "select * from products where id ='$id_product'";
         $data=  $conn->query($selectequery);
         if($data->rowCount() > 0){
            while($row=$data->fetch(PDO::FETCH_ASSOC)){

      ?>

   <form action="../controllers/productController.php" method="post" enctype="multipart/form-data">
      <img src="../public/uploaded_img/<?php echo $row['image'];?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $row['id'];?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $row['name'];?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $row['price'];?>">
      <input type="number" min="0" class="box" required name="update_p_cat" value="<?php echo $row['id_categories'];?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
         };
      };

      echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
   };

   ?>

</section>

</div>

<!-- custom js file link  -->
<script src="../public/js/script.js"></script>

</body>
</html>

