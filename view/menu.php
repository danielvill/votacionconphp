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
margin-right: 20%;
margin-left: 20%;
width: 60%;
height: 500px;




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
h2{
	text-align: center;
	color: white;
	font-size: 3.5em;
	font-family: Algerian; 
}
p{
	color: white;
	font-size: 4;
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