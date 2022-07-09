<?php 

$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

$conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/********************************displat products to buy in menu  *********************************/
    $result=$conn->query("select id from orders where id_users='28' ORDER BY created_at DESC LIMIT 1;");
    $result = $result->fetch(PDO::FETCH_ASSOC);
    $pro=$conn->query("select id_products from product_orders where id_orders='{$result['id']}' ;");
    $pro=$pro->fetchAll(pdo::FETCH_ASSOC);
    foreach($pro as $product){
        $product_info=$conn->query("select name ,image ,price from products where id='{$product['id_products']}'; ");
        $product_info=$product_info->fetchAll(pdo::FETCH_ASSOC);
        foreach($product_info as $row){
        echo "
        <form class='box' method='post' action='controller/addtocart.php'>
        <img src='public/images/{$row['image']}'>
        <div class='content'>
        <input type='hidden' name='product_id'> 
            <h3>{$row['name']}</h3>
            <span>{$row['price']}</span>
        </div>
        </form>";}}
    
?>