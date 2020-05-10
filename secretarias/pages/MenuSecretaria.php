<!DOCTYPE html>

<?php


session_start();

	@$buscart=$_POST['buscart'];
	@$buscar=$_POST['buscar'];

$coor=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
				$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
 utf8_decode($programa=$arreglo[11]);
 $coordir=$arreglo[4];
 $passd=$arreglo[8];

 if ($arreglo[2]!='Jurado') {
	require("../desconectar.php");
	header("Location:index.html");
}
}


?>




<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
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
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>




<div class="wrapper">

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- CABECERA --------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="sidebar-dark-primary elevation-4"  style="background:#B42A2A; " scrolling="no">
  
    <!-- Brand Logo -->
    <a class="brand-link" style="background:#343a40;">
      <img src="../images/unilibre-logo.png"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SI-COMMITTEE </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar "  >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo utf8_decode($_SESSION['user']);?></a>
        </div>
      </div>

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN CABECERA --------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- MENU ------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
      <nav class="navbar-expand  mt-2">
        <ul  style="color:white" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item has-treeview"  >
            <!--  -->
            <a href="ListadoUsuarios.php "  target="contenido" class="nav-link">
              <!--  -->
              <i class="nav-icon fas fa-copy white" style="color:#FFFFFF;"></i>
              <p style="color:#FFFFFF;">
                Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
          </a>  


          <?php
          if($programa=='Sistemas'){
          ?> 

            <li class="nav-item has-treeview"  >
                <!--  -->
                <a href="ActasSistemas.php "  target="contenido" class="nav-link">
                  <!--  -->
                  <i class="nav-icon fas fa-copy white" style="color:#FFFFFF;"></i>
                  <p style="color:#FFFFFF;">
                    Actas Sistemas
                    <i class="fas fa-angle-left right"></i>
                  </p>
            </a>  

            <li class="nav-item has-treeview"  >
                <!--  -->
                <a href="ActasIndustrial.php "  target="contenido" class="nav-link">
                  <!--  -->
                  <i class="nav-icon fas fa-copy white" style="color:#FFFFFF;"></i>
                  <p style="color:#FFFFFF;">
                    Actas Industrial
                    <i class="fas fa-angle-left right"></i>
                  </p>
            </a>  

          <?php
          }else if($programa=='Ambiental'){
            
          ?> 
            
            <li class="nav-item has-treeview"  >
                <!--  -->
                <a href="ActasAmbiental.php "  target="contenido" class="nav-link">
                  <!--  -->
                  <i class="nav-icon fas fa-copy white" style="color:#FFFFFF;"></i>
                  <p style="color:#FFFFFF;">
                    Actas Ambiental
                    <i class="fas fa-angle-left right"></i>
                  </p>
            </a>  

          
             <?php
          }
            
          
          
          else if($programa=='Mecanica'){
            
          ?> 
             
             <li class="nav-item has-treeview"  >
                <!--  -->
                <a href="ActasMecanica.php "  target="contenido" class="nav-link">
                  <!--  -->
                  <i class="nav-icon fas fa-copy white" style="color:#FFFFFF;"></i>
                  <p style="color:#FFFFFF;">
                    Actas Mecanica
                    <i class="fas fa-angle-left right"></i>
                  </p>
            </a> 

                      <?php
          }
            
          
          ?> 
          

        </ul>
      </nav>
 
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------- FIN MENU --------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->

    </div>
    <!-- /.sidebar -->
  </aside>




  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
