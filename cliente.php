<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE VENTAS</title>

    <!-- FontAwesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <style>
        /* Estilos generales */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            background-image: url('fondo2.jpg'); /* Fondo de pantalla completa */
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Fondo fijo al desplazarse */
            min-height: 100vh; /* Asegurar que el fondo cubra toda la altura */
        }

        .header {
            background-color: rgba(44, 62, 80, 0.9); /* Azul oscuro con transparencia */
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .user-info {
            font-size: 14px;
            margin-top: 5px;
            color: #bdc3c7; /* Gris claro */
        }

        .nav {
            display: flex;
            justify-content: center;
            background-color: rgba(52, 73, 94, 0.9); /* Azul medio con transparencia */
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-item {
            margin: 0 20px;
            text-align: center;
            color: #ecf0f1; /* Blanco */
            cursor: pointer;
            position: relative;
            padding: 10px 0;
            transition: color 0.3s ease;
        }

        .nav-item:hover {
            color: #1abc9c; /* Verde aguamarina */
        }

        .nav-item img {
            width: 24px;
            height: 24px;
            vertical-align: middle;
            margin-right: 8px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgba(44, 62, 80, 0.95); /* Azul oscuro con más transparencia */
            min-width: 160px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 4px;
            overflow: hidden;
        }

        .dropdown-content a {
            color: #ecf0f1; /* Blanco */
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a:hover {
            background-color: #1abc9c; /* Verde aguamarina */
        }

        .nav-item:hover .dropdown-content {
            display: block;
        }

        .content {
            flex: 1;
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
            background-color: transparent; /* Fondo completamente transparente */
        }

        /* Estilos para el contenedor transparente */
        .contenedor-transparente {
            background-color: rgba(255, 255, 255, 0.3); /* Fondo más transparente (30% de opacidad) */
            padding: 20px; /* Espaciado interno */
            border-radius: 15px; /* Bordes redondeados */
            border: 1px solid rgba(0, 0, 0, 0.1); /* Borde sutil */
            backdrop-filter: blur(10px); /* Efecto de desenfoque */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave */
            width: 80%; /* Ancho del contenedor */
            max-width: 800px; /* Ancho máximo */
            margin-left: 20px; /* Mover el contenedor más a la izquierda */
        }

        /* Estilos para la tabla de productos */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Línea divisoria */
        }

        table th {
            background-color: #4CAF50; /* Fondo verde para los encabezados */
            color: white; /* Texto blanco */
            font-weight: bold;
        }

        table tr:hover {
            background-color: #f5f5f5; /* Efecto hover en las filas */
        }

        /* Estilos para el campo de búsqueda */
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 10px;
            border: 1px solid #e6dcdc;
            border-radius: 5px;
            width: 70%;
            font-size: 14px;
        }

        .search-container button {
            background-color: #ef3e08;
            width: 25%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .search-container button:hover {
            background-color: #45a049; /* Verde más oscuro al pasar el mouse */
        }

        /* Estilos para "Acerca de Nosotros" */
        .acerca-de-nosotros {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo semi-transparente */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .acerca-de-nosotros h2 {
            color: #28a745;
        }

        .acerca-de-nosotros p {
            color: #333;
        }

        .acerca-de-nosotros a {
            color: #28a745;
            text-decoration: none;
        }

        .acerca-de-nosotros a:hover {
            text-decoration: underline;
        }

        .social-links {
            margin-top: 10px;
        }

        .social-links a {
            color: #28a745;
            text-decoration: none;
            margin: 0 10px;
            font-size: 20px;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #218838;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>LIQUOR STORE</h1>
        <div class="user-info">Usuario: CLIENTE</div>
    </div>

    <div class="nav">
        <div class="nav-item">
            <img src="logoproducto.jpeg" alt="Producto"> Producto
            <div class="dropdown-content">
                <a href="#" id="btn-ver-producto">Ver Producto</a>
            </div>
        </div>
        <div class="nav-item">
            <img src="6633320.png" alt="Comprar"> Comprar
            <div class="dropdown-content">
                <a href="#" id="btn-realizar-compra">Realizar Compra</a>
            </div>
        </div>
        <div class="nav-item">
            <img src="liquorstore.jpeg" alt="Sobre LIQUOR STORE"> Sobre LIQUOR STORE
            <div class="dropdown-content">
                <a href="#" id="btn-acerca-de-nosotros">Acerca de Nosotros</a>
            </div>
        </div>
    </div>

    <div class="content">
        <!-- Contenedor de la lista de productos (inicialmente oculto) -->
        <div class="contenedor-transparente" id="contenedor-producto" style="display: none;">
            <h2>Lista de Productos</h2>

            <!-- Barra de búsqueda -->
            <div class="search-container">
                <input type="text" placeholder="Buscar por código, nombre o categoría...">
                <button class="btn-buscar">Buscar</button>
            </div>

            <!-- Tabla de productos -->
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                        <th>Precio Compra</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>V001</td>
                        <td>Vino Tinto Malb...</td>
                        <td>Vino tinto argentino</td>
                        <td>Vinos</td>
                        <td>150</td>
                        <td>7.50</td>
                    </tr>
                    <tr>
                        <td>V002</td>
                        <td>Vino Blanco Sa...</td>
                        <td>Vino blanco seco</td>
                        <td>Vinos</td>
                        <td>100</td>
                        <td>8.00</td>
                    </tr>
                    <tr>
                        <td>V003</td>
                        <td>Vino Espumoso...</td>
                        <td>Vino espumoso</td>
                        <td>Vinos</td>
                        <td>49</td>
                        <td>10.00</td>
                    </tr>
                    <tr>
                        <td>L001</td>
                        <td>Whiskey James...</td>
                        <td>Whiskey irlandés</td>
                        <td>Licores</td>
                        <td>20</td>
                        <td>20.00</td>
                    </tr>
                    <tr>
                        <td>L002</td>
                        <td>Tequila Herrad...</td>
                        <td>Tequila reposado</td>
                        <td>Licores</td>
                        <td>38</td>
                        <td>18.00</td>
                    </tr>
                    <tr>
                        <td>L003</td>
                        <td>Vodka Smirnoff</td>
                        <td>Vodka clásico</td>
                        <td>Licores</td>
                        <td>200</td>
                        <td>12.00</td>
                    </tr>
                    <tr>
                        <td>C001</td>
                        <td>Cerveza Pilsener</td>
                        <td>Cerveza lager</td>
                        <td>Cervezas</td>
                        <td>300</td>
                        <td>0.80</td>
                    </tr>
                    <tr>
                        <td>C002</td>
                        <td>Cerveza IPA</td>
                        <td>Cerveza artesanal</td>
                        <td>Cervezas</td>
                        <td>219</td>
                        <td>1.20</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Contenedor del formulario de venta (inicialmente oculto) -->
        <div class="contenedor-transparente" id="contenedor-compra" style="display: none;">
            <!-- Título y Cod. Producto -->
            <div class="titulo-venta">
                <h2>Registrar Venta</h2>
                <div class="codigo-producto-container">
                    <label for="codigo-producto">Cod. Producto:</label>
                    <input type="text" id="codigo-producto">
                </div>
            </div>

            <!-- Formulario de Venta -->
            <form class="formulario-venta">
                <!-- Fila superior: Tipo de Documento y Campos de Producto -->
                <div class="fila-superior">
                    <!-- Tipo de Documento -->
                    <div class="tipo-documento">
                        <label for="tipo-documento">Tipo Documento:</label>
                        <select id="tipo-documento">
                            <option value="boleta">Boleta</option>
                            <option value="factura">Factura</option>
                        </select>
                    </div>

                    <!-- Campos de Producto, Precio y Cantidad -->
                    <div class="campos-producto">
                        <div>
                            <label for="producto">Producto:</label>
                            <input type="text" id="producto">
                        </div>
                        <div>
                            <label for="precio">Precio:</label>
                            <input type="text" id="precio">
                        </div>
                        <div>
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" id="cantidad">
                        </div>
                    </div>
                </div>

                <!-- Información de la Venta -->
                <div>
                    <label for="fecha">Fecha:</label>
                    <input type="text" id="fecha" value="31/01/2025" readonly>
                </div>

                <!-- Información del Cliente -->
                <div>
                    <label for="documento-cliente">Número Documento:</label>
                    <input type="text" id="documento-cliente">
                </div>
                <div>
                    <label for="nombre-cliente">Nombre Completo:</label>
                    <input type="text" id="nombre-cliente">
                </div>

                <!-- Botón Agregar -->
                <div class="agregar-producto">
                    <button type="button">Agregar</button>
                </div>

                <!-- Tabla de Productos -->
                <table class="tabla-productos">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se agregarán los productos dinámicamente -->
                    </tbody>
                </table>

                <!-- Total a Pagar -->
                <div class="total-pagar">
                    Total a Pagar: <span>0</span>
                </div>

                <!-- Botones de Acción -->
                <div class="botones-venta">
                    <button type="button" onclick="window.location.href='metododepago.html'">Pagar</button>
                    <button type="button">Cambio:</button>
                    <button type="submit">Crear</button>
                </div>
            </form>
        </div>

        <!-- Contenedor de "Acerca de Nosotros" (inicialmente oculto) -->
        <div class="contenedor-transparente" id="contenedor-acerca-de-nosotros" style="display: none;">
            <div class="acerca-de-nosotros">
                <h2>Acerca de Nosotros</h2>
                <p>En Licor Store, ofrecemos una amplia selección de licores de alta calidad. Desde vinos finos hasta licores artesanales, nuestra misión es proporcionar a nuestros clientes una experiencia de compra excepcional. Con años de experiencia en la industria, estamos aquí para ayudarte a encontrar el licor perfecto para cada ocasión.</p>
                <p>Email: <a href="mailto:Licorstore.bod@gmail.com">Licorstore.bod@gmail.com</a></p>
                <p>Teléfono: (591) 3 342 - 6600 - (591) 63507627</p>
                <p>Dirección: Av. Beni y Tercer Anillo Externo</p>
                <div class="social-links">
                    <a href="https://facebook.com/licorstore" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://instagram.com/licorstore" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mostrar el contenedor de la lista de productos al hacer clic en "Ver Producto"
        document.getElementById('btn-ver-producto').addEventListener('click', function(event) {
            event.preventDefault(); // Evitar que el enlace recargue la página
            document.getElementById('contenedor-producto').style.display = 'block';
            document.getElementById('contenedor-compra').style.display = 'none'; // Ocultar el otro contenedor
            document.getElementById('contenedor-acerca-de-nosotros').style.display = 'none'; // Ocultar el otro contenedor
        });

        // Mostrar el contenedor del formulario de venta al hacer clic en "Realizar Compra"
        document.getElementById('btn-realizar-compra').addEventListener('click', function(event) {
            event.preventDefault(); // Evitar que el enlace recargue la página
            document.getElementById('contenedor-compra').style.display = 'block';
            document.getElementById('contenedor-producto').style.display = 'none'; // Ocultar el otro contenedor
            document.getElementById('contenedor-acerca-de-nosotros').style.display = 'none'; // Ocultar el otro contenedor
        });

        // Mostrar el contenedor de "Acerca de Nosotros" al hacer clic en "Acerca de Nosotros"
        document.getElementById('btn-acerca-de-nosotros').addEventListener('click', function(event) {
            event.preventDefault(); // Evitar que el enlace recargue la página
            document.getElementById('contenedor-acerca-de-nosotros').style.display = 'block';
            document.getElementById('contenedor-producto').style.display = 'none'; // Ocultar el otro contenedor
            document.getElementById('contenedor-compra').style.display = 'none'; // Ocultar el otro contenedor
        });


        document.getElementById('btn-ver-producto').addEventListener('click', function(event) {
    event.preventDefault(); // Evitar que el enlace recargue la página

    // Mostrar el contenedor de productos
    document.getElementById('contenedor-producto').style.display = 'block';
    document.getElementById('contenedor-compra').style.display = 'none';
    document.getElementById('contenedor-acerca-de-nosotros').style.display = 'none';

    // Llamar a la función para cargar productos
    cargarProductos();
});

function cargarProductos() {
    fetch('buscar_producto_be.php?termino_busqueda=') // Llamar al backend sin término de búsqueda
        .then(response => response.text())
        .then(data => {
            // Insertar la tabla de productos en el contenedor
            document.querySelector('#contenedor-producto table tbody').innerHTML = data;
        })
        .catch(error => console.error('Error al cargar productos:', error));
}

        // Función para generar la factura en PDF
document.querySelector('.botones-venta button[type="submit"]').addEventListener('click', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe

    const { jsPDF } = window.jspdf; // Acceder a la biblioteca jsPDF
    const doc = new jsPDF();

    // Obtener los datos del formulario
    const fecha = document.getElementById('fecha').value;
    const nombreCliente = document.getElementById('nombre-cliente').value;
    const documentoCliente = document.getElementById('documento-cliente').value;
    const tipoDocumento = document.getElementById('tipo-documento').value;
    const totalPagar = document.querySelector('.total-pagar span').textContent;

    // Encabezado de la factura
    doc.setFontSize(18);
    doc.text(`Factura ${tipoDocumento.toUpperCase()}`, 10, 20);
    doc.setFontSize(12);
    doc.text(`Fecha: ${fecha}`, 10, 30);
    doc.text(`Cliente: ${nombreCliente}`, 10, 40);
    doc.text(`Documento: ${documentoCliente}`, 10, 50);

    // Detalles de la compra
    doc.setFontSize(14);
    doc.text("Detalles de la Compra", 10, 60);

    // Obtener los productos de la tabla
    const productos = [];
    const filas = document.querySelectorAll('.tabla-productos tbody tr');
    filas.forEach((fila) => {
        const producto = fila.querySelector('td:nth-child(1)').textContent;
        const precio = fila.querySelector('td:nth-child(2)').textContent;
        const cantidad = fila.querySelector('td:nth-child(4)').textContent;
        productos.push({ producto, precio, cantidad });
    });

    // Agregar los productos al PDF
    let y = 70;
    productos.forEach((item) => {
        doc.text(`${item.producto} - ${item.cantidad} x $${item.precio}`, 10, y);
        y += 10;
    });

    // Total a pagar
    doc.setFontSize(14);
    doc.text(`Total a Pagar: $${totalPagar}`, 10, y + 10);

    // Guardar el PDF
    doc.save(`factura_${tipoDocumento}_${fecha}.pdf`);
});
    </script>

</body>
</html>


