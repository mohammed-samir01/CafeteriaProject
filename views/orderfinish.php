<?php 
echo"<pre>";
var_dump($_GET);
echo"<pre>";
   
$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

try {
    $connect = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
    $connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$t=time();
$now=date("Y-m-d h:i:s",$t);
$connect->query("insert into orders (created_at , id_users , id_room) values('{$now}','28' , '{$_GET['room_number']}');");
$r=$connect->query("select id from orders where created_at='{$now}';");
$r=$r->fetch(PDO::FETCH_ASSOC);
/////////////////////////////////////////////////////
$total_total_price=0;
foreach($_GET['product'] as $id=>$value){
/* $totalprice=$connect->query("select (price*{$value})as price from products where id='{$id}';");
$totalprice=$totalprice->fetch(PDO::FETCH_ASSOC);
$totalprice = (int)$totalprice['price']; */
$connect->query("insert into product_orders values('{$id}','{$r['id']}','{$value}');");
}
$t=time();
echo(date("Y-m-d h:i:s",$t));
  } 
  catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    header('location:../index.php');


?>