<?php
require_once("../db/conexion.php"); // Se incluye el archivo de conexión a la base de datos

session_start(); // Se inicia la sesión


$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : ''; // Se obtiene el valor de 'usuario' del formulario POST o se asigna una cadena vacía si no está definido
$clave = isset($_POST['clave']) ? $_POST['clave'] : ''; // Se obtiene el valor de 'clave' del formulario POST o se asigna una cadena vacía si no está definido
$boton = isset($_POST['boton']) ? $_POST['boton'] : ''; // Se obtiene el valor de 'boton' del formulario POST o se asigna una cadena vacía si no está definido
$vacio = ""; // Esto significa que estas incializando la variable
$acceso =""; //Inicializacion del codigo

if ($boton === "Ingresar") { // Se verifica si el valor de 'boton' es "Ingresar"
    if (empty($usuario) || empty($clave)) { // Se verifica si 'usuario' o 'clave' están vacíos
        $vacio = "si"; // Se asigna "si" a la variable $vacio si alguna de las variables está vacía
    } else {
        $sql = "SELECT * FROM usuario WHERE usuario = ? AND clave = ?"; // Se prepara la consulta SQL utilizando marcadores de posición (?)
        $stmt = mysqli_prepare($cx, $sql); // Se prepara la consulta SQL en una sentencia
        mysqli_stmt_bind_param($stmt, 'ss', $usuario, $clave); // Se vinculan los valores de usuario y clave a la consulta preparada
        mysqli_stmt_execute($stmt); // Se ejecuta la consulta preparada
        $resultado = mysqli_stmt_get_result($stmt); // Se obtiene el resultado de la consulta
        $datos = mysqli_fetch_array($resultado); // Se obtienen los datos como un array asociativo

        if ($datos) { // Si se obtuvieron datos de la base de datos
            $_SESSION["nombre"] = $datos["nombre"]; // Se asigna el valor del campo 'nombre' a la variable de sesión $_SESSION["nombre"]
            $_SESSION["nivel"] = $datos["nivel"]; // Se asigna el valor del campo 'nivel' a la variable de sesión $_SESSION["nivel"]
            $_SESSION["permiso"] = "Acceso Permitido"; // Se asigna "Acceso Permitido" a la variable de sesión $_SESSION["permiso"]
            ?>
            <script>
                alert('ADMINISTRADOR'); // Se muestra una alerta en JavaScript con el mensaje "ADMINISTRADOR"
                window.location = "menu.php"; // Se redirige al usuario a "menu.php"
            </script>
            <?php
        } else {
            $acceso = "denegado"; // Si no se encontraron datos coincidentes en la base de datos, se asigna "denegado" a la variable $acceso
        }
    }
}
?>
