<?php 
$details=$_POST['details'];
unset($_POST['details']);
echo "***************************************";
echo "<pre>";
var_dump($_POST);
echo "<pre>";
echo "****************************************";
echo "<pre>";
var_dump($_POST['product']);
echo "<pre>";


$connect = new pdo("mysql:host=localhost;dbname=test", "root", "");
$total_total_price=0;
foreach($_POST['product'] as $id=>$value){
$totalprice=$connect->query("select (price*{$value})as price from products where id='{$id}';");
$totalprice=$totalprice->fetch(PDO::FETCH_ASSOC);
$totalprice = (int)$totalprice['price'];
$connect->query("insert into order_products values('{$_POST['user_id']}','{$id}','{$value}', '$totalprice', NOW(),'{$_POST['room']}' );");


}
?>