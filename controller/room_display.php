<?php
$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

$conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$room=$conn->query("select id , room_number from room ;");
$room=$room->fetchAll(pdo::FETCH_ASSOC);
foreach($room as $r){
    echo "<option value='{$r['id']}'>{$r['room_number']}</option>'";

}


?>