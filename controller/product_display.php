<?php
                    $connect = new pdo("mysql:host=localhost;dbname=test", "root", "");
                    if (isset($_GET['name'])) {
                        $name = $_GET['name'];
                        $result = $connect->query("select id, name,image from products where name='{$name}';");
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
                            $result=$connect->query("select id, name,image from products;");
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
                            $result=$connect->query("select id, name,image from products;");
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
                    ?>