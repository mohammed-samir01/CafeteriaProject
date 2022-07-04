<html>
<head></head>
<body>
<?php
var_dump($_GET);
$connect= new pdo("mysql:host=localhost;dbname=test","root","");
$name=$_GET['name'];
$result=$connect->query("select id, name,image from products where name='{$name}';");
$result=$result->fetch(PDO::FETCH_ASSOC);
var_dump($result);
foreach($result as $row){
  foreach($row as $key=>$value){
    echo "<form method='post' action='' style='width:200px;height:150px'>
   <img src='images/{$row['image']}' name='{$row['id']}' style='width:50px;hright:50px'>
   <button type='submit'>buy</button>
</form>";
}}
?>
  </body>
</html>