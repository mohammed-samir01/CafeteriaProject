<?php

if (isset($errors)){

  $errors_Decoded = json_decode($errors , true);
}
try{

    //add new user
    $conn=new PDO("mysql:host=localhost;dbname=cafeteria","root","");
    $data= $conn->query("select * from users where id = {$_GET['id']}");
    $fetched_data= $data->fetch(PDO::FETCH_ASSOC);
      // var_dump($fetched_data);
    // header("location:index.php");

}catch(PDOException $e){
    echo $e->getMessage();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Add User</title>

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
    <aside class="main-sidebar sidebar-dark-primary elevation-4 vh-100">
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
                  <a href="user.php?show" name="show" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
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
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Update User Iformation</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="user.php?show">All User</a></li>
                <li class="breadcrumb-item active">Update User Iformation</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- Content Header (Page header) -->
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-12">
                <div class="container w-100">
                  <!-- left column -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title text-center">Add New User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="../userController/controller.php" enctype="multipart/form-data">
                      <div class="card-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="id" name="id" value="<?php echo $fetched_data['id'] ?>"  hidden>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputText1">Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="exampleInputText1" name="name" value="<?php echo $fetched_data['name'] ?>"  placeholder="Enter name" required>
                          <div class="text-danger mt-3 "> <?php if(isset($errors_Decoded['name'])) echo $errors_Decoded['name']; ?> </div>                       
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail2">Email address <span class="text-danger">*</span></label>
                          <input type="email" class="form-control" id="exampleInputEmail2" name="email" value="<?php echo $fetched_data['email'] ?>" placeholder="Enter email" required>
                          <div class="text-danger mt-3 "> <?php if(isset($errors_Decoded['email'])) echo $errors_Decoded['email']; ?> </div>

                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="exampleInputPassword1" name="pass" value="<?php echo $fetched_data['password'] ?>" placeholder="Password" required>
                          <div class="text-danger mt-3 "> <?php if(isset($errors_Decoded['password'])) echo $errors_Decoded['passwoed']; ?> </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword2">Confirm Password <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="exampleInputPassword2" name="confirm" value="<?php echo $fetched_data['password'] ?>" placeholder="Password" required>
                          <div class="text-danger mt-3 "> <?php if(isset($errors_Decoded['confirm'])) echo $errors_Decoded['confirm']; ?> </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNumber1">Room Number <span class="text-danger">*</span></label>
                          <input type="number" class="form-control" id="exampleInputNumber1" name="room" value="<?php echo $fetched_data['room_id'] ?>" placeholder="Enter Room Number" min="1" max="10" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputNumber2">EXT <span class="text-danger">*</span></label>
                          <input type="number" class="form-control" id="exampleInputNumber2" name="ext" value="<?php echo $fetched_data['ext'] ?>" placeholder="Enter EXT" min="1" max="1000" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Profile Picture <span class="text-danger">*</span></label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" id="exampleInputFile" name="img" accept="image/jpg , image/png , image/jpeg , image/gif" required>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer w-100">
                        <button type="submit" class="btn btn-outline-primary w-100" name="update">Update</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

    <!-- /.content-wrapper -->

    <section class="content">
      <div class="container-fluid">

      </div>
  </div>
  </section>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <div class="card direct-chat direct-chat-primary">
    <!-- /.card-header -->
    <div class="card-body">
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
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

