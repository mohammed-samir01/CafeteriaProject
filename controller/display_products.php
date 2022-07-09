<?php 

$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

$conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/********************************displat products to buy in menu  *********************************/


if(isset($_POST['name'])){
    $result=$conn->query("select id,name,price,image from products where name LIKE '{$_POST['name']}%';");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
        echo "
        <form class='box' method='post' action='controller/addtocart.php'>
        <img src='public/images/{$row['image']}'>
        <div class='content'>
        <input type='hidden' name='product_id' value='{$row['id']}'> 
            <h3>{$row['name']}</h3>
            <span>{$row['price']}</span>
        </div>
        <button class='btn' name='addtocart'>select</button>
        </form>";}
    }else{
$result=$conn->query("select id,name,price,image from products;");
$result = $result->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row){
    echo "
    <form class='box' method='post' action='controller/addtocart.php'>
    <img src='public/images/{$row['image']}'>
    <div class='content'>
        <input type='hidden' name='product_id' value='{$row['id']}'> 
        <h3>{$row['name']}</h3>
        <span>{$row['price']}</span>
    </div>
    <button class='btn' name='addtocart'>select</button>
</form>";
}}


/****************************************** display products in cart ************************* */
  
/*******************************************************************room display */
  
/********************************************** */

?>