<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Votación</title>


<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<link href="../css/menu2.css" rel="stylesheet">

<style>

</style>

</head>
<body>
<?php include '../src/menu2.php'; ?>
<?php include '../src/imagen.php'; ?>

<div class="contenedor">
	<div class="boton">
	<a href="votar.php"><button  class="btn btn-danger">X</button></a>
    </div>
	<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Sistema de Votación</h1>
	  <br>
	  <br>
<style>
	.image-container:nth-child(odd) img {
  float: right;
}

.image-container:nth-child(even) img {
  float: left;
}

</style>

	  <?php
  $conn = new mysqli($server, $usuariobd, $pass, $db);

  // Verificar si hay errores en la conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  // Consulta para obtener los datos de los candidatos
  $sql = "SELECT id_candidato, cedula_candidato, nombre, imagen FROM candidatos";
  $result = $conn->query($sql);

  // Verificar si se obtuvieron resultados de la consulta
  if ($result->num_rows > 0) {
    // Recorrer los resultados y mostrar las imágenes
    $count = 0;
    while ($row = $result->fetch_assoc()) {
      $id_candidato = $row["id_candidato"];
      $nombre = $row["nombre"];
      $imagenBinaria = $row["imagen"];

      // Generar el HTML para mostrar la imagen
      $imagenBase64 = base64_encode($imagenBinaria);
      $imagenSrc = 'data:image/jpeg;base64,' . $imagenBase64;
      echo '<div class="image-container">';
      echo '<img width="100" src ="' . $imagenSrc . '" alt="..." > ';
      echo '</div>';
      $count++;
    }
  } else {
    echo "No se encontraron candidatos en la base de datos.";
  }
?>

	  
    </div>	
  </div>
  <br>
</div>
 <div class="center-block col-md-4 col-xs-8">
		<td><?php echo "<h1 style=text-align: center; >Bienvenido </h1>"."<h1 style=text-align: center; >".$_SESSION["nombre"]."</h1>"; 
				?></td>
<form name ="acceso" action="menu2.php" role="form" method="post">
  <div class="form-group">
<br>
<br>
						<fieldset>
							<legend><em><strong><h2>Candidatos</h2></strong></em></legend>
						<?php
							$sql="select * from candidatos";
							$resultado=mysqli_query($cx,$sql);
							$num_reg=mysqli_num_rows($resultado);
						?>
						<style>
							select option {
								font-size: 30px;
                                font-weight: bold;
                                }
						</style>
							<select name="municipios" onchange="submit();">
							<option value=""> Seleccione Su Candidato </option>
							<?php
								for ($i=0;$i<$num_reg;$i++){

							$reg=mysqli_fetch_array($resultado);
                                    $codigomun=$reg["cedula_candidato"];
								    $nombre=$reg["nombre"];
							?>
								<option value="<?php echo $codigomun; ?>"<?php if ($municipio==$codigomun){echo "selected='selected'";}?>><?php echo $nombre; ?></option>
								
							<?php
							}
						
							?>
						</select>
					</fieldset>
					</td> 

                     <br>
                    <br>
   <input type ="submit" class="btn btn-primary" name="boton" Value="VOTAR">
   <input type ="submit"  class="btn btn-danger" name="boton" Value="CANCELAR">
</form>
</div>
</div>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
