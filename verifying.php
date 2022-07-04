<?php
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $radio = $_POST['radio'];

    $connection = new PDO ("mysql:host=localhost;dbname=cafeteria", "root", "");
    if ($radio == "admin") {
        $data = $connection->query("select email, password from admin where email = '$email' and password = '$pass'");
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        if (count($result) == 0) {
            echo "email or password is incorrect <br>";
        }
        else {header("location:admin.php");}
    }

    elseif ($radio == "user") {
        $data = $connection->query("select email, password from users where email = '$email' and password = '$pass'");
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        if (count($result) == 0) {
            echo "email or password is incorrect";
        }
        else {header("location:users.php");}
    }
?>