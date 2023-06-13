<?php
require_once("../db/conexion.php");

// Se recomienda establecer el nivel de error al principio del archivo
error_reporting(E_ALL ^ E_NOTICE);

// Las variables $vacio y $acceso no se utilizan, puedes eliminarlas

session_start();
$cedula = isset($_SESSION["cedula_alumno"]) ? $_SESSION["cedula_alumno"] : "";
$carrera = isset($_SESSION["carrera"]) ? $_SESSION["carrera"] : "";

$municipio = isset($_POST["municipios"]) ? $_POST["municipios"] : "";
$parroquias = isset($_POST["parroquias"]) ? $_POST["parroquias"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$cedula_candidato = isset($_POST["cedula_candidato"]) ? $_POST["cedula_candidato"] : "";
$alumno = isset($_POST["alumno"]) ? $_POST["alumno"] : "";
$cod_candidato = isset($_POST["cod_candidato"]) ? $_POST["cod_candidato"] : "";
$alu = isset($_POST["cedula_alumno"]) ? $_POST["cedula_alumno"] : "";

if (isset($_POST["boton"])) {
    $boton = $_POST["boton"];
    switch ($boton) {
        case "VOTAR":
            $sql = "UPDATE alumnos SET voto = '1', cod_candidato = '$municipio' WHERE cedula_Alumno = '$cedula'";
            
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
            break;
		}else {
			// Manejar el error de la consulta SQL
			echo "Error: " . mysqli_error($cx);
		}
    }
}
?>