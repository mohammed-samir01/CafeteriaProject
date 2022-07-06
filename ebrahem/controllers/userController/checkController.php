<?php

    session_start();
    $_SESSION['id'] =2 ;


     //data for connection
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "cafeteria";


    //error1
    if(!isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: You did not select date or user';
        header("location:../../resources/views/checksUser.php?error=".$error);
    }

    //error2
    if(isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from And date to';
        header("location:../../resources/views/checksUser.php?error=".$error);
    }

    //error3
    if(!isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from And date to';
        header("location:../../resources/views/checksUser.php?error=".$error);
    }


    //when admin select only dates
    if(isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        //database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //get the selected user
        $sql = "select orders.id ,orders.created_at ,orders.order_status, users.name , product_orders.quantity*products.price as TOTAL from orders ,users , product_orders, products  where users.id = orders.id_users AND products.id = product_orders.id_products AND orders.id = product_orders.id_orders  AND created_at BETWEEN '{$_GET['dateFrom']}' AND '{$_GET['dateTo']}' AND users.id = {$_SESSION['id']}";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        $users = $stm->fetchAll();
        $jUsers = json_encode($users);
        header("location:../../resources/views/checksUser.php?users=$jUsers");
        // var_dump($users[0]['name']);

       
    }


   
       



                    
            
?>
