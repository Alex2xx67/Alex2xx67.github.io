<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel = "stylesheet" href = "disehome.css">
    <form action = "home.php" method = "POST">
</head>
<body>
    <div id="cabecera">
<center><H1>Menús</H1></center>
</div>
<div id="cop">
<h2> Comidas principales </h2>
<div id="sel1">
<select name = "Comidas" method = "POST">
    <option value ="Hamburguesa"> Hamburguesa</option>
    <option value = "Pizza"> Pizza </option>
    <option value = "Pancho"> Pancho</option>
    <option value = "Milanesa"> Milanesa</option>
</select>
</div>
<input type="number" name="cantidadComida" min = "1" max = "10">
<h4>Hamburguesa: 15.000</h4>
<h4>Pizza: 30.000</h4>
<h4>Pancho: 8.000</h4>
<h4>Milanesa: 7.000</h4>
</div>
<div id="beb">
<h2> Bebidas </h2>
<div id="sel2">
<select name = "Bebidas">
    <option value = "Coca"> Coca-Cola</option>
    <option value = "Pepsi"> Pepsi </option>
    <option value = "Fanta"> Fanta</option>
    <option value = "No"> No quiero una bebida</option>
</select>
</div>
<input type="number" name="cantidadBebida" min = "1" max = "8">
<h4>Coca-Cola: 8.000</h4>
<h4>Pepsi: 8.000</h4>
<h4>Fanta: 8.000</h4>
<input type = "submit" value = "Enviar">
<br>
</div>
</body>
<?php
error_reporting(0);
$comida =$_POST["Comidas"];
$cant1 =$_POST["cantidadComida"];
$cant2 =$_POST["cantidadBebida"];
$bebida =$_POST["Bebidas"]; 
include('db.php');
switch($comida){
    case 'Hamburguesa':
        $datos="SELECT*FROM comidas WHERE Ncomida='$comida'";
        $consulta=mysqli_query($conexion,$datos);
        while($filas=mysqli_fetch_array($consulta)){
            $precio=$filas['Precio']*$cant1;
        }
        break;
    case "Pizza":
        $datos="SELECT*FROM comidas WHERE Ncomida='$comida'";
        $consulta=mysqli_query($conexion,$datos);
        while($filas=mysqli_fetch_array($consulta)){
            $precio=$filas['Precio']*$cant1;
        }
        break;
        case "Pancho":
         $datos="SELECT*FROM comidas WHERE Ncomida='$comida'";
        $consulta=mysqli_query($conexion,$datos);
        while($filas=mysqli_fetch_array($consulta)){
            $precio=$filas['Precio']*$cant1;
            
        }
        break;
        case "Milanesa":
            $datos="SELECT*FROM comidas WHERE Ncomida='$comida'";
           $consulta=mysqli_query($conexion,$datos);
           while($filas=mysqli_fetch_array($consulta)){
               $precio=$filas['Precio']*$cant1;
           }
           break;
    }
    switch($bebida){
        case "Coca":
        $datos="SELECT*FROM Bebidas WHERE Nbebida ='$bebida'";
        $consulta=mysqli_query($conexion,$datos);
        while($filas=mysqli_fetch_array($consulta)){
            $precio= ($precio + ($filas['Precio']*$cant2));
        }
        break;
        case "Pepsi":
        $datos="SELECT*FROM Bebidas WHERE Nbebida ='$bebida'";
        $consulta=mysqli_query($conexion,$datos);
        while($filas=mysqli_fetch_array($consulta)){
            $precio= ($precio + ($filas['Precio']*$cant2));
        }
        break;
        case "Fanta":
            $datos="SELECT*FROM Bebidas WHERE Nbebida ='$bebida'";
            $consulta=mysqli_query($conexion,$datos);
            while($filas=mysqli_fetch_array($consulta)){
                $precio= ($precio + ($filas['Precio']*$cant2));
            }
            break;
            case "No":
            echo " ";
            break;
    }
    echo "<center><b>El precio a pagar es </b></center>";
?>
<center><?php echo $precio;?></center>
</html>