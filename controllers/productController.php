<?php

 require "../models/database.php";

//----------------------------------- Add Product----------------------------------//

if(isset($_POST['add_product'])){

    $p_name           = $_POST['p_name'];
    $p_price          = $_POST['p_price'];
    $p_cat            = $_POST['p_cat'];
    $p_image          = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder   = '../public/uploaded_img/'.$p_image;

    $insertquery = "INSERT INTO `products`(name, price, image,id_categories) VALUES('$p_name', '$p_price', '$p_image','$p_cat')";

    $insertquery = $conn->query($insertquery) or die('query failed');

    if($insertquery){
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[] = 'product add succesfully';
     }else{
        $message[] = 'could not add the product';
        
     }

    if(isset($message)){
        foreach($message as $message){
            session_start();
            $_SESSION["message"] = $message;
        };
    };

    header("Location:../views/addproduct.php");

}

  //----------------------------------- Delete----------------------------------//
  
  if(isset($_GET['delete'])){


        $id_product  = $_GET['delete'];

        $deletequery = "delete  from products where id='$id_product'";

        $del_pro=  $conn->query($deletequery) or die('query failed');

        if($del_pro){
            $message[] = 'product remove succesfully';
         }else{
            $message[] = 'could not remove the product';            
         }

    if(isset($message)){
        foreach($message as $message){
            session_start();
            $_SESSION["message"] = $message;
        };
    };
    
        header("Location:../views/addproduct.php");
}


  //----------------------------------- update----------------------------------//

    if(isset($_POST['update_product'])){

        $id_product       = $_POST['update_p_id'];
        $name             = $_POST['update_p_name'];
        $price            = $_POST['update_p_price'];
        $p_cat            = $_POST['update_p_cat'];
        $p_image          = $_FILES['update_p_image']['name'];
        $p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
        $p_image_folder   = '../public/uploaded_img/'.$p_image;
    
    if(!empty($name) && !empty($price) && !empty($p_cat) && !empty($p_image)){

        $updatequery = "update products set name='$name', price='$price', id_categories='$p_cat' ,image='$p_image' where id = '$id_product'";

        $updatequery  = $conn->query($updatequery);

        if($updatequery){
            move_uploaded_file($p_image_tmp_name, $p_image_folder);
            $message[] = 'product update succesfully';
         }else{
            $message[] = 'could not update the product';
            
         }
    
        if(isset($message)){
            foreach($message as $message){
                session_start();
                $_SESSION["message"] = $message;
            };
        };
    }

    header("Location:../views/addproduct.php");

    }

    //----------------------------------Add Cat-------------------//

    if(isset($_POST['add_cat'])){

        $cat_name = $_POST['cat_name'];

        $selectquery = "select cat_name from categories where cat_name = '$cat_name'";
        $data  = $conn->query($selectquery);

        if($data->rowCount() > 0){
                
            $message[] = 'Categoriey Already Exists';
    
        }else{
            $insertquery = "insert into categories (cat_name) values('$cat_name')";
            $insertquery = $conn->query($insertquery) or die('query failed');
            $message[] = 'Categoriey Added Succesfully';

        }

            if(isset($message)){
                foreach($message as $message){
                    session_start();
                    $_SESSION["message"] = $message;
                };
            };
         
        header("Location:../views/addcat.php");
    
    }


?>