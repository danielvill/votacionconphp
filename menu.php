<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Votación</title>


<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<link href="../css/estilo2.css" rel="stylesheet">

</head>


<style>
h2{
	text-align: center;
	color: white;
	font-size: 3.5em;
	font-family: Algerian; 
}
</style>

<body>

<?php include '../src/menu.php'; ?>


<div class="contenedor">
		<div class="boton">
	<a href="votar.php"><button  class="btn btn-danger">X</button></a>
    </div>
  <br><br><br><br><br>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1 class="text-center">SISTEMA DE Votación COLEGIO</h1>
    </div>
  </div>

</div>

 <div class="center-block col-md-12 col-xs-8">
     <h2>Bienvenido Al Modulo de  Administración</h2>
<br>
<br>

<div style="text-align: center;">
 <a href="alumnos.php"><button class="btn btn-primary"><p>Agregar Alumno</p></button></a>
 <a href="candidato.php"><button class="btn btn-success"> <p>Agregar Candidato</p></button></a>
 <a href="resultados.php"><button class="btn btn-warning"><p>Resultados</p></button></a>
 <a href="votar.php"><button class="btn btn-danger"><p>Votación</p></button></a>
</div>


</div>
</div>

</div>

<script src="../js/jquery-1.11.3.min.js"></script>

<script src="../js/bootstrap.js"></script>
</body>
</html>
