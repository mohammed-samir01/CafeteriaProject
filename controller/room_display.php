<?php
    $connect = new pdo("mysql:host=localhost;dbname=test", "root", "");
    $result = $connect->query("select room_number from room;");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo "<option class='text-muted' value='{$row['room_number']}'>
                {$row['room_number']}</option>";
        }
        ?>