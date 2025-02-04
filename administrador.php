<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Ventas</title>
    <style>
        html {
            scroll-behavior: smooth; /* Desplazamiento suave */
        }
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
            background-attachment: fixed;
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            margin: 20px;
        }

        .contenedor-transparente {
            width: 90%; /* Ancho del contenedor */
            min-height: 70%; /* Altura mínima del contenedor */
            background-color: rgba(255, 255, 255, 0.2); /* Fondo transparente */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            gap: 20px; /* Espacio entre las dos secciones */
        }

        .seccion-detalle {
            flex: 1;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco con transparencia */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .seccion-lista {
            flex: 2;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco con transparencia */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .botones {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .botones button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #2c3e50; /* Azul oscuro */
            color: white;
            transition: background-color 0.3s ease;
        }

        .botones button:hover {
            background-color: #1abc9c; /* Verde aguamarina */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        table th {
            background-color: #2c3e50; /* Azul oscuro */
            color: white;
        }

        .buscar {
            margin-bottom: 20px;
        }

        .buscar input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Sistema de Ventas</h1>
        <div class="user-info">Usuario: ADMIN</div>
    </div>

    <div class="nav">
        <div class="nav-item">
            <img src="1307714.png" alt="Usuarios"> Usuarios
            <div class="dropdown-content">
                <a href="#seccion-usuarios" onclick="mostrarSeccionUsuarios()">Agregar Usuario</a>
                <a href="#seccion-usuarios" onclick="mostrarSeccionUsuarios()">Editar Usuario</a>
                <a href="#seccion-usuarios" onclick="mostrarSeccionUsuarios()">Eliminar Usuario</a>
            </div>
        </div>
        <div class="nav-item">
            <img src="12201509.png" alt="Inventario"> Inventario
            <div class="dropdown-content">
                <a href="#seccion-inventario" onclick="mostrarSeccionInventario()">Agregar Producto</a>
                <a href="#seccion-inventario" onclick="mostrarSeccionInventario()">Editar Producto</a>
                <a href="#seccion-inventario" onclick="mostrarSeccionInventario()">Eliminar Producto</a>
            </div>
        </div>
        <div class="nav-item">
            <img src="6633320.png" alt="Ventas"> Ventas
            <div class="dropdown-content">
                <a href="#">Nueva Venta</a>
                <a href="#">Historial de Ventas</a>
            </div>
        </div>
        <div class="nav-item">
            <img src="7626835.png" alt="Compras"> Compras
            <div class="dropdown-content">
                <a href="#">Nueva Compra</a>
                <a href="#">Historial de Compras</a>
            </div>
        </div>
        <div class="nav-item">
            <img src="2051943.png" alt="Clientes"> Clientes
            <div class="dropdown-content">
                <a href="#">Agregar Cliente</a>
                <a href="#">Editar Cliente</a>
                <a href="#">Eliminar Cliente</a>
            </div>
        </div>
        <div class="nav-item">
            <img src="7988637.png" alt="Proveedores"> Proveedores
            <div class="dropdown-content">
                <a href="#">Agregar Proveedor</a>
                <a href="#">Editar Proveedor</a>
                <a href="#">Eliminar Proveedor</a>
            </div>
        </div>
        <div class="nav-item">
            <img src="icon7.png" alt="Acerca de"> Acerca de
            <div class="dropdown-content">
                <a href="#">Información</a>
                <a href="#">Contacto</a>
            </div>
        </div>
    </div>

    <!-- Sección de Usuarios -->
    <div class="content" id="seccion-usuarios">
        <div class="contenedor-transparente">
            <!-- Sección Detalle Usuario -->
            <div class="seccion-detalle">
                <h2>Detalle Usuario</h2>
                <div class="form-group">
                    <label for="nroDocumento">Nro Documento:</label>
                    <input type="text" id="nroDocumento" placeholder="Ingrese el número de documento">
                </div>
                <div class="form-group">
                    <label for="nombreCompleto">Nombre Completo:</label>
                    <input type="text" id="nombreCompleto" placeholder="Ingrese el nombre completo">
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" placeholder="Ingrese el correo">
                </div>
                <div class="form-group">
                    <label for="rol">Rol:</label>
                    <input type="text" id="rol" placeholder="Ingrese el rol">
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" placeholder="Ingrese el estado">
                </div>
                <div class="botones">
                    <button onclick="guardarUsuario()">Guardar</button>
                    <button onclick="limpiarFormulario()">Limpiar</button>
                    <button onclick="eliminarUsuario()">Eliminar</button>
                </div>
            </div>

            <!-- Sección Lista de Usuarios -->
            <div class="seccion-lista">
                <h2>Lista de Usuarios</h2>
                <div class="buscar">
                    <input type="text" id="buscar" placeholder="Buscar por Nro Documento" oninput="filtrarUsuarios()">
                </div>
                <table id="tabla-usuarios">
                    <thead>
                        <tr>
                            <th>Nro Documento</th>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Los datos se cargarán dinámicamente aquí -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Sección de Inventario -->
    <div class="content" id="seccion-inventario" style="display: none;">
        <div class="contenedor-transparente">
            <!-- Sección Detalle Producto -->
            <div class="seccion-detalle">
                <h2>Detalle Producto</h2>
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="text" id="codigo" placeholder="Ingrese el código">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" placeholder="Ingrese el nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" placeholder="Ingrese la descripción">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <input type="text" id="categoria" placeholder="Ingrese la categoría">
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" id="stock" placeholder="Ingrese el stock">
                </div>
                <div class="form-group">
                    <label for="precioCompra">Precio Compra:</label>
                    <input type="number" id="precioCompra" placeholder="Ingrese el precio de compra">
                </div>
                <div class="form-group">
                    <label for="precioVenta">Precio Venta:</label>
                    <input type="number" id="precioVenta" placeholder="Ingrese el precio de venta">
                </div>
                <div class="botones">
                    <button onclick="guardarProducto()">Guardar</button>
                    <button onclick="limpiarFormulario()">Limpiar</button>
                    <button onclick="eliminarProducto()">Eliminar</button>
                </div>

                
            </div>

            <!-- Sección Lista de Productos -->
            <div class="seccion-lista">
                            <h2>Lista de Productos</h2>
                            <div class="buscar">
                                <input type="text" id="buscarProducto" placeholder="Buscar por Código" oninput="filtrarProductos()">
                            </div>
                            <table id="tabla-productos">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Categoría</th>
                                        <th>Stock</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- La tabla estará vacía inicialmente -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


    <script>
        // Función para mostrar la sección de usuarios y ocultar la de inventario
        function mostrarSeccionUsuarios() {
            document.getElementById("seccion-usuarios").style.display = "flex"; // Mostrar usuarios
            document.getElementById("seccion-inventario").style.display = "none"; // Ocultar inventario
        }

        // Función para mostrar la sección de inventario y ocultar la de usuarios
        function mostrarSeccionInventario() {
            document.getElementById("seccion-usuarios").style.display = "none"; // Ocultar usuarios
            document.getElementById("seccion-inventario").style.display = "flex"; // Mostrar inventario
        }


         // Cargar lista de usuarios
    function cargarUsuarios() {
        fetch('usuarios_be.php?listarUsuarios')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector("#tabla-usuarios tbody");
                tbody.innerHTML = "";

                data.forEach(usuario => {
                    const row = `
                        <tr>
                            <td>${usuario.Documento}</td>
                            <td>${usuario.NombreCompleto}</td>
                            <td>${usuario.Correo}</td>
                            <td>${usuario.IdRol}</td>
                            <td>${usuario.Estado ? 'Activo' : 'Inactivo'}</td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });
            });
    }

            function guardarUsuario() {
            const documento = document.getElementById("nroDocumento").value;
            const nombreCompleto = document.getElementById("nombreCompleto").value;
            const correo = document.getElementById("correo").value;
            const rol = document.getElementById("rol").value;
            const estado = document.getElementById("estado").value;

            const datos = new FormData();
            datos.append("guardarUsuario", true);
            datos.append("documento", documento);
            datos.append("nombreCompleto", nombreCompleto);
            datos.append("correo", correo);
            datos.append("rol", rol);
            datos.append("estado", estado);

            fetch('usuarios_be.php', {
                method: 'POST',
                body: datos
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Usuario guardado correctamente.");
                    cargarUsuarios(); // Recargar la lista de usuarios
                    limpiarFormulario(); // Limpiar el formulario
                } else {
                    alert("Error al guardar el usuario: " + data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function limpiarFormulario() {
            document.getElementById("nroDocumento").value = "";
            document.getElementById("nombreCompleto").value = "";
            document.getElementById("correo").value = "";
            document.getElementById("rol").value = "";
            document.getElementById("estado").value = "";
        }


        function eliminarUsuario() {
            const documento = document.getElementById("nroDocumento").value;

            if (!documento) {
                alert("Por favor, ingrese el número de documento del usuario a eliminar.");
                return;
            }

            if (confirm("¿Está seguro de que desea eliminar este usuario?")) {
                const datos = new FormData();
                datos.append("eliminarUsuario", true);
                datos.append("documento", documento);

                fetch('usuarios_be.php', {
                    method: 'POST',
                    body: datos
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Usuario eliminado correctamente.");
                        cargarUsuarios(); // Recargar la lista de usuarios
                        limpiarFormulario(); // Limpiar el formulario
                    } else {
                        alert("Error al eliminar el usuario: " + data.error);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

    // Función para cargar productos
    function cargarProductos() {
                fetch('productos_be.php?listarProductos')
                    .then(response => response.json())
                    .then(data => {
                        const tbody = document.querySelector("#tabla-productos tbody");
                        tbody.innerHTML = ""; // Limpiar la tabla antes de cargar los datos

                        data.forEach(producto => {
                            const row = `
                                <tr>
                                    <td>${producto.Codigo}</td>
                                    <td>${producto.Nombre}</td>
                                    <td>${producto.Descripcion}</td>
                                    <td>${producto.IdCategoria}</td>
                                    <td>${producto.Stock}</td>
                                    <td>${producto.PrecioCompra}</td>
                                    <td>${producto.PrecioVenta}</td>
                                </tr>
                            `;
                            tbody.innerHTML += row; // Agregar la fila a la tabla
                        });
                    })
                    .catch(error => console.error('Error al cargar productos:', error));
            }



    // Cargar datos al cargar la página
    document.addEventListener("DOMContentLoaded", () => {
        cargarUsuarios();
        cargarProductos();
    });

    //filtrar productos
    function filtrarProductos() {
    const buscar = document.getElementById("buscarProducto").value.toLowerCase();
    const filas = document.querySelectorAll("#tabla-productos tbody tr");

    filas.forEach(fila => {
        const codigo = fila.cells[0].textContent.toLowerCase();
        if (codigo.includes(buscar)) {
            fila.style.display = "";
        } else {
            fila.style.display = "none";
        }
    });
}

  // Función para guardar un producto
  function guardarProducto() {
            const codigo = document.getElementById("codigo").value;
            const nombre = document.getElementById("nombre").value;
            const descripcion = document.getElementById("descripcion").value;
            const categoria = document.getElementById("categoria").value;
            const stock = document.getElementById("stock").value;
            const precioCompra = document.getElementById("precioCompra").value;
            const precioVenta = document.getElementById("precioVenta").value;

            const datos = new FormData();
            datos.append("guardarProducto", true);
            datos.append("codigo", codigo);
            datos.append("nombre", nombre);
            datos.append("descripcion", descripcion);
            datos.append("categoria", categoria);
            datos.append("stock", stock);
            datos.append("precioCompra", precioCompra);
            datos.append("precioVenta", precioVenta);

            fetch('productos_be.php', {
                method: 'POST',
                body: datos
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Producto guardado correctamente.");
                    cargarProductos(); // Recargar la lista de productos
                    limpiarFormulario(); // Limpiar el formulario
                } else {
                    alert("Error al guardar el producto: " + data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        }


        // Función para eliminar un producto
        function eliminarProducto() {
                    const codigo = document.getElementById("codigo").value;

                    if (!codigo) {
                        alert("Por favor, ingrese el código del producto a eliminar.");
                        return;
                    }

                    if (confirm("¿Está seguro de que desea eliminar este producto?")) {
                        const datos = new FormData();
                        datos.append("eliminarProducto", true);
                        datos.append("codigo", codigo);

                        fetch('productos_be.php', {
                            method: 'POST',
                            body: datos
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert("Producto eliminado correctamente.");
                                cargarProductos(); // Recargar la lista de productos
                                limpiarFormulario(); // Limpiar el formulario
                            } else {
                                alert("Error al eliminar el producto: " + data.error);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                }


                // Función para limpiar el formulario
        function limpiarFormulario() {
            document.getElementById("codigo").value = "";
            document.getElementById("nombre").value = "";
            document.getElementById("descripcion").value = "";
            document.getElementById("categoria").value = "";
            document.getElementById("stock").value = "";
            document.getElementById("precioCompra").value = "";
            document.getElementById("precioVenta").value = "";
        }

         // Cargar productos al cargar la página
         document.addEventListener("DOMContentLoaded", () => {
            cargarProductos();
        });

    // Filtrar productos
    function filtrarProductos() {
        const buscar = document.getElementById("buscarProducto").value.toLowerCase();
        const filas = document.querySelectorAll("#tabla-productos tbody tr");

        filas.forEach(fila => {
            const codigo = fila.cells[0].textContent.toLowerCase();
            if (codigo.includes(buscar)) {
                fila.style.display = "";
            } else {
                fila.style.display = "none";
            }
        });
    }

    


        
    </script>

</body>
</html>