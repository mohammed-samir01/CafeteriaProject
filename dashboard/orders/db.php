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
// function getData($table,$condition=1){
//     return $this->connection->query("SELECT products.name AS  products_name , products.image
//      AS products_img from $table join products ON  products.id = product_orders.id_products ");
// }
function getData($table,$condition=1){
    return $this->connection->query("SELECT  products.name AS  products_name, products.price AS  products_price , products.image
     AS products_img , orders.created_at AS d, product_orders.quantity AS quantity, orders.id_users AS user , sum(products.price) ,(SELECT users.name AS user from  orders join users  ON orders.id_users = users.id  ) as nm from $table
      join products ON  products.id = product_orders.id_products
      JOIN orders ON orders.id =  product_orders.id_orders
      GROUP BY product_orders.quantity
      ");
}
// function deleteData($table,$condition){
//     return $this->connection->query("delete from $table where $condition");
// }
// function insertData($table,$cols,$values){
//     return $this->connection->query("insert into $table ($cols) values ($values)");
// }
// function updateData($table,$cols,$condition){
//     return $this->connection->query("update $table set $cols where $condition");
// }


}
?>