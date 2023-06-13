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
      <li><a href="candidato.php">Agregar candidato</a></li>
        <li><a href="resultados.php">Resultados por Paralelo</a></li>
          <li><a href="index.php">Votación</a></li> 
          <li><a href="muestra.php">Resultado</a></li> 
      </ul>

  </div>
    </div>

  </div>

</nav>

<?php include '../src/candidato.php'; ?>


<div class="contenedor">
<br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Registro de Candidatos</h1>
    </div>
  </div>

</div>

 <div class="center-block col-md-4 col-xs-8">

<form name ="acceso" action="candidato.php" role="form" method="post" enctype="multipart/form-data">
  <div class="form-group">

				

					
  <div class="form-group">
    <label for="Usuario"><p>Nombre de la Lista</p></label>
    <input type="text" name="cedula" class="form-control" id="cedula"
           placeholder="">
  </div>
  
  <div class="form-group">
    <label for="ejemplo_password_1"><p>Nombre y apellido</p></label>
    <input type="text" name="nombre" class="form-control" id="nombre" 
           placeholder="">
  </div>
  
  <div class="form-group">
  <label for="imagen"><p>Imagen del candidato</p></label>
  <input type="file" name="imagen" class="form-control" id="imagen" accept="image/*">
</div>


		
<?php
  
    ?>
<br> <input type ="submit" class="btn btn-primary" name="boton" Value="guardar">


							 <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
</form>
<?php
    	if ($acceso=="aprobado") {
			  echo '<script>alert("Candidato guardado correctamente")</script> ';
			}
    ?>

</div>
</div>

<script src="../js/jquery-1.11.3.min.js"></script>

<script src="../js/bootstrap.js"></script>
</body>
</html>
