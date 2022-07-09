<?php

include '../models/database.php';

if (isset($_POST['book'])) {

    $name         = $_POST['name'];
    $email        = $_POST['email'];
    $room_namber  = $_POST['room_namber'];
    $message      = $_POST['message'];

    if(empty($email)  || empty($name) || empty($room_namber) || empty($message) ){
        $err="fill all feilds ";
        $_SESSION['feild']=$err;
        header("location:../index.php");

    }else{

        $select_users = "select * from users where name ='$name' and email = '$email'";
        $select_users = $conn->query($select_users);
        $row=$select_users->fetch(PDO::FETCH_ASSOC);

        if($select_users->rowCount() > 0){

            $insert_query = "insert into book (name, email, room_number, message) values ('$name', '$email', '$room_namber', '$message')";
            $insert_query = $conn->query($insert_query) or die("query Failed");
                
            }else{
              $err="user name or email is not sign in ";
              $_SESSION['feild']=$err;
            header("location:../index.php");
            }
    }
}

?>
