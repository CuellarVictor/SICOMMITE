<!DOCTYPE html>

<?php


session_start();
	@$buscart=$_POST['buscart'];
	@$buscar=$_POST['buscar'];

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
require("../../desconectar.php");
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
<head>
</html>

<div class="card card-danger pt-2 pb-2 pl-2 p" >
              <div class="card-header" style="background:#343a40;">
            <h3 class="card-title">Actas de Grado Ingenieria Mecanica</h3>
        </div>
        <div class="card-body">

            <div class="row">
            
            <?php
            $total=0;
            //ToDo: Delete query
            // $sql=("SELECT * FROM tesis limit 10");

            $sql=("SELECT * FROM actas where programa='Mecanica' ORDER BY  numero desc");
            $query=mysqli_query($mysqli,$sql);
                ?>
                
                <table class="table table-bordered  table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Acta No.</th>
                        <th scope="col">Fecha Publicación</th>
                        <th scope="col">Ver Acta</th>
                        </tr>
                    </thead>
                    <?php 
                    echo "<tbody>";
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						$ID_tesis=$arreglo[0];

					/*	$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
				$query=mysqli_query($mysqli,$sql);
				while($arreglo1=mysqli_fetch_array($query)){
				 $certi_CIFI=$arreglo1[5];
				 
				}*/
						if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else {
							$alma="./otros";	
						}	
						echo "<tr>";
				    	echo "<td>$arreglo[1]</td>";
				    	echo "<td>$arreglo[4]</td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[6]'><img src='../images/pdf.png' width='30'  height='30' class='img-rounded'></td>";
 						
						echo "</tr>";
						$total++;
						}
						echo "</tbody></table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
						
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>