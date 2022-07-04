<?php
require"db.php";

$db=new DB();
$connection=$db->get_connection();
$queryString=$db->getData("product_orders");
$data=$queryString->fetchAll(PDO::FETCH_ASSOC);
if($data!=NULL){
    echo"text";
}
echo"<pre>";
var_dump($data);
echo"</pre>";


?>