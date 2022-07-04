<!-- <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="css/add_order_style.css">
</head>
<!-- <body>
<section class="content">
            <div class="col-4 ">
                        <form method="get" action="adminorder.php">
                            <div class="input-group-lg">
                                <select class="custom-select" id="inputGroupSelect01" name='user_id'>
                                <?php
                                $connect = new pdo("mysql:host=localhost;dbname=test", "root", "");
                                $result = $connect->query("select id, name from users;");
                                $result = $result->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    echo "<option value={$row['id']}>{$row['name']}</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="container-fluid w-100" id="search_product" style="display:flex;justify-content:space-around">
                            <?php
                            /*
                                $connect = new pdo("mysql:host=localhost;dbname=test", "root", "");
                                $result=$connect->query("select id, name,image from products;");
                                $result=$result->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row){
                                    echo"<div class='card' style='width:12%;height:16%'>
                                        <img src='images/{$row['image']}' class='card-img-top w-100 h-25' >
                                        <div class='card-body'>
                                        <h5 class='card-title text-center'>{$row['name']}</h5><br>
                                        <div class='cat comedy'>
                                        <label for='product_id'>
                                        <input type='checkbox' name='product_id' value='{$row['id']}'><span>select</span>
                                        </label>
                                        </div>
                                        </div></div>";
                                    } */
                            ?>
                        </div>
                            <button type="submit" >Go to Cart</button>
                            
                    </form>
                </div>
            </section>
</body>  -->

<form action="ad.php" method="get">
<?php
                                $connect = new pdo("mysql:host=localhost;dbname=test", "root", "");
                                $result=$connect->query("select id, name,image from products;");
                                $result=$result->fetchAll(PDO::FETCH_ASSOC);
                                $x=0;
                                $p='product';
                                foreach($result as $row){
                                    $x++;
                                    $c=$p.$x;
                                    echo"<div class='card' style='width:12%;height:16%'>
                                        <img src='images/{$row['image']}' class='card-img-top w-100 h-25' >
                                        <div class='card-body'>
                                        <h5 class='card-title text-center'>{$row['name']}</h5><br>
                                        <div class='cat comedy'>
                                        <label for='$x'>
                                        <input type='checkbox' name='$c' value='{$row['id']}' id='$x'><span>select</span>
                                        </label>
                                        </div>
                                        </div></div>";
                                    }
                            ?>
<button type="submit" >Go to Cart</button>

</form>