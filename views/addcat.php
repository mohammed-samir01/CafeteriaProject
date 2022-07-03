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
   
<?php
session_start();
   if(isset($_SESSION["message"])){
      $message = $_SESSION["message"];
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
      unset($_SESSION['message']);
      session_destroy();
   }
?>

<?php include 'header.php'; ?>
<?php require "../models/database.php" ?>

<section>

<form action="../controllers/productController.php" method="post" class="add-product-form">
   <h3>Add New Category</h3>
   <input type="text" name="cat_name" placeholder="Enter The Category Name" class="box" required>
   <input type="submit" value="Add" name="add_cat" class="btn">
   <input type="reset" value="Reset" id="close-edit" class="option-btn">
</form>

</section>

<!-- custom js file link  -->
<script src="../public/js/script.js"></script>

</body>
</html>
