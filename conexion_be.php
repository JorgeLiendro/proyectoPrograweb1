<?php
$conexion = mysqli_connect("localhost", "root", "", "proyectofinal");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
