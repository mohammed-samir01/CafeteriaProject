<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- bootstrap4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <!-- header section starts  -->
    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> coffee <i class="fas fa-mug-hot"></i> </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#home">My Orders</a>
            
        </nav>

        <a href="#" class="btn">UserName</a>

    </header>

  





    <!-- order section -->
    <section class="home" id="home" style="font-size:20px">


       

            <!-- orders table and select -->
            <div class="content">

            <?php
            //data for connection
            $servername = "localhost";
            $username = "root";
            $pass = "";
            $dbname = "cafeteria";

            //database connection
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "select distinct created_at from orders";
            $stm = $conn->prepare($sql);
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
            $orders = $stm->fetchAll();
            // var_dump($orders);

            ?>




                <form action="../../controllers/userController/checkController.php"  method="get">

                    <!-- date from -->
                    <select name="dateFrom">
                        <option disabled selected> DATE FROM </option>
                    <?php 
                            foreach ($orders as $order) {
                                echo "<option value=".$order['created_at'].">".$order['created_at']."</option>";
                            }
                    ?> 
                    </select>


                    <!-- date to -->
                    <select name="dateTo">
                        <option disabled selected> DATE To </option>
                    <?php 
                            foreach ($orders as $order) {
                                echo "<option value=".$order['created_at'].">".$order['created_at']."</option>";
                            }
                    ?> 
                    </select>

                    <input type="submit" value="filter">

                </form>
               
                </div>
                    <table class="table table-striped table-dark mt-2">
                            
                                
                                <thead scope="col"> 
                                    <tr>
                                         <td> 
                                             Order date 
                                         </td> 

                                         <td> 
                                             Status
                                         </td> 

                                         <td> 
                                             Order Price
                                         </td> 

                                         <td> 
                                             Action
                                         </td> 


                                    <tr>

                                    

                                </thead>

                                <tbody class="orderTable">
                                <?php 

                                if(isset($_GET['users'])){
                                    $users = json_decode($_GET['users'],true);
                                    $total = 0;
                                   
                                    foreach ($users as $user) {
                                        // echo "<tr>"."<td>".$user['created_at']."</td>"."<td>".$user['order_status']."</td>"."<td>".$user['TOTAL']."</td>"."<td>". "<a href='../../controllers/userController/deleteOrder.php?order_id=".$user['id']."'". ">" .$user['action']. "</a>"."</td>"."</tr>";
                                        echo "<tr>"."<td>".$user['created_at']."</td>"."<td>".$user['order_status']."</td>"."<td>".$user['TOTAL']."</td>"."<td>";
                                        echo $user['order_status']=="processing" ? "<a href='../../controllers/userController/deleteOrder.php?order_id=".$user['id']."'". ">"."CANCEL"."</a> </td> </tr>":"</td> </tr>";

                                        
                                        
                                         $GLOBALS['total'] += $user['TOTAL'];
                                    }   
                                }
                                ?> 
                                    
                                </tbody>
                                
                                  
                    </table>

                    <?php
                    if(isset($_GET['users'])){
                         echo  "TOTAL = " .$total ;
                    }
                    ?>
                   



            <div class="image">
                <img src="image/home-img-1.png" class="main-home-image" alt="">
            </div>

        </div>

        <!-- <div class="image-slider">
            <img src="../image/home-img-1.png" alt="">
            <img src="../image/home-img-2.png" alt="">
            <img src="../image/home-img-3.png" alt="">
        </div> -->

    </section>

    
   











   
    <!-- footer -->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>our branches</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> india </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> USA </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> france </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> africa </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Japan </a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> about </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> menu </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> review </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> book </a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
                <a href="#"> <i class="fas fa-envelope"></i> shaikhanas@gmail.com </a>
                <a href="#"> <i class="fas fa-envelope"></i> mumbai, india = 400104 </a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            </div>

        </div>

        <div class="credit"> creatd by <span>mr. web designer</span> | all rights reserved </div>

    </section>

    <!-- footer section ends -->








    
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- bootstrap4 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- custom js file link  -->
    <script src="../js/script.js"></script>



    

</body>

</html>