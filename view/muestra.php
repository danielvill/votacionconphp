<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba para mostrar</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/estilo2.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid"> 

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
     </div>

    <div class="collapse navbar-collapse" id="defaultNavbar1">
<div class="menu1 col-md-7 col-md-offset-3">
      <ul class="nav navbar-nav">
        <li class="active">
        <li><a href="alumnos.php">Agregar Alumno</a></li>
      <li><a href="candidato.php">Agregar Candidato</a></li>
        <li><a href="resultados.php">Resultados por paralelo</a></li>
          <li><a href="votar.php">Votación</a></li>
          <li><a href="muestra.php">Resultado</a></li>  
      </ul>

  </div>
    </div>

  </div>

</nav>

<div class="contenedor">
	<br><br><br><br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1 class="text-center">Resultados<br>
    </div>
  </div>

<?php
require_once("../db/conexion.php");
//$conexion = new mysqli("localhost", "root", "", "votacion");

if ($cx->connect_error) {
    die("Conexión fallida: " . $cx->connect_error);
}

$consulta = "SELECT cod_candidato, SUM(voto) AS total_votos FROM alumnos GROUP BY cod_candidato";
$resultado = $cx->query($consulta);

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo "<h4>Lista del Candidato: " . $fila["cod_candidato"]. "</h4>";
        echo "<h4>Total de votos: " . $fila["total_votos"]. "</h4><br>";
    }
} else {
    echo "0 resultados";
}


$cx->close();
?>

</body>
</html>