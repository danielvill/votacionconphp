<?php
require_once("../db/conexion.php");
error_reporting(E_ALL ^ E_NOTICE);

$vacio = isset($_POST['variable']) ? $_POST['variable'] : null;
$acceso = isset($_POST['variable']) ? $_POST['variable'] : null;

session_start();
$cedula = $_SESSION["cedula_alumno"];
$carrera = $_SESSION["carrera"];

if (empty($acceso)) {
    // Hacer algo si $acceso está vacío
}

if (isset($_POST["municipios"])) {
    $municipio = $_POST["municipios"];
} else {
    $municipio = "";
}

if (isset($_POST["parroquias"])) {
    $parroquias = $_POST["parroquias"];
} else {
    $parroquias = "";
}

if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
} else {
    $nombre = "";
}

if (isset($_POST["cedula_candidato"])) {
    $cedula_candidato = $_POST["cedula_candidato"];
} else {
    $cedula_candidato = "";
}

if (isset($_POST["alumno"])) {
    $alumno = $_POST["alumno"];
}

if (isset($_POST["cod_candidato"])) {
    $cod_candidato = $_POST["cod_candidato"];
}

if (isset($_POST["cedula_alumno"])) {
    $alu = $_POST["cedula_alumno"];
}

if (isset($_POST["boton"])) {
    $boton = $_POST["boton"];

    // Cambio de Codigo para que otras versiones php pueda ejecutarse en la linea 60
    switch ($boton) {
        case "votar":
            $sql = "UPDATE alumnos SET voto='1', cod_candidato='$municipio' WHERE cedula_Alumno='$cedula'";
            $resultado = mysqli_query($cx, $sql);
            $nr = mysqli_affected_rows($cx);
            echo $nr;
            
            if ($nr >= 1) {
                echo '<script>alert("");</script>';
                echo $alu;
            }
            
            break;
    }
}
?>