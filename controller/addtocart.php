<?php

$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

$conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['addtocart'])){
    $product_id=$_POST["product_id"];
    $conn->query("insert into cart (id , user_id) value ({$_POST['product_id']},'5');");
    header('location:../index.php');
    }

?>