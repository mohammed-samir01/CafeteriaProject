<?php


$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

$conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['id']) && isset($_POST['q'])){
        global $conn;
        $first=explode("[",$_POST['id']);
        $second=explode("]",$first[1]);
        $id=$second[0];
        $price=$conn->query("select price from products where id='$id';");
        $price=$price->fetch(pdo::FETCH_ASSOC);
        echo $price['price']*$_POST['q'];
}?>