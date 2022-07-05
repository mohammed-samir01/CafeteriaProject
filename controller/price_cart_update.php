<?php
if(isset($_POST)){

    $host = 'sql8.freesqldatabase.com';
    $dbname = 'sql8504061';
    $user = 'sql8504061';
    $pass = 'jXp9bj23mh';
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result=$conn->query("select price from products where id='{$_POST['id']}';");
        $r=$result->fetch(PDO::FETCH_ASSOC);
        echo $r['price']*$_POST['q'];

    }
    catch (PDOException $ex) {
        echo $ex->getMessage();
      }
    
}
    

?>