<?php
include 'conexion_be.php'; // Incluir la conexión a la base de datos

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$documento = $_POST['documento'];
$clave = $_POST['clave'];

// Insertar nuevo usuario en la base de datos
$sql = "INSERT INTO USUARIO (Documento, NombreCompleto, Correo, Clave, IdRol, Estado) 
        VALUES (?, ?, ?, ?, 2, 1)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssss", $documento, $nombre, $correo, $clave);

if ($stmt->execute()) {
    echo "Usuario registrado exitosamente. <a href='index.html'>Iniciar sesión</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>