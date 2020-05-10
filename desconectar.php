<?php 
session_start();
if($_SESSION['user']){	
	session_destroy();
	echo "<script>top.window.location = 'Login/index.html'</script>";
}
else{
	echo "<script>top.window.location = 'Login/index.html'</script>";
}
?>