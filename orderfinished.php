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
   
$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

try {
    $connect = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
    $connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$t=time();
$now=date("Y-m-d h:i:s",$t);
$connect->query("insert into orders (ext ,created_at , id_users) values('5','{$now}','{$_POST['user_id']}');");
$r=$connect->query("select id from orders where created_at='{$now}';");
$r=$r->fetch(PDO::FETCH_ASSOC);
/////////////////////////////////////////////////////
$total_total_price=0;
foreach($_POST['product'] as $id=>$value){
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
?>