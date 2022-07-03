<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | All Users</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="../public/css/print.css">


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
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


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh !important;">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Cafateria</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="index.php" class="d-block">Admin Panel</a>
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
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="adduser.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Users</p>
                                    </a>
                                </li>
                        </li>
                    </ul>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="m-0">User Data</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">All Users</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>


            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-7">
                        </div>
                        <div class="col-5">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item bg-primary px-4 py-2"><a href="adduser.php">Add User</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table id="tbl" class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col" class="disapper">Email</th>
                                            <th scope="col" class="disapper">Password</th>
                                            <th scope="col">Room ID</th>
                                            <th scope="col">EXT</th>
                                            <th scope="col" class="disapper">Image</th>
                                            <th scope="col" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if (isset($_REQUEST['show'])) {
                                            //select all user
                                            $conn = new PDO("mysql:host=localhost;dbname=cafeteria", "root", "");
                                            $data = $conn->query("select * from users");
                                            $fetched_data = $data->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($fetched_data as $key => $value) {
                                        ?>
                                                
                                                <tr class='odd'>
                                                    <td><?php echo $value['id']; ?> </td>
                                                    <td><?php echo $value['name']; ?> </td>
                                                    <td class="disapper"><?php echo $value['email']; ?> </td>
                                                    <td class="disapper"><?php echo $value['password']; ?></td>
                                                    <td><?php echo $value['room_id']; ?></td>
                                                    <td><?php echo $value['ext']; ?></td>
                                                    <td class="disapper"><img class="w-25 h-25" src=" ../public/uploaded_image/<?php echo $value['image']; ?>"></td>
                                                    <td ><a href='update.php?edit&id=<?php echo $value["id"] ?>' name='edit' class='text-cyan'>Update</a></td>
                                                    <td ><a href='../userController/controller.php?delete&id=<?php echo $value["id"] ?>' name='delete' class='text-danger'>Delete</a></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>


                            <!-- /.content-wrapper -->

                            <!-- Control Sidebar -->

                            <!-- /.control-sidebar -->
                        </div>
                        <!-- ./wrapper -->

                        <div class="card direct-chat direct-chat-primary">
                            <!-- /.card-header -->
                            <div class="card-body">
                            </div>
                            <!-- /.content-wrapper -->
                            <footer class="main-footer m-0">
                                <strong>Copyright &copy; 2023-2022</strong> All rights reserved <a href=""><strong> Kings Team</strong></a>
                                <div class="float-right d-none d-sm-inline-block">
                                    <b>Version</b> 3.2.0
                                </div>
                            </footer>

                        </div>


                        <!-- jQuery -->
                        <script src="../plugins/jquery/jquery.min.js"></script>
                        <!-- jQuery UI 1.11.4 -->
                        <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
                        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
                        <script>
                            $.widget.bridge('uibutton', $.ui.button)
                        </script>
                        <!-- Bootstrap 4 -->
                        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <!-- ChartJS -->
                        <script src="../plugins/chart.js/Chart.min.js"></script>
                        <!-- Sparkline -->
                        <script src="../plugins/sparklines/sparkline.js"></script>
                        <!-- JQVMap -->
                        <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
                        <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
                        <!-- jQuery Knob Chart -->
                        <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
                        <!-- daterangepicker -->
                        <script src="../plugins/moment/moment.min.js"></script>
                        <script src="../plugins/daterangepicker/daterangepicker.js"></script>
                        <!-- Tempusdominus Bootstrap 4 -->
                        <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
                        <!-- Summernote -->
                        <script src="../plugins/summernote/summernote-bs4.min.js"></script>
                        <!-- overlayScrollbars -->
                        <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
                        <!-- AdminLTE App -->
                        <script src="../dist/js/adminlte.js"></script>
                        <!-- AdminLTE for demo purposes -->
                        <script src="../dist/js/demo.js"></script>
                        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                        <script src="../dist/js/pages/dashboard.js"></script>
</body>

</html>