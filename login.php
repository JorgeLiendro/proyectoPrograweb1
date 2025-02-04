<?php

session_start(); // Iniciar sesión para manejar la autenticación
include 'conexion_be.php'; // Incluir la conexión a la base de datos

// Obtener datos del formulario
$documento = $_POST['documento'];
$clave = $_POST['clave'];

// Consultar la base de datos
$sql = "SELECT IdUsuario, NombreCompleto, IdRol FROM USUARIO WHERE Documento = ? AND Clave = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $documento, $clave);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // Credenciales válidas
    $usuario = $resultado->fetch_assoc();

    // Guardar datos del usuario en la sesión
    $_SESSION['IdUsuario'] = $usuario['IdUsuario'];
    $_SESSION['NombreCompleto'] = $usuario['NombreCompleto'];
    $_SESSION['IdRol'] = $usuario['IdRol'];

    // Redirigir según el rol
    if ($usuario['IdRol'] == 1) { // Administrador
        header("Location: administrador.php");
    } else { // Empleado
        header("Location: cliente.php");
    }
} else {
    // Credenciales inválidas
    echo "Documento o contraseña incorrectos. <a href='index.html'>Intentar de nuevo</a>";
}

$stmt->close();
$conexion->close();
?>