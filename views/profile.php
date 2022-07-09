<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usn</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="../public/image/favicon_io/android-chrome-512x512.png" type="image/x-icon">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../public/css/profile.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> Cafeteria <i class="fas fa-mug-hot"></i> </a>

        <nav class="navbar">
            <a href="index.php#home">home</a>
            <a href="index.php#about">about</a>
            <a href="index.php#menu">menu</a>
            <a href="index.php#review">review</a>
            <a href="index.php#book">book</a>
            <a href="cart.php">Cart</a>
            <a href="#">Profile</a>
        </nav>

        <a href="index.php#book" class="btn">book a table</a>


    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="row">

            <div class="content">
                <h3>Your Profile Picture</h3>
                <div class="image-control">
                    <img src="../public/image/pic-1.png" class="main-home-image" alt="">
                    <div class="btns">
                        <a href="#" class="btn">Change Photo <i class="fa fa-pen"></i></a>
                        <a href="#" class="btn">Remove <i class="fa fa-trash"></i></a>
                    </div>
                </div>

                <hr>

                <form action="" class="book">

                    <div class="name general">
                        <label for="name">Name</label>
                        <input type="text" placeholder="your name" class="box" id="name" name="name">
                    </div>

                    <div class="email general">
                        <label for="email">Email</label>
                        <input type="email" placeholder="your email" class="box" id="email" name="email">
                    </div>

                    <div class="phone general">
                        <label for="phone">Phone Number</label>
                        <input type="number" placeholder="your number" class="box" id="phone" name="phone">
                    </div>

                    <div class="bio general">
                        <label for="bio">Bio</label>
                        <textarea name="" placeholder="your message" class="box" cols="30" rows="10" id="bio"
                            name="bio"></textarea>

                    </div>
                    <input type="submit" value="Save Changes" class="btn" name="submit">

                </form>

            </div>

            <div class="contentThree">
                <h3>
                    All Orders
                </h3>
                <table>
                    <thead>
                        <tr>
                            <th>order</th>
                            <th>order</th>
                            <th>order</th>
                            <th>order</th>
                            <th>order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>order</td>
                            <td>order</td>
                            <td>order</td>
                            <td>order</td>
                            <td>order</td>
                        </tr>
                        <tr>
                            <td>order</td>
                            <td>order</td>
                            <td>order</td>
                            <td>order</td>
                            <td>order</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </section>


    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>our branches</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> Cairo </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Mansoura </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Zagzig </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Alex </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Giza </a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="index.php#home"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="index.php#about"> <i class="fas fa-arrow-right"></i> about </a>
                <a href="index.php#menu"> <i class="fas fa-arrow-right"></i> menu </a>
                <a href="index.php#review"> <i class="fas fa-arrow-right"></i> review </a>
                <a href="index.php#book"> <i class="fas fa-arrow-right"></i> book </a>
                <a href="cart.php"> <i class="fas fa-arrow-right"></i> Cart</a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Profile</a>
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

        <!-- footer section ends -->

        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="../public/js/script.js"></script>
</body>

</html>