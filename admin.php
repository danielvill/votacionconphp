<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Votación</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">
</head>
<style>
body{
background-image: url(img/voto.png);
background-size: 100%;
}	
.contenedor{
border-color: black;
border:20px;
margin-top: 20px;
margin: 50px auto;
border-radius: 10px;
margin-right: 25%;
margin-left: 25%;
width: 50%;
height: 550px;
}
.contenedor:hover{
transition: .8s;
background-color:rgba(0,0,0 ,.2);
box-shadow:inset;
}
.boton{
float: right;
}
h1{
	color: white;
  font-size: 3.5em;
  font-family: Algerian;
}
p{
	color: white;
}
</style>

<body>

<?php
require_once("conexion.php"); // Se incluye el archivo de conexión a la base de datos

session_start(); // Se inicia la sesión


$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : ''; // Se obtiene el valor de 'usuario' del formulario POST o se asigna una cadena vacía si no está definido
$clave = isset($_POST['clave']) ? $_POST['clave'] : ''; // Se obtiene el valor de 'clave' del formulario POST o se asigna una cadena vacía si no está definido
$boton = isset($_POST['boton']) ? $_POST['boton'] : ''; // Se obtiene el valor de 'boton' del formulario POST o se asigna una cadena vacía si no está definido
$vacio = ""; // Esto significa que estas incializando la variable
$acceso =""; //Inicializacion del codigo

if ($boton === "Ingresar") { // Se verifica si el valor de 'boton' es "Ingresar"
    if (empty($usuario) || empty($clave)) { // Se verifica si 'usuario' o 'clave' están vacíos
        $vacio = "si"; // Se asigna "si" a la variable $vacio si alguna de las variables está vacía
    } else {
        $sql = "SELECT * FROM usuario WHERE usuario = ? AND clave = ?"; // Se prepara la consulta SQL utilizando marcadores de posición (?)
        $stmt = mysqli_prepare($cx, $sql); // Se prepara la consulta SQL en una sentencia
        mysqli_stmt_bind_param($stmt, 'ss', $usuario, $clave); // Se vinculan los valores de usuario y clave a la consulta preparada
        mysqli_stmt_execute($stmt); // Se ejecuta la consulta preparada
        $resultado = mysqli_stmt_get_result($stmt); // Se obtiene el resultado de la consulta
        $datos = mysqli_fetch_array($resultado); // Se obtienen los datos como un array asociativo

        if ($datos) { // Si se obtuvieron datos de la base de datos
            $_SESSION["nombre"] = $datos["nombre"]; // Se asigna el valor del campo 'nombre' a la variable de sesión $_SESSION["nombre"]
            $_SESSION["nivel"] = $datos["nivel"]; // Se asigna el valor del campo 'nivel' a la variable de sesión $_SESSION["nivel"]
            $_SESSION["permiso"] = "Acceso Permitido"; // Se asigna "Acceso Permitido" a la variable de sesión $_SESSION["permiso"]
            ?>
            <script>
                alert('ADMINISTRADOR'); // Se muestra una alerta en JavaScript con el mensaje "ADMINISTRADOR"
                window.location = "menu.php"; // Se redirige al usuario a "menu.php"
            </script>
            <?php
        } else {
            $acceso = "denegado"; // Si no se encontraron datos coincidentes en la base de datos, se asigna "denegado" a la variable $acceso
        }
    }
}
?>

<div class="contenedor">
	<div class="boton">
	<a href="votar.php"><button  class="btn btn-danger">X</button></a>
    </div>
	<br><br><br><br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Sistema de Votación</h1>
    </div>
  </div>
</div>

<div class="center-block col-md-4 col-xs-8">
<form action="admin.php" role="form" method="post">
  <div class="form-group">
    <label for="Usuario"><p>Usuario</p></label>
    <input type="text" name="usuario" class="form-control" id="usuario"
           placeholder="Usuario">
  </div>
  <div class="form-group">
    <label for="ejemplo_password_1"><p>Contraseña</p></label>
    <input type="password" name="clave" class="form-control" id="ejemplo_password_1" 
           placeholder="Contraseña">
  </div>


   <input type ="submit" class="btn btn-primary" name="boton" Value="Ingresar">
							 <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
</form>
</div>
</div>
 <div style="text-align: center;">
			<?php
			if ($acceso=="denegado") {
			  echo "<h1>Acceso denegado.. Usuario o clave erronea...</h1>";
			}
			if ($vacio=="si") {
			  echo "<h1 >Debe ingresar Usuario y clave</h1>";
			}
			?>
	   </div>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
