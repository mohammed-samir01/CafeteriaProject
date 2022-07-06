<?php
     //data for connection
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "cafeteria";


    //error1
    if(!isset($_GET['userSelect']) && !isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: You did not select date or user';
        header("location:../../resources/views/checksAdmin.php?error=".$error);
    }


    //error2
    if(!isset($_GET['userSelect']) && isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from and date to ';
        header("location:../../resources/views/checksAdmin.php?error=".$error);
    }


    //error3
    if(!isset($_GET['userSelect']) && !isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        $error = 'ERROR: select date from and date to ';
        header("location:../../resources/views/checksAdmin.php?error=".$error);
    }

    //error4
    if(isset($_GET['userSelect']) && !isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from and date to ';
        header("location:../../resources/views/checksAdmin.php?error=".$error);
    }


    //error5
    if(isset($_GET['userSelect']) && isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from and date to ';
        header("location:../../resources/views/checksAdmin.php?error=".$error);
    }



    //when admin select only dates
    if(!isset($_GET['userSelect']) && isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        //database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //get the selected user
        $sql = "select product_orders.quantity, products.name as productName , products.price , product_orders.id_orders , orders.created_at , users.name as userName , product_orders.quantity*products.price as TOTAL from orders ,users , product_orders, products  where users.id = orders.id_users AND products.id = product_orders.id_products AND orders.id = product_orders.id_orders  AND created_at BETWEEN '{$_GET['dateFrom']}' AND '{$_GET['dateTo']}'";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        $users = $stm->fetchAll();
        // var_dump($_GET['dateFrom']);
        $jUsers = json_encode($users);
        header("location:../../resources/views/checksAdmin.php?users=$jUsers");
        // var_dump($users[0]['name']);

    }


    //when admin select only user
    if(isset($_GET['userSelect']) && !isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        //database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
       // //get the orders of the user
        $sql = "select product_orders.quantity, products.name as productName , products.price , product_orders.id_orders , orders.created_at , users.name as userName , product_orders.quantity*products.price as TOTAL from orders ,users , product_orders, products where users.id = orders.id_users AND products.id = product_orders.id_products AND orders.id = product_orders.id_orders  AND orders.id_users = {$_GET['userSelect']}";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        $users = $stm->fetchAll();
        $jUsers = json_encode($users);
        header("location:../../resources/views/checksAdmin.php?users=$jUsers");
        // var_dump($orders[0]['created_at']);

    }


    // //when admin selects both user and date
    if(isset($_GET['userSelect']) && isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        //database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
       // //get the orders of the user
        $sql = "select product_orders.quantity, products.name as productName , products.price , product_orders.id_orders , orders.created_at , users.name as userName , product_orders.quantity*products.price as TOTAL from orders ,users , product_orders, products  where users.id = orders.id_users AND products.id = product_orders.id_products AND orders.id = product_orders.id_orders  AND id_users = {$_GET['userSelect']} AND created_at BETWEEN '{$_GET['dateFrom']}' AND '{$_GET['dateTo']}'";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        $users = $stm->fetchAll();
        $jUsers = json_encode($users);
        header("location:../../resources/views/checksAdmin.php?users=$jUsers");
        // var_dump($orders[0]['created_at']);

     
        }

                    
            
?>
