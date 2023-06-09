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
  

.my-table {
    font-size: 8pt;
    font-family: Verdana;
    border: 1px solid black;
    border-collapse: collapse;
  }
  
  .my-table th {
    font-weight: bold;
  }
</style>



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
        <li><a href="alumnos.php">Cargar  Alumnos</a></li>
      <li><a href="candidato.php">Cargar candidato</a></li>
        <li><a href="resultados.php">Resultados por paralelo</a></li>
          <li><a href="index.php">Votación</a></li>
          <li><a href="muestra.php">Resultado</a></li>  
      </ul>

  </div>
    </div>

  </div>

</nav>

<?php include '../src/resultados.php'; ?>


<div class="contenedor">

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">RESULTADO DE VOTACIONES</h1>
    </div>
  </div>

</div>

 <div class="center-block col-md-8 col-xs-8">

<form name ="acceso" action="resultados.php" role="form" method="post">
  <div class="form-group">
  
 
 <fieldset>
							<legend><em><strong><p>Resultado de las votaciones</p></strong></em></legend>
						<?php
							
							$sql="select * from carreras";
							$resultado=mysqli_query($cx,$sql);
							$num_reg=mysqli_num_rows($resultado);
						?>
							<select name="municipios" onchange="submit();">
							<option value="" >Seleccione Su Carrera  a  buscar </option>
							<?php
								for ($i=0;$i<$num_reg;$i++){

							$reg=mysqli_fetch_array($resultado);
                                    $codigomun=$reg["carreras"];
								$carreras=$reg["carreras"];
							?>
								<option value="<?php echo $codigomun; ?>"<?php if ($municipio==$codigomun){echo "selected='selected'";}?>><?php echo $carreras; ?></option>
								
							<?php
							}
						
							?>
						</select>
					</fieldset>
<br>

<table class="table table-hover table-striped text-center my-table" cellspacing="1" cellpadding="2">
<thead>
<tr>
<td>Identidad del candidato</td>
<td>Nombre</td>
<td>Grado</td>
<td>Votos</td>
</tr>
<div class="tabla">
<?php 
    

  $sql = "SELECT * from votos where carrera ='$municipio' ORDER BY votos DESC ";
$resultado=mysqli_query($cx,$sql);
  $numero = 0;
  while($row = mysqli_fetch_array($resultado))
  {
    echo "<tr><td width=\"80%\"><font face=\"verdana\">" . 
	    $row["cod_candidato"] . "</font></td>";
    echo "<td width=\"80%\"><font face=\"verdana\">" . 
	    $row["nombre"] . "</font></td>";
    echo "<td width=\"80%\"><font face=\"verdana\">" . 
	    $row["carrera"] . "</font></td>";
    echo "<td width=\"80%\"><font face=\"verdana\">" . 
	    $row["votos"]. "</font></td></tr>";    
    $numero++;
  }

  
  mysqli_free_result($resultado);
  mysqli_close($cx);
?>
</table>


</form>




</div>
</div>
</div>

<script src="../js/jquery-1.11.3.min.js"></script>

<script src="../js/bootstrap.js"></script>
</body>
</html>
