<?php
$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

$conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$product_table_cart=$conn->query("select id from cart where user_id='5';");
   $product_table_cart = $product_table_cart->fetchAll(PDO::FETCH_ASSOC);
   foreach($product_table_cart as $p){
   $product_data=$conn->query("select id ,name,image,price from products where id='{$p['id']}';");
   $product_data=$product_data->fetchAll(pdo::FETCH_ASSOC);
   foreach($product_data as $row){
        $x=0;
        echo"<div class='card' style='border-bottom:2px solid #808080 ; padding-bottom:13px;'>
        <img src='../public/image/{$row['image']}' class='main-home-image'>
        <div class='info'>
            <h3>{$row['name']}</h3>
        </div>
        <div class='quantity' >
            <i class='fa fa-minus' onclick='min(this);'></i>
            <span> <input type='text' name='product[{$p['id']}]' value='1' class='q'> </span>
            <i class='fa fa-plus' onclick='plus(this);'></i>
        </div>
        <div class='price'>
            <h4 class='p_date' id='product[{$p['id']}]'>{$row['price']}</h4>
        </div>
        <i class='fa fa-times' onclick='remove_product(this);'></i>
    </div>
    <br>";
   }}?>