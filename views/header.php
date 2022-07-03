<header class="header">
   <div class="flex">

      <a href="addproduct.php" class="logo">Halbasa Cafee</a>

      <nav class="navbar">
         <a href="addproduct.php">Add products</a>
         <a href="products.php">view products</a>
         <a href="addcat.php">Add Category</a>
         <a href="addcat.php">Reset Password</a>

      </nav>

      <?php
         require "../models/database.php";
         $selectquery = "select * from cart";
         $selectquery = $conn->query($selectquery) or die("query failed");
         $row_count   = $selectquery->rowCount();
      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count ;?></span></a>

      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</header>