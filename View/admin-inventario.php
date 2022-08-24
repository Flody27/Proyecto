<?php
include "..\controller\productos_controller.php";
include "Componentes.php";
include_once "..\controller\Usuario-Controller.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrador de Inventario</title>

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../CSS/Modal.css">
</head>

<body>
    <!------------------- SIDEBAR ------------------>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="admin-dashboard.php"><img src="../logo.png" alt="logo"></a>
                </span>

                <div class="text header-text">
                    <span class="name">Convenio Marco</span>
                </div>
            </div>

            <i class='bx bx-right-arrow-circle toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class="bx bx-search icon"></i>
                    <input type="search" placeholder="Buscar...">
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="admin-inventario.php">
                            <i class='bx bxs-bell icon'></i>
                            <span class="text nav-text">Notificaciones</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="admin-tickets.php">
                            <i class='bx bxs-receipt icon'></i>
                            <span class="text nav-text">Órdenes</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="admin-inventario.php">
                            <i class='bx bxs-spreadsheet icon'></i>
                            <span class="text nav-text">Inventario</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="admin-usuarios.php">
                            <i class='bx bxs-user-account icon'></i>
                            <span class="text nav-text">Admin. Usuarios</span>
                        </a>
                    </li>
                </ul>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <form action="../Controller/Login-Controller.php" method="post">
                        <button type="submit" name="logout-btn">
                            <i class="bx bx-log-out icon"></i>
                            <span class="text nav-text">Cerrar Sesión</span>
                        </button>
                    </form>
                </li>
            </div>
        </div>
    </nav>
    <!-------------------- FIN SIDEBAR -------------->

    <section class="home-section">
        <!-------------------- INICIO NAVBAR -------------->
        <?php navbar(); role(); ?>
        <!--------------------- FIN NAVBAR------------- -->

        <!-------------------- INICIO FUNCIONES -------------->
        <div class="funciones">
        <h1>Inventario</h1>
        <button onclick="showModal('addProducto');" id="AddBtn" class="button btn-agregar">
                <i class='bx bxs-plus-circle'></i>
                <p>Agregar Producto</p>
            </button>
            <div class="search-box">
            <p class="button search-btn">
                    <i class="bx bx-search icon"></i>
                </p>
                <input id="search-input" type="text" name="search-input" value="" placeholder="escriba algo para buscar">
            </div>
        </div>

        <!-------------------- FIN FUNCIONES -------------->

        <!-------------------- INICIO TABLA -------------->
        <div class="contenido">
            <div id="Inventario" class="tabla_contenido">

                <table class="tabla table-sortable table-search">
                    <thead>
                        <tr class="header">
                            <th>Serie</th>
                            <th>Placa</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Categoría</th>
                            <th>Partida</th>
                            <th>Disponibildad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php TablaInventario(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>


   <!--Modal -->
   <div id="addProducto" class="modal">
        <!-- Contenido -->
        <div class="modal-content">
            <div class="modal-header">
                <i id="close-x" class="cerrar-btn bx bx-x"></i>
                <p>Registrar Producto</p>
            </div>
            <form action="" method="POST">
                <div class="modal-body">

                    <div class="col">
                        <label for="name">Serie</label>
                        <input type="text" name="serie" id="serie" required>
                        <label for="firstSurname">Placa</label>
                        <input type="text" name="placa" id="placa" required>
                        <label for="idUnidad">Marca</label>
                        <select name="marca" id="marca">
                            <option value="" disabled="disabled" selected="selected">Selecione una marca</option>
                            <?php ConsultarMarcas();?>
                        </select>
                        <label for="username">Modelo</label>
                        <input type="text" name="modelo" id="modelo" required>
                        <label for="idUnidad">Categoría de Producto</label>
                        <select name="categoriaID" id="categoriaID" required>
                            <option value="" disabled="disabled" selected="selected">Selecione una categoría</option>
                            <?php ConsultarCategorias();?>
                        </select>
                     
                        <label for="idUnidad">Partida</label>
                        <select name="id_partida" id="id_partida">
                            <option value="" disabled="disabled" selected="selected">Selecione una partida</option>
                            <?php ConsultarPartidas();?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="button" type="submit" name="btnCrearProducto">Registrar Producto</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../JS/script.js"></script>
    <script src="../JS/Modal.js"></script>
    <script src="../JS/sortTable.js"></script>

</body>
</div>

</html>