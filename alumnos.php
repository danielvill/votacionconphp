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
      <li><a href="candidato.php">Agregar Candidato</a></li>
        <li><a href="resultados.php">Resultados</a></li>
          <li><a href="votar.php">Votación</a></li>  
      </ul>

  </div>
    </div>

  </div>

</nav>

<?php include '../src/alumnos.php'; ?>


<div class="contenedor">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Registro de alumnos</h1>
            </div>
        </div>
    </div>

    <div class="center-block col-md-4 col-xs-8">
        <form name="acceso" action="alumnos.php" role="form" method="post">
            <div class="form-group">
                <fieldset>
                    <legend><em><strong><p style="color: white;">Seleccione el grado</p></strong></em></legend>
                    <?php
                    $sql = "SELECT * FROM carreras";
                    $resultado = mysqli_query($cx, $sql);
                    $num_reg = mysqli_num_rows($resultado);
                    ?>
                    <select name="municipios" onchange="submit();">
                        <option value="">Seleccione el grado</option>
                        <?php
                        while ($reg = mysqli_fetch_array($resultado)) {
                            $codigomun = $reg["carreras"];
                            $carreras = $reg["carreras"];
                            ?>
                            <option value="<?php echo $codigomun; ?>" <?php if ($municipio == $codigomun) { echo "selected='selected'"; } ?>>
                                <?php echo $carreras; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </fieldset>
            </div>

            <div class="form-group">
                <label for="cedula"><p style="color:white">Tarjeta de identidad</p></label>
                <input type="text" name="cedula" class="form-control" id="cedula" placeholder="">
            </div>

            <div class="form-group">
                <label for="nombre"><p style="color:white">Nombre y apellido</p></label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="">
            </div>

            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <?php if (isset($success_message)) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success_message; ?>
                </div>
            <?php } ?>

            <br>
            <input type="submit" class="btn btn-primary" name="boton" value="guardar">
            <input type="submit" class="btn btn-danger" name="boton" value="Cancelar">
        </form>
    </div>
</div>

<script src="../js/jquery-1.11.3.min.js"></script>

<script src="../js/bootstrap.js"></script>
</body>
</html>
