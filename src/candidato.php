<?php
require_once("../db/conexion.php");

error_reporting(E_ALL ^ E_NOTICE);

$variable = isset($_POST['variable']) ? $_POST['variable'] : null;
$acceso = isset($_POST['variable']) ? $_POST['variable'] : null;
session_start();
if (isset($_SESSION["cedula_alumno"])) {
    // Asignar el valor de la variable de sesión a la variable $cedula_alumno
    $cedula_alumno = $_SESSION["cedula_alumno"];
	}

$id_carreras = isset($_POST["id_carreras"]) ? $_POST["id_carreras"] : "";
$municipio = isset($_POST["municipios"]) ? $_POST["municipios"] : "";
$parroquias = isset($_POST["parroquias"]) ? $_POST["parroquias"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$cedula = isset($_POST["cedula"]) ? $_POST["cedula"] : "";
$alumno = isset($_POST["alumno"]) ? $_POST["alumno"] : "";
$cod_candidato = isset($_POST["cod_candidato"]) ? $_POST["cod_candidato"] : "";
$alu = isset($_POST["cedula_alumno"]) ? $_POST["cedula_alumno"] : "";

if (isset($_POST["boton"])) {
    $boton = $_POST["boton"];
    switch ($boton) {
        case "guardar":
            if (empty($cedula)) {
                ?>
                <script>
                    alert('Ingrese cedula');
                </script>
                <?php
                break;
            }
            
            if (empty($nombre)) {
                ?>
                <script>
                    alert('Ingrese Nombre');
                </script>
                <?php
                break;
            }
     
          /// "En esta parte del codigo lo que me permite es que no sea obligatorio el campo de imagen
          // Por medio de una condicion para que encapsula la imagen y en este caso me permite para que lo obtenga como nulo

            if (!empty($_FILES['imagen']['tmp_name'])) {
                $imagen = $_FILES['imagen']['tmp_name'];
                $imagenContenido = addslashes(file_get_contents($imagen));
            } else {
                $imagenContenido = null;
            }
            
            $sql = "INSERT INTO candidatos (cedula_candidato, nombre, cod_candidato, imagen) VALUES ('$cedula', '$nombre', '$cedula', '$imagenContenido')";
            $resultado = mysqli_query($cx, $sql);
            if ($resultado) {
                $acceso = "aprobado";
                ?>
                <!-- Aquí puedes agregar código HTML o JavaScript adicional en caso de éxito -->
                <?php
            }
            

           
            $cedula = "";
            $usuario = "";
            $nombre = "";
            $clave = "";
            $nivel = "";
            $clavev = "";
            break;
    }
}
?>