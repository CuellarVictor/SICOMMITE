<?php


extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	require("../../connect_db.php");

	$user=$_POST['user'];
	$email=$_POST['email'];
	$password= $_POST['password'];
	$tipousuario=$_POST['tipousuario'];
	$telefono=$_POST['telefono'];
	$programa=$_POST['programa'];
	$fechadenacimiento= $_POST['fechadenacimiento'];
	$area=$_POST['area'];;


	//Inicializar variables
	$passest = "";
	$pasadmin= "";
	$pasdir= "";
	$pasjur= "";
	$pascor= "";

	if($tipousuario == 'Estudiante')//Creacion para Estudiante
				{
					$passest = $password;
					$pasadmin= "";
					$pasdir= "";
					$pasjur= "";
					$pascor= "";
				}
				else if($tipousuario == 'Director')//Creacion para director
				{
					$passest = "";
					$pasadmin= "";
					$pasdir= $password;
					$pasjur= "";
					$pascor= "";
				}
				else if($tipousuario == 'Coordinador')//Creacion para Coordinador
				{
					$passest = "";
					$pasadmin= "";
					$pasdir= "";
					$pasjur= "";
					$pascor= $password;
				}
				else if($tipousuario == 'Jurado')//Creacion para secreteari@
				{
					$passest = "";
					$pasadmin= "";
					$pasdir= "";
					$pasjur= $password;
					$pascor= "";
				}
	
        $sentencia="update login set cedula='$cedula',user='$user', email='$email',pasdir='$pasdir',pasjur='$pasjur',pascor='$pascor', password='$passest', tipousuario='$tipousuario', telefono='$telefono', programa='$programa', fechadenacimiento='$fechadenacimiento', area='$area' where id='$userid' ";

	
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		echo "Error de procesamiento no se han actualizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ListadoUsuarios.php");
		
		echo "<script>location.href='ListadoUsuarios.php'</script>";
	}else {
		echo '<script>alert("EDICION TERMINADA")</script> ';
		
		echo "<script>location.href='ListadoUsuarios.php'</script>";

		
	}
?>