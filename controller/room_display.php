<?php
        
$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $conn->query("select room_number from room;");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo "<option class='text-muted' value='{$row['room_number']}'>
                {$row['room_number']}</option>";
        }
}
catch (PDOException $ex) {

    echo $ex->getMessage();

  }
        ?>