<?php

$host = 'sql8.freesqldatabase.com';
$dbname = 'sql8504061';
$user = 'sql8504061';
$pass = 'jXp9bj23mh';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    if (isset($_GET['name'])) {
                        $name = $_GET['name'];
                        $result = $conn->query("select id, name,image from products where name='{$name}';");
                        $result = $result->fetchAll(PDO::FETCH_ASSOC);
                        $x=0;
                        $p='product';
                        foreach ($result as $row) {
                                $x++;
                                $c=$p.$x;
                            echo "<div class='card' style='width:12%;height:16%'>
                                <img src='public/images/{$row['image']}' class='card-img-top w-100 h-25' >
                                <div class='card-body'>
                                <h5 class='card-title text-center'>{$row['name']}</h5><br>
                                <div class='cat comedy'>
                                        <label for='$x'>
                                        <input type='checkbox' name='$c' value='{$row['id']}' id='$x'><span>select</span>
                                        </label>
                                        </div>
                                </div></div>";
                        }
                        }
                        elseif(isset($_GET['all'])){
                            $result=$conn->query("select id, name,image from products;");
                            $result=$result->fetchAll(PDO::FETCH_ASSOC);
                            $x=0;
                            $p='product';
                            foreach($result as $row){
                                $x++;
                                $c=$p.$x;
                                echo "<div class='card' style='width:12%;height:16%'>
                                     <img src='public/images/{$row['image']}' class='card-img-top w-100 h-25' >
                                        <div class='card-body'>
                                        <h5 class='card-title text-center'>{$row['name']}</h5><br>
                                        <div class='cat comedy'>
                                        <label for='$x'>
                                        <input type='checkbox' name='$c' value='{$row['id']}' id='$x'><span>select</span>
                                        </label>
                                        </div>
                                        </div></div>";}
                        }
                        else
                         {
                            $result=$conn->query("select id, name,image from products;");
                            $result=$result->fetchAll(PDO::FETCH_ASSOC);
                            $x=0;
                            $p='product';
                            foreach($result as $row){
                                $x++;
                                $c=$p.$x;
                                echo "<div class='card' style='width:12%;height:16%'>
                                     <img src='public/images/{$row['image']}' class='card-img-top w-100 h-25' >
                                        <div class='card-body'>
                                        <h5 class='card-title text-center'>{$row['name']}</h5><br>
                                        <div class='cat comedy'>
                                        <label for='$x'>
                                        <input type='checkbox' name='$c' value='{$row['id']}' id='$x'><span>select</span>
                                        </label>
                                        </div>
                                        </div></div>";
                        }} 
                    } catch (PDOException $ex) {

                        echo $ex->getMessage();
                    
                      }?>