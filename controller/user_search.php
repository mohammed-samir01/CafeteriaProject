<?php
    $connect = new pdo("mysql:host=localhost;dbname=test", "root", "");
    $result = $connect->query("select id, name from users;");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
    echo "<option value={$row['id']}>{$row['name']}</option>";
    
}?>
