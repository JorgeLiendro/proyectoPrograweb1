<?php
session_start();
include 'conexion_be.php';

// Función para guardar o editar un producto
if (isset($_POST['guardarProducto'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $precioCompra = $_POST['precioCompra'];
    $precioVenta = $_POST['precioVenta'];

    // Validar que los campos no estén vacíos
    if (empty($codigo) || empty($nombre) || empty($descripcion) || empty($categoria) || empty($stock) || empty($precioCompra) || empty($precioVenta)) {
        echo json_encode(["success" => false, "error" => "Todos los campos son obligatorios."]);
        exit;
    }

    // Guardar nuevo producto
    $sql = "INSERT INTO PRODUCTO (Codigo, Nombre, Descripcion, IdCategoria, Stock, PrecioCompra, PrecioVenta) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        echo json_encode(["success" => false, "error" => "Error al preparar la consulta: " . $conexion->error]);
        exit;
    }

    $stmt->bind_param("sssiidd", $codigo, $nombre, $descripcion, $categoria, $stock, $precioCompra, $precioVenta);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
}

// Función para eliminar un producto
if (isset($_POST['eliminarProducto'])) {
    $codigo = $_POST['codigo'];

    if (empty($codigo)) {
        echo json_encode(["success" => false, "error" => "El código del producto es obligatorio."]);
        exit;
    }

    $sql = "DELETE FROM PRODUCTO WHERE Codigo = ?";
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        echo json_encode(["success" => false, "error" => "Error al preparar la consulta: " . $conexion->error]);
        exit;
    }

    $stmt->bind_param("s", $codigo);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
}

// Función para listar productos
if (isset($_GET['listarProductos'])) {
    $sql = "SELECT IdProducto, Codigo, Nombre, Descripcion, IdCategoria, Stock, PrecioCompra, PrecioVenta FROM PRODUCTO";
    $resultado = $conexion->query($sql);
    if (!$resultado) {
        echo json_encode(["success" => false, "error" => "Error al ejecutar la consulta: " . $conexion->error]);
        exit;
    }

    $productos = [];
    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }

    echo json_encode($productos);
}
?>