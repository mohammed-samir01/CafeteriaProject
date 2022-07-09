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
    <link rel="stylesheet" href="../public/css/cart.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> Cafeteria <i class="fas fa-mug-hot"></i> </a>

        <nav class="navbar">
            <a href="../index.php#home">home</a>
            <a href="../index.php#about">about</a>
            <a href="../index.php#menu">menu</a>
            <a href="../index.php#review">review</a>
            <a href="../index.php#book">book</a>
            <a href="../index.php#menu">my last order</a>
            <a href="#">Cart</a>
            <a href="profile.php">Profile</a>
        </nav>
        <a href="index.php#book" class="btn">book a table</a>


    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">
    <form method='get' action='orderfinish.php'>
        <div class="row">
            <div class="leftContent">
                <div class="cartHeader">
                    <h3>Shopping Cart</h3>
                </div>
<!-- 
                <div class="card">
                    <img src="../public/image/pic-1.png" class="main-home-image" alt="">
                    <div class="info">
                        <h4>Shirt</h4>
                        <h3>cotton T-shirt</h3>
                    </div>
                    <div class="quantity">
                        <i class="fa fa-minus"></i>
                        <span> 1 </span>
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="price">
                        <h4>44.00$</h4>
                    </div>
                    <i class="fa fa-times"></i>
                </div>
                <hr> -->

            <?php require"../controller/cart_display.php" ; ?>
            </div>

            <div class="rightContent">
                <div class="cartHeader">
                    <h3>Summary</h3>
                </div>
                <hr>

                <form method="" action="" class="card">
                    <div class="shipping">
                        <label for="ship">Room</label>
                        <select name="room_number" id="ship">
                            <?php include"../controller/room_display.php";?>
                        </select>
                    </div>
                    <div class="shipping">
                        <label>order details</label>
                        <textarea name='details' style='width:80%;'></textarea>
                    </div>
                    <hr>

                    <div class="price">
                        <h4>Total Price</h4>
                        <h4 id='total'></h4>
                    </div>
<!--                     <i class="fa-solid fa-xmark"></i>
 -->                    <button type="submit" class="btn">Checkout</button>
                
            </div>
    </form>
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
                <a href="../index.php#home"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="../index.php#about"> <i class="fas fa-arrow-right"></i> about </a>
                <a href="../index.php#menu"> <i class="fas fa-arrow-right"></i> menu </a>
                <a href="../index.php#review"> <i class="fas fa-arrow-right"></i> review </a>
                <a href="../index.php#book"> <i class="fas fa-arrow-right"></i> book </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Cart</a>
                <a href="profile.php"> <i class="fas fa-arrow-right"></i> Profile</a>
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
    <script>
        function remove_product(e){
            e.parentElement.remove();
        }
        function min(e){
            e.nextElementSibling.firstElementChild.value--;
            let val=e.nextElementSibling.firstElementChild.value;
            let id=e.nextElementSibling.firstElementChild.name;
            console.log(id);
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).innerText =
                this.responseText;}
                };
                xhttp.open("POST", "../controller/price_update.php");
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id="+id+"&"+"q="+val);
        }
        function plus(e){
            e.previousElementSibling.firstElementChild.value++;
            let val=e.previousElementSibling.firstElementChild.value;
            let id=e.previousElementSibling.firstElementChild.name;
            console.log(id);
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).innerText =
                this.responseText;}
                };
                xhttp.open("POST", "../controller/price_update.php");
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id="+id+"&"+"q="+val);
             }
             setInterval(()=>{
                let value=0;
                for(let i =0;i< document.getElementsByClassName('p_date').length;i++){
                value+=Number(document.getElementsByClassName('p_date')[i].innerText);}
                document.getElementById('total').innerText=value;

             }, 1000); 
        
        
    </script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- custom js file link  -->
    <script src="../public/js/script.js"></script>
</body>

</html>