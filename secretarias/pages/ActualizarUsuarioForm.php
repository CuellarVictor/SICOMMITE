<!DOCTYPE html>

<?php


//session_destroy();
session_start();
	@$buscart=$_POST['buscart'];
	@$buscar=$_POST['buscar'];

$userid;
$coor=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../../connect_db.php");
                $sql=("SELECT * FROM login where id='$userid'");
				$query=mysqli_query($mysqli,$sql);
        while ($row=mysqli_fetch_row ($query)){
		    	$id=$row[0];
          $cedula=$row[1];
          $tipousuario=$row[2];
		    	$user=$row[3];
          $email=$row[4];
          $pasadmin=$row[5];
		    	$pasdir=$row[6];
		    	$pasjur=$row[7];
		    	$pascor=$row[8];

          
          if($tipousuario == 'Estudiante')//Asignar pass para Estudiante
          {
            $pass = $row[9];
          }
          else if($tipousuario == 'Director')//Asignar pass para director
          {
            $pass = $pasdir;
          }
          else if($tipousuario == 'Coordinador')//Asignar pass para Coordinador
          {
            $pass = $pascor;
          }
          else if($tipousuario == 'Jurado')//Asignar pass para secreteari@
          {
            $pass = $pasjur;
          }

		    	
          $telefono=$row[10];
		    	$programa=$row[11];
          $fechadenacimiento=$row[12];
          $area=$row[13];
                        

		    }

if($tipousuario=="Jurado"){
$tipousuario="Secretari@";

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



<body>


<div class="card card-danger pt-2 pb-2 pl-2 p">
              <div class="card-header" style="background:#343a40;">
                <h3 class="card-title"> Actualizar Estudiante</h3>
              </div>
              <div class="card-body">

              <div id="cpestana1">
				<?php $fecha=date("Y-m-d");?>
      			<form autocomplete="off" action="EjecActualizarUsuario.php" method="post">
                  <div class="row">


                  <div class="col-6">
                        <label>Id: </label>
                        <input type="text" class="form-control"  name="userid" value="<?php echo $userid?>" class="Nombre"  readonly="readonly">
                  </div>

                  <div class="col-6">
                        <label>Tipo de Usuario: </label>
                        <select   class="form-control" name="tipousuario" required>
                                 <option value="<?php echo $tipousuario?>"><?php echo $tipousuario?></option>
                                 <option value="Coordinador">Coordinador</option>
                                 <option value="Estudiante">Estudiante</option>
                                 <option value="Director">Profesor</option>
				                         <option value="Jurado">Secretari@</option>
                        </select>
                 </div>

                  <div class="col-6">
                        <label>Nombre: </label>
                        <input type="text" class="form-control"  name="user" value="<?php echo $user?>" class="Nombre" placeholder="Nombres y Apellidos" required>
                  </div>

                  <div class="col-6">
                        <label>Cedula:</label>
                        <input type="number"  class="form-control"  name="cedula" class="cedula" value="<?php echo $cedula?>" placeholder="Cedula" requiredd>
                  </div>

                  <div class="col-6">
                        <label>Usuario:</label>
                        <input type="text"  class="form-control"  name="email" class="Usuario" value="<?php echo $email?>" placeholder="Email @unilibre.edu.co" requiredd>
                  </div>
                
                <div class="col-6">
                        <label>Contraseña</label>
                        <input type="text"  class="form-control" name="password" value="<?php echo $pass?>" class="Contraseña" placeholder="Contraseña" required> 
                </div>

                <div class="col-6">
                        <label>Teléfono</label>
                        <input type="text"  class="form-control" name="telefono" value="<?php echo $telefono?>" class="telefono" placeholder="Telefono" required> 
                </div>

                <div class="col-6">
                        <label>Programa: </label>
                        <select   class="form-control" name="programa" value="<?php echo $programa?>" required>
                          <option name="programa" value="<?php echo $programa?>"><?php echo $programa?></option>
                          <option value="Industrial">Industrial</option>
                          <option value="Sistemas">Sistemas</option>
                          <option value="Ambiental">Ambiental</option>
                          <option value="Mecanica">Mecanica</option>
                        </select>
                </div>

                <div class="col-6">
                        <label>Linea de Investigación: </label>
                        <select   class="form-control" name="area" required>

                        <?php
                                 $querya = $mysqli -> query ("SELECT * FROM area_inves where  id_area = '$area'  and programa='$programa' limit 1");
                                 while ($valoresa = mysqli_fetch_array($querya)) {
                                 if($nombre_area==''){ $nombre_area=0;}
                                 echo '<option value="'.$valoresa[id_area].'">'.$valoresa[id_area].': '.$valoresa[nombre_area].'</option>';
                                 } ?>

                        <option value="0">No Aplica</option>
                        <?php
                                 $query = $mysqli -> query ("SELECT * FROM area_inves where  id_area <> '$area'  ORDER BY  id_area ASC ");
                                 while ($valores = mysqli_fetch_array($query)) {
                                 if($nombre_area==''){ $nombre_area=0;}
                                 echo '<option value="'.$valores[id_area].'">'.$valores[id_area].': '.$valores[nombre_area].'</option>';
                                 } ?>
                        </select>
                </div>

                <div class="col-6">
                        <label>Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fechadenacimiento" value="<?php echo $fechadenacimiento?>"  id="fechadenacimiento" placeholder="Fec_nacimiento" required> 
                </div> 

                <div class="col-12">
                    <input type="submit" value="Actualizar" class="btn btn-dark"> 
                    <input type="button" class="btn btn-dark" value="Volver" name="volver" onclick="history.back()">
                </div>

               <br>

                 </div>    

                
            </form>
            </div>
                
               
              </div>

</div>

        


</body>
    </html>