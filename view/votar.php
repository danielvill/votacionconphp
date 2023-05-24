<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Votación</title>


<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">


</head>


<style>

body{


background-image: url(../img/voto.png);


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

h1{
	color: white;
  font-size: 3.5em;
  font-family: Algerian;
  text-align: center;
}
p{
	color: white;
	font-size: 4;
}

</style>

<body>

<?php include '../src/votar.php'; ?>
   


<div class="contenedor">
	<br><br><br><br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1 class="text-center">SISTEMA DE VOTACION <br>
    </div>
  </div>



	
 <div class="center-block col-md-8 col-xs-8">
<form action="votar.php" role="form" method="post">
  <div class="form-group">
    <label for="alumno"><p>Tarjeta de identidad del Alumno</p></label>
    <input type="text" name="alumno" class="form-control" id="alumno"
           placeholder="Identidad del Alumno">
  </div>

   <input type ="submit" class="btn btn-primary" name="boton" Value="Ingresar">
							 <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
</form>
<br>
<br>
<div style="text-align: center;">
<a href="admin.php"><button class="btn btn-warning">ADMINISTRADOR</button></a>



<br>
 <div style="text-align: center;">
			<?php
 
			if ($acceso=="denegado") {
			  echo "<font size='5' color='white'>".$_SESSION["nombre"]."<br> Usted ya realizo su voto</font>";
			}
			
			
			?>
			
	   </div>
</div>
</div>
</div>
</div>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.js"></script>




<h1> VOTACIONES 2023</h1>
</body>
</html>
