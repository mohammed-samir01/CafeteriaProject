<?php
     //data for connection
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "cafeteria";


    //error1
    if(!isset($_GET['userSelect']) && !isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: You did not select date or user';
        file_put_contents("user.json", "");
        header("location:checks2.php?error=".$error);
    }


    //error2
    if(!isset($_GET['userSelect']) && isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from and date to ';
        file_put_contents("user.json", "");
        header("location:checks2.php?error=".$error);
    }


    //error3
    if(!isset($_GET['userSelect']) && !isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        $error = 'ERROR: select date from and date to ';
        file_put_contents("user.json", "");
        header("location:checks2.php?error=".$error);
    }

    //error4
    if(isset($_GET['userSelect']) && !isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from and date to ';
        file_put_contents("user.json", "");
        header("location:checks2.php?error=".$error);
    }


    //error5
    if(isset($_GET['userSelect']) && isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from and date to ';
        file_put_contents("user.json", "");
        header("location:checks2.php?error=".$error);
    }



    //when admin select only dates
    if(!isset($_GET['userSelect']) && isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        //database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //get the selected user
        $sql = "SELECT  users.name , orders.created_at from users , orders where users.id = orders.id_users AND created_at BETWEEN '{$_GET['dateFrom']}' AND '{$_GET['dateTo']}'";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        $users = $stm->fetchAll();
        $jUsers = json_encode($users);
        $jFile = fopen("user.json", "w");
        fwrite($jFile,$jUsers);
        header("location:checks2.php");
        // var_dump($users[0]['name']);

        

        // //users
        // echo "<table border=1 >";

        // foreach ($users as $user) {
        //         echo "<tr> <td>" .$user['name']."</td> </tr>";
        // }
 
        // echo "</table> <br> <br>" ;    

                




        // //orders
        // echo "<table border=1>";

        // foreach ($users as $user) {
        //         echo "<tr> <td>" .$user['created_at']."</td> </tr>";
        // }

        // echo "</table>";  
    }


    //when admin select only user
    if(isset($_GET['userSelect']) && !isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        //database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //get the selected user
        // $sql = "select name from users where id = {$_GET['userSelect']}";
        // $stm = $conn->prepare($sql);
        // $stm->execute();
        // $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        // $user = $stm->fetchAll();
        // $userName =$user[0]['name'];
        // $_SESSION['userName']=$userName;

        
       // //get the orders of the user
        $sql = "select orders.created_at , users.name from orders ,users  where users.id = orders.id_users AND orders.id_users = {$_GET['userSelect']}";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        $users = $stm->fetchAll();
        $jUsers = json_encode($users);
        $jFile = fopen("user.json", "w");
        fwrite($jFile,$jUsers);
        header("location:checks2.php");
        // var_dump($orders[0]['created_at']);




        //user
        // echo "<table border=1 >";
        // echo "<tr> <td>" . $userName."</td> </tr>";
        // echo "</table> <br> <br>" ;    




        // // //orders
        // echo "<table>";

        // foreach ($orders as $order) {
        //         echo "<tr> <td>" .$order['created_at']."</td> </tr>";
        // }
    }


    // //when admin selects both user and date
    if(isset($_GET['userSelect']) && isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        //database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //get the selected user 
        // $sql = "select name from users where id = {$_GET['userSelect']}";
        // $stm = $conn->prepare($sql);
        // $stm->execute();
        // $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        // $user = $stm->fetchAll();
        // $userName =$user[0]['name'];

        
       // //get the orders of the user
        $sql = "select orders.created_at , users.name from orders , users where users.id = orders.id_users AND id_users = {$_GET['userSelect']} AND created_at BETWEEN '{$_GET['dateFrom']}' AND '{$_GET['dateTo']}'";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        $users = $stm->fetchAll();
        $jUsers = json_encode($users);
        $jFile = fopen("user.json", "w");
        fwrite($jFile,$jUsers);
        header("location:checks2.php");
        // var_dump($orders[0]['created_at']);

        //user
        // echo "<table border=1 >";
        // echo "<tr> <td>" . $userName."</td> </tr>";
        // echo "</table> <br> <br>" ;    


        // // //orders
        // echo "<table>";

        // foreach ($orders as $order) {
        //         echo "<tr> <td>" .$order['created_at']."</td> </tr>";
        // }
    


        }

                    
            
?>
