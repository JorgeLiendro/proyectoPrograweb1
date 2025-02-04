<?php
session_start();
include 'conexion_be.php';

// Función para guardar o editar un usuario
if (isset($_POST['guardarUsuario'])) {
    $documento = $_POST['documento'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];

    if (isset($_POST['idUsuario'])) {
        // Editar usuario
        $idUsuario = $_POST['idUsuario'];
        $sql = "UPDATE USUARIO SET Documento = ?, NombreCompleto = ?, Correo = ?, IdRol = ?, Estado = ? WHERE IdUsuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssiii", $documento, $nombreCompleto, $correo, $rol, $estado, $idUsuario);
    } else {
        // Guardar nuevo usuario
        $sql = "INSERT INTO USUARIO (Documento, NombreCompleto, Correo, IdRol, Estado) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssii", $documento, $nombreCompleto, $correo, $rol, $estado);
    }

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
}

// Función para eliminar un usuario
if (isset($_POST['eliminarUsuario'])) {
    $documento = $_POST['documento'];
    $sql = "DELETE FROM USUARIO WHERE Documento = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $documento);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
}

// Función para listar usuarios
if (isset($_GET['listarUsuarios'])) {
    $sql = "SELECT IdUsuario, Documento, NombreCompleto, Correo, IdRol, Estado FROM USUARIO";
    $resultado = $conexion->query($sql);
    $usuarios = [];

    while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
    }

    echo json_encode($usuarios);
}
?>