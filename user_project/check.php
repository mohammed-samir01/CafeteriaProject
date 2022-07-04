<?php

require"db.php";

$db=new DB();
$connection=$db->get_connection();

var_dump($_POST);
$email =$_POST['user_email'];
$name =$_POST["user_name"];
$room =$_POST['room'];
$msg=$_POST['msg'];


$errors=[];
if(isset($_POST['submit']) ){
 if(empty($email)&& empty($name) && empty($room) && empty($msg)){
    header("location:index.php");
    $errors['fill-data']="fill all feilds ";

 }else{
        $queryGet=$db->getData("email","users","email ='".$_POST['user_email'] . "' and name ='".$_POST['user_name']."'" );
    
        $row=$queryGet->fetchAll(PDO::FETCH_ASSOC);
   
   if(!empty($row)){
    $query=$db->insertData("book","name,email,number_room,message","'$name','$email',$room,'$msg'");
    $r=$query->fetchAll(PDO::FETCH_ASSOC);
    
    }else{
    header("location:index.php");
    $errors['not_same']="user name or email is not sign in ";
    // var_dump($errors);
    }

    }
   
}
  



?>


