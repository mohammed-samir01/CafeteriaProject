<?php
    require "models/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="public/image/favicon_io/android-chrome-512x512.png" type="image/x-icon">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="public/css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> Cafeteria <i class="fas fa-mug-hot"></i> </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
            <a href="#book">book</a>
            <a href="../index.php#menu">my last order</a>
            <a href="views/cart.php">Cart</a>
            <a href="views/profile.php">Profile</a>
        </nav>

        <a href="#book" class="btn">book a table</a>


    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <form class="row">

            <div class="content">
                <h3>fresh coffee in the morning</h3>
                <a href="#menu" class="btn">buy one now</a>
            </div>

            <div class="image">
                <img src="public/image/home-img-1.png" class="main-home-image" alt="">
            </div>

        </form>

        <div class="image-slider">
            <img src="public/image/home-img-1.png" alt="">
            <img src="public/image/home-img-2.png" alt="">
            <img src="public/image/home-img-3.png" alt="">
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> about us <span>why choose us</span> </h1>

        <div class="row">

            <div class="image">
                <img src="public/image/about-img.png" alt="">
            </div>

            <div class="content">
                <h3 class="title">what's make our coffee special!</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse et commodi, ad, doloremque obcaecati maxime quam minima dolore mollitia saepe quos, debitis incidunt. Itaque possimus adipisci ipsam harum at autem.</p>
                <a href="#" class="btn">read more</a>
                <div class="icons-container">
                    <div class="icons">
                        <img src="public/image/about-icon-1.png" alt="">
                        <h3>quality coffee</h3>
                    </div>
                    <div class="icons">
                        <img src="public/image/about-icon-2.png" alt="">
                        <h3>our branches</h3>
                    </div>
                    <div class="icons">
                        <img src="public/image/about-icon-3.png" alt="">
                        <h3>free delivery</h3>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- menu section starts  -->
    <section class="menu" id="menu">
        <h1 class="heading"> <span>mu last order</span> </h1>
        <div class="box-container" id='show_items'>

           <!--  <form class="box">
                <img src="public/image/menu-1.png" alt="">
                <div class="content">
                    <h3>test</h3>
                    <span>$8.99</span>
                </div>
                <button class="btn" >ok</button>
            </form> -->
            <?php require"controller/last_order.php"; ?>

        </div>
    </section>

    <section class="menu" id="menu">
        <h1 class="heading"> our menu <span>popular menu</span> </h1>
        <form method="get" action="#" >
            <input type="search" id="searchbar" style="margin:2rem 2rem;" class="btn " placeholder="search item" name="name" oninput="search(this);">
        </form>
        <div class="box-container" id='show_items'>

           <!--  <form class="box">
                <img src="public/image/menu-1.png" alt="">
                <div class="content">
                    <h3>test</h3>
                    <span>$8.99</span>
                </div>
                <button class="btn" >ok</button>
            </form> -->
            <?php require"controller/display_products.php"; ?>

        </div>
    </section>

    <!-- menu section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"> reviews <span>what people says</span> </h1>

        <div class="swiper review-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="public/image/pic-1.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aliquid eveniet qui, similique aut sit.</p>
                    <h3>Muhammed Samir</h3>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="public/image/pic-2.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aliquid eveniet qui, similique aut sit.</p>
                    <h3>Salma Shehata</h3>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="public/image/pic-3.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aliquid eveniet qui, similique aut sit.</p>
                    <h3>Muhammed Emad</h3>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="public/image/pic-4.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aliquid eveniet qui, similique aut sit.</p>
                    <h3>Hager Rashed</h3>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="public/image/pic-4.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aliquid eveniet qui, similique aut sit.</p>
                    <h3>Ebrahim Rashed</h3>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="public/image/pic-4.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aliquid eveniet qui, similique aut sit.</p>
                    <h3>Muhammed Gamal</h3>
                </div>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- book section starts  -->

    <section class="book" id="book">

        <h1 class="heading"> booking <span>reserve a table</span> </h1>

        <form action="controller/controller.php" method="post">

            <input type="text" placeholder="your name" class="box" name="name">
            <input type="email" placeholder="your email" class="box" name="email">
            <select name="room_namber" class="box">
                <?php
                $select_rooms = "select room_number from room";
                $rowRoom = $conn->query($select_rooms);

                ?>
                <option value="">Select Room</option>
                <?php foreach ($rowRoom as $value) {
                    print_r("<option>" . $value['room_number'] . "</option>");
                } ?>
            </select>
            <textarea name="message" placeholder="your message" class="box" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn" name="book">
            <?php
            if (isset($_SESSION['feild'])) {
                echo "<p style='text-align:center; color:red; font-size:16px;'>" . $_SESSION['feild'] . "</p>";
                session_unset();
                session_destroy();
            }
            ?>
        </form>
    </section>

    <!-- book section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="#home"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="#about"> <i class="fas fa-arrow-right"></i> about </a>
                <a href="#menu"> <i class="fas fa-arrow-right"></i> menu </a>
                <a href="#review"> <i class="fas fa-arrow-right"></i> review </a>
                <a href="#book"> <i class="fas fa-arrow-right"></i> book </a>
                <a href="views/cart.php"> <i class="fas fa-arrow-right"></i> Cart</a>
                <a href="views/profile.php"> <i class="fas fa-arrow-right"></i> Profile</a>
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
                <a href="#"> <i class="fas fa-envelope"></i> cafe@gmail.com </a>
                <a href="#"> <i class="fas fa-envelope"></i> Mansoura, Egypt = 35511 </a>
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

        <div class="credit"> created by <span>KINGS TEAM</span> | all rights reserved </div>

    </section>
    <script>
        function search(e){
            let name=e.value;
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("show_items").innerHTML =
                this.responseText;
                }
                };
                xhttp.open("POST", "controller/display_products.php");
                 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 xhttp.send("name="+name); 
        }
        </script>

    <!-- footer section ends -->

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="public/js/script.js"></script>

</body>

</html>