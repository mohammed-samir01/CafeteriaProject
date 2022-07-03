<?php

  $host = 'localhost';
  $dbname = 'cafeteria';
  $user = 'root';
  $pass = '';

  try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $conn;
      echo "Connected successfully"."<br>";

    } catch (PDOException $ex) {

      echo $ex->getMessage();

    }

?>
