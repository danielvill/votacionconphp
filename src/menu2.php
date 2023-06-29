<?php
require_once("../db/conexion.php");

// Se recomienda establecer el nivel de error al principio del archivo
error_reporting(E_ALL ^ E_NOTICE);

session_start();
$cedula = isset($_SESSION["cedula_alumno"]) ? $_SESSION["cedula_alumno"] : "";

if (isset($_POST["cod_candidato"])) {
  $cod_candidato = $_POST["cod_candidato"];

  // Realizar las operaciones necesarias en la base de datos para contar el voto
  $sql = "UPDATE alumnos SET voto = '1', cod_candidato = '$cod_candidato' WHERE cedula_Alumno = '$cedula'";
  $resultado = mysqli_query($cx, $sql);

  if ($resultado) {
    $nr = mysqli_affected_rows($cx);
    // Resto del código aquí...
    ?>
    <script>
      alert("Gracias por votar");
      window.location = "index.php";
    </script>
    <?php
  } else {
    // Manejar el error de la consulta SQL
    echo "Error: " . mysqli_error($cx);
  }
}
?>
