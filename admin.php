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

<?php include '../src/admin.php'; ?>


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
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
