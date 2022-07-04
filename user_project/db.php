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

function getData($cols,$table,$condition=1){
  return $this->connection->query(" SELECT $cols from $table  where $condition");
}

// function deleteData($table,$condition){
//     return $this->connection->query("delete from $table where $condition");
// }
function insertData($table,$cols,$values){
    return $this->connection->query("insert into $table ($cols) values ($values) ");
}
// function updateData($table,$cols,$condition){
//     return $this->connection->query("update $table set $cols where $condition");
// }


}
?>
