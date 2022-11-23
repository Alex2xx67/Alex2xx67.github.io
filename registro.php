<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="disereg.css">
    <title>Document</title>
</head>
<body>
    <div id="cabecera">
    <center><h1>Pagina de registro</h1></center>
    <br>
    <br>
    </div>
    <div id="cuerpo">
    <form action="registro.php" method='POST'>
        <center><label for="Nombre">Nombre</label></center>
        <center><input type="text"  name='N' required ></center>
        <br>
        <center><label for="Apellido">Apellido</label></center>
        <center><input type="text"  name='Apellido' required></center>
        <br>
        <center><label for="User">Usuario</label></center>
        <center><input type="text"  name='Usuario' required></center>
        <br>
        <center><label for="Pass">Contraseña</label></center>
        <center><input type="text"  name='Contraseña' required></center>
        <br>
        <center><input type="submit" value="Enviar", name='boton'></center>
    </form>
<?php
        error_reporting(0);
        $conexion=mysqli_connect('localhost','root','','registro');
        if(ValidarRep($User,$Pass,$conexion)==1){
            echo '<center>Error, Usuario o Contraseñas ya existentes</center>';
            include('registro.php');
        }else{
            $Nombre=$_POST["N"];
            $LName=$_POST['Apellido'];
            $User=$_POST['Usuario'];}
            $Pass=$_POST['Contraseña'];
            
        $datos="INSERT INTO register VALUES('$Nombre','$LName','$User','$Pass')";
        $insertar=mysqli_query($conexion,$datos);
        if(isset($_POST['boton'])){
            header ('location:index.php');
        }
        function ValidarRep($usuario,$contraseña,$conexion){
            $consulta="SELECT * FROM register where Usuario='$User' AND Contraseña='$Pass'";
            $reali=mysqli_query($conexion,$consulta);
            if(mysqli_num_rows($reali)>0){
                return 1;
            }else{
                return 0;
            }
        }
?>
    </div>
</body>
</html>