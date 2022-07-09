<?php

  $host = 'sql8.freesqldatabase.com';
  $dbname = 'sql8504061';
  $user = 'sql8504061';
  $pass = 'jXp9bj23mh';

  try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    } catch (PDOException $ex) {

      echo $ex->getMessage();

    }

?>
