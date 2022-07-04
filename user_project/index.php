
<?php

require_once"db.php";
$db=new DB();
$connection=$db->get_connection();
$queryGetRoom=$db->getData("room_number	","room");
$rowRoom=$queryGetRoom->fetchAll(PDO::FETCH_ASSOC);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive coffee website design tutorial</title>


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> coffee <i class="fas fa-mug-hot"></i> </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
            <a href="#book">book</a>
        </nav>

        <a href="#" class="btn">book a table</a>

    </header>

    <!-- header section ends -->



 

 
    <!-- book section starts  -->

    <section class="book" id="book">

        <h1 class="heading"> booking <span>reserve a table</span> </h1>

        <form action="check.php" method="POST">

            <input type="text" placeholder="your name"    name="user_name" class="box">
            <input type="email" placeholder="your email"  name="user_email" class="box" value="hagar@gail.com">
            <!-- <input type="number" placeholder=" room number"> -->
             <select name="room" class="box">
                <option value="">select room</option>
                <?php
                
                foreach($rowRoom as $value){
                    print_r("<option>".$value['room_number']."</option>");
                }
                ?>
             </select>
            <textarea name="msg" placeholder="your message" class="box" id="" cols="30" rows="10"></textarea>

            <input type="submit" name="submit" value="send message" class="btn">
            <?php echo"<p style='text-align:center; color:red; font-size:16px;'>". (isset( $error['not_same'])?  $error['not_same'] ."</p>" :'');?>
            <?php echo"<p style='text-align:center; color:red; font-size:16px;'>". (isset( $error['fill-data'])? $error['fill-data']."</p>" :'');?>

        </form>

    </section>

    <!-- book section ends -->

    <!-- footer section starts  -->

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


    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>