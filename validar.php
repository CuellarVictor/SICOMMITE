<?php
session_start();
require("connect_db.php");

//date_default_timezone_set ('America/Bogota');
$username = $_POST['mail'];
$pass = $_POST['pass'];
$fecha=date('Y-m-d');
$sql2 = mysqli_query($mysqli,"SELECT * FROM login WHERE email='$username' ");
if($f2=mysqli_fetch_assoc($sql2)){

    if($pass==""  ){
               
                   echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
                   echo "<script>location.href='index.html'</script>";
                   }
   if($pass==$f2['pasadmin']){
                                   $_SESSION['id']=$f2['id'];
                                   $_SESSION['user']=$f2['user'];
                                   echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
                                   echo "<script>window.open('./admin/admin.php', '_top')</script>";
                                   }
   if($pass==$f2['pasdir']){
                           $_SESSION['id']=$f2['id'];
                           $_SESSION['user']=$f2['user'];
                           $id_user=$_SESSION['id'];
                           $total=1;
                           $sql3=mysqli_query($mysqli,"SELECT * FROM entradas WHERE id_user='$id_user' ");
                           while ($row=mysqli_fetch_row ($sql3)){
                                                                   $total=$row[3]+1;
                                                                   $id=$row[0];
                                                                   }
                           if($total==1)
                                       {
                                       mysqli_query($mysqli,"INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                                       }
                           if($total>1) {
                                           $sentencia="update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                                           $resent=mysqli_query($mysqli,$sentencia);
                                       }
                                   echo '<script>alert("BIENVENIDO PROFESOR")</script> ';
                                   echo "<script>location.href='directores/director.php'</script>";
                           }
   if($pass==$f2['pasjur']){
                           $_SESSION['id']=$f2['id'];
                           $_SESSION['user']=$f2['user'];
                           $id_user=$_SESSION['id'];
                        //    $TipoUsuario=$_SESSION['TipoUsuario'];
                           $total=1;
                           $sql3=mysqli_query($mysqli,"SELECT * FROM entradas WHERE id_user='$id_user' ");
                           while ($row=mysqli_fetch_row ($sql3)){
                                                                   $total=$row[3]+1;
                                                                   $id=$row[0];
                                                               }
                           if($total==1)
                                       {
                                       mysqli_query($mysqli,"INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                                       }
                           if($total>=1) {
                                           $sentencia="update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                                           $resent=mysqli_query($mysqli,$sentencia);

                                           }
                                   echo '<script>alert("BIENVENIDO Asistente/Secretari@")</script> ';
                                   echo "<script>location.href='secretarias/Secretaria.php'</script>";
                           }
   if($pass==$f2['area']){
                           $_SESSION['id']=$f2['id'];
                           $_SESSION['user']=$f2['user'];
                           $id_user=$_SESSION['id'];
                           $total=1;
                           $sql3=mysqli_query($mysqli,"SELECT * FROM entradas WHERE id_user='$id_user' ");
                           while ($row=mysqli_fetch_row ($sql3)){
                               $total=$row[3]+1;
                               $id=$row[0];
                           }
                           if($total==1)
                           {
                           mysqli_query($mysqli,"INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                           }
                           if($total>1) {

                               $sentencia="update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                               $resent=mysqli_query($mysqli,$sentencia);
                           }
                           echo '<script>alert("BIENVENIDO Director de Investigación")</script> ';
                           echo "<script>location.href='dinvestigar.php'</script>";
                           }
   if($pass==$f2['pascor']){
                           $_SESSION['id']=$f2['id'];
                           $_SESSION['user']=$f2['user'];
                           $id_user=$_SESSION['id'];
                           $total=1;
                           $sql3=mysqli_query($mysqli,"SELECT * FROM entradas WHERE id_user='$id_user' ");
                           while ($row=mysqli_fetch_row ($sql3)){
                               $total=$row[3]+1;
                               $id=$row[0];
                           }
                           if($total==1)
                           {
                           mysqli_query($mysqli,"INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                           }
                           if($total>1) {

                               $sentencia="update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                               $resent=mysqli_query($mysqli,$sentencia);
                           }
                           echo "<script>location.href='coordinadores/Coordinador.php'</script>";
                           }
   if($pass==$f2['password']){
                           $_SESSION['id']=$f2['id'];
                           $_SESSION['user']=$f2['user'];
                           $id_user=$_SESSION['id'];
                           $total=1;
                           $sql3=mysqli_query($mysqli,"SELECT * FROM entradas WHERE id_user='$id_user' ");
                           while ($row=mysqli_fetch_row ($sql3)){
                               $total=$row[3]+1;
                               $id=$row[0];
                           }
                           if($total==1)
                           {
                           mysqli_query($mysqli,"INSERT INTO entradas VALUES('','$id_user','$fecha','$total')");
                           }
                           if($total>1) {
                               $sentencia="update entradas set   id=$id, id_user='$id_user', fecha='$fecha', total='$total' where id_user='$id_user' ";
                               $resent=mysqli_query($mysqli,$sentencia);
                           }
                           echo '<script>alert("BIENVENIDO ESTUDIANTE")</script> ';
                           echo "<script>location.href='estudiantes/estudiante.php'</script>";
                           }
                           else{
                                   echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
                                   echo "<script>location.href='Login/index.html'</script>";
                               }
                               }else{
                                       echo '<script>alert("ESTE USUARIO NO EXISTE, POR FAVOR COMUNIQUESE CON EL COORDINADOR PARA PODER INGRESAR")</script> ';
                                       echo "<script>location.href='Login/index.html'</script>";	
                                   }
?>