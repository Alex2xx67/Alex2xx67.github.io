
<html>
  <head>
  <link rel="stylesheet" href="login_inicio.css">
  </head>
</html>
<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root","","registro");

$consulta="SELECT*FROM register where Usuario='$usuario' and Contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.php");

  ?>
  <br>
  <center><h10 class="Error">Error, verifique su usuario o contraseña</center>

  <?php
}
mysqli_free_result($resultado); 
mysqli_close($conexion);