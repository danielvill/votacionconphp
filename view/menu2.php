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


<div class="contenedor">
    <div class="boton">
    <a href="votar.php"><button  class="btn btn-danger">X</button></a>
    </div>
    <br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Elecciones 2023</h1>
      <br>
      <br>
      <style>
  .image-container {
    text-align: center;
    margin-bottom: 20px;
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
  // Mostrar las imágenes y botones verticalmente
  while ($row = $result->fetch_assoc()) {
    $id_candidato = $row["id_candidato"];
    $nombre = $row["nombre"];
    $imagenBinaria = $row["imagen"];
    $cedula_candidato = $row['cedula_candidato'];

    // Generar el HTML para mostrar la imagen y el botón
    $imagenBase64 = base64_encode($imagenBinaria);
    $imagenSrc = 'data:image/jpeg;base64,' . $imagenBase64;
    ?>
    <div class="image-container">
      <br>
      <img width="400" src="<?php echo $imagenSrc; ?>" alt="...">
      <form action="" method="post">
        <input type="hidden" name="cod_candidato" value="<?php echo $cedula_candidato; ?>">
        <br>
        <input type="submit" class="btn btn-primary" value="VOTAR">
      </form>
    </div>
    <?php
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
       
<form name ="acceso" action="menu2.php" role="form" method="post">
  <div class="form-group">
<br>
<br>
                        
</div>
</div>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
