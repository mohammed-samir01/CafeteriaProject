<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../public/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../public/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../public/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../public/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../public/assets/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../../public/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Cafateria</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../public/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin Panel</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                            </li>

                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                      Checks
                                  </p>
                              </a>
                              </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Check</h1>
                        </div>
                        
                    </div>
                   
                </div>
              
            </div>
           

           <div class="container">
                <?php
                    //data for connection
                    $servername = "localhost";
                    $username = "root";
                    $pass = "";
                    $dbname = "cafeteria";


                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                    //select user name from users table
                    $sql = "select name,id from users ";
                    $stm = $conn->prepare($sql);
                    $stm->execute();
                    $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
                    $users = $stm->fetchAll();   //get array form pdo object
                    
                    //select date from order table
                    $sql = "select distinct created_at from orders";
                    $stm = $conn->prepare($sql);
                    $stm->execute();
                    $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
                    $orders = $stm->fetchAll();   //get array form pdo object
                ?>



                <form action="../../controllers/adminController/checkController.php" method="get">


                    <!-- date from -->
                    <!-- <input type="date" id="start" name="dateFrom"
                        min="2022-07-01" max="2018-7-30"> -->

                    <!-- date to -->
                    <!-- <input type="date" id="end" name="dateTo"
                        min="2022-07-01" max="2018-7-30"> --> 



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



                    <!-- select user -->
                    <select name="userSelect" class="userSelect">
                        <option disabled selected> User</option>
                        <?php 
                            foreach ($users as $user) {
                                echo "<option value=".$user['id'].">".$user['name']."</option>";
                            }
                        ?> 
                    </select>

                    <input type="submit" value="filter">
                    
                </form>
                <br>  <br>






                <!-- ERROR CHECK -->
                <h3 style="color:red" > 
                    <?php if(isset($_GET['error'])){
                            echo $_GET['error'];
                           }
                    ?>
                </h3>
                    
                <br> <br>


                    <label> orders table </label>
                    <table class="table table-striped table-dark mt-2 ">
                            
                                
                                <thead scope="col"> 
                                    <tr>
                                         <td> 
                                             Order date 
                                         </td> 
                                         <td> 
                                             Order Client
                                         </td> 

                                         <td> 
                                             Order Price
                                         </td> 

                                    <tr>

                                    

                                </thead>

                                <tbody class="orderTable">
                                    <?php  
                                        if(isset($_GET['users'])){
                                        $users = json_decode($_GET['users'],true);
                                        $total = 0;
                                    
                                        foreach ($users as $user) {
                                            echo "<tr>"."<td>".$user['created_at']."</td>"."<td>".$user['name']."</td>"."<td>".$user['TOTAL']."</td>"."</tr>";
                                            $GLOBALS['total'] += $user['TOTAL'];
                                        }   
                                        
                                    }
                                    ?> 

                                </tbody>

                    </table>

                    <?php
                    if(isset($_GET['users'])){
                          echo  "TOTAL = " .$total;
                    }
                    
                    ?>


               

           </div>




           






            <!-- jQuery -->
            <script src="../../public/assets/plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="../../public/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="../../public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="../../public/assets/plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline -->
            <script src="../../public/assets/plugins/sparklines/sparkline.js"></script>
            <!-- JQVMap -->
            <script src="../../public/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="../../public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="../../public/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="../../public/assets/plugins/moment/moment.min.js"></script>
            <script src="../../public/assets/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="../../public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="../../public/assets/plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="../../public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="../../public/assets/dist/js/adminlte.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../../public/assets/dist/js/demo.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="../../public/assets/dist/js/pages/dashboard.js"></script>
            



        
                
           

               
    
</body>

</html>
