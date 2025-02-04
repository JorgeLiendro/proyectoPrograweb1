<?php
include 'conexion_be.php'; // Incluir la conexión a la base de datos

$termino_busqueda = isset($_GET['termino_busqueda']) ? $_GET['termino_busqueda'] : '';

$consulta = "SELECT p.Codigo, p.Nombre, p.Descripcion, c.Descripcion AS Categoria, p.Stock, p.PrecioVenta 
             FROM PRODUCTO p
             INNER JOIN CATEGORIA c ON p.IdCategoria = c.IdCategoria
             WHERE p.Codigo LIKE '%$termino_busqueda%' OR p.Nombre LIKE '%$termino_busqueda%' OR c.Descripcion LIKE '%$termino_busqueda%'";

$resultados = mysqli_query($conexion, $consulta);

if ($resultados) {
    if (mysqli_num_rows($resultados) > 0) {
        while ($fila = mysqli_fetch_assoc($resultados)) {
            echo "<tr>";
            echo "<td>" . $fila['Codigo'] . "</td>";
            echo "<td>" . $fila['Nombre'] . "</td>";
            echo "<td>" . $fila['Descripcion'] . "</td>";
            echo "<td>" . $fila['Categoria'] . "</td>";
            echo "<td>" . $fila['Stock'] . "</td>";
            echo "<td>" . $fila['PrecioVenta'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No se encontraron productos.</td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>Error en la consulta: " . mysqli_error($conexion) . "</td></tr>";
}

mysqli_close($conexion);
?>