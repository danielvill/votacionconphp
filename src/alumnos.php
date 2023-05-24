<?php
require_once("../db/conexion.php");

// Validar el acceso y la variable de formulario
$acceso = $_POST['acceso'] ?? null;
$vacio = $_POST['variable'] ?? null;

session_start();

if (isset($_POST["cedula_alumno"])) {
    $cedula_alumno = $_POST["cedula_alumno"];
} 


if (empty($acceso)) {
    // Acceso no válido
}

// Obtener los datos del formulario
$id_carreras = $_POST["id_carreras"] ?? "";
$municipio = $_POST["municipios"] ?? "";
$parroquias = $_POST["parroquias"] ?? "";
$nombre = $_POST["nombre"] ?? "";
$cedula = $_POST["cedula"] ?? "";
$alumno = $_POST["alumno"] ?? "";
$cod_candidato = $_POST["cod_candidato"] ?? "";
$alu = $_POST["cedula_alumno"] ?? "";

if (isset($_POST["boton"])) {
    $boton = $_POST["boton"];
    switch ($boton) {
        case "guardar":
            if (empty($municipio)) {
                $error_message = 'Ingrese el grado';
            } elseif (empty($cedula)) {
                $error_message = 'Ingrese su tarjeta de identidad';
            } elseif (!is_numeric($cedula)) {
                $error_message = 'Por favor, ingrese solo tarjeta de identidad';
            } elseif (empty($nombre)) {
                $error_message = 'Ingrese nombre y apellido';
            } else {
                $sql = "INSERT INTO alumnos (cedula_alumno, nombre, carrera, cod_candidato, voto)
                        VALUES ('$cedula', '$nombre', '$municipio', '0', '0')";
                $resultado = mysqli_query($cx, $sql);
                if ($resultado) {
                    $success_message = 'Alumno guardado correctamente';
                    $acceso = "aprobado";
                }
            }
            break;
    }
}

?>
