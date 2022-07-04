<?php
class DB{
private $host="localhost";
 private $dbname="cafeteria";
 private $uname="root";
 private $password="";
private $connection=null;
//constructor do first
 function __construct()
 {
    try{
        $this->connection=new pdo("mysql:dbname=$this->dbname;host=$this->host",
        $this->uname,
        $this->password);


    }catch(PDOException  $e){
        echo $e->getMessage();

    }
 }


 function get_connection()
 {
    return $this->connection;  //return el connection
 }

function getData($table){
  return $this->connection->query("SELECT
   id_orders,
    quantity,
   GROUP_CONCAT(products.image SEPARATOR ',') AS images,
    GROUP_CONCAT(products.price SEPARATOR ',') AS price,
  
    GROUP_CONCAT(products.name SEPARATOR ',') AS names ,
    GROUP_CONCAT(product_orders.total_price SEPARATOR ',') AS totprice
FROM
    $table
    JOIN products ON product_orders.id_products = products.id
   JOIN orders ON product_orders.id_orders = orders.id
  
   GROUP BY quantity
  
  
 ;");
}




}
?>
