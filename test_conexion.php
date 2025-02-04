<?php
include 'conexion_be.php'; // Incluir la conexión a la base de datos

// Ejecutar una consulta de prueba
$sql = "SELECT * FROM usuario";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo "Conexión exitosa. Número de usuarios: " . mysqli_num_rows($resultado);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>