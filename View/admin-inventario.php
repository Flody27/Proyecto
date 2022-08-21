<?php
include_once "..\controller\productos_controller.php";
include "Componentes.php";
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
        <?php navbar(); ?>
        <!--------------------- FIN NAVBAR------------- -->

        <!-------------------- INICIO RESUMEN -------------->
        <div class="tarjetas">
            <h1>Inventario</h1>
            <button onclick="showModal('addTicket');" id="AddBtn" class="button btn-agregar">
                <i class='bx bxs-plus-circle'></i>
                <p>Agregar Producto</p>
            </button>
        </div>

        <!-------------------- FIN RESUMEN -------------->

        <!-------------------- INICIO TABLA -------------->
        <div class="contenido">
            <div id="Inventario" class="tabla_contenido">

                <table class="tabla table-sortable">
                    <thead>
                        <tr>
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
   <div id="addTicket" class="modal">
        <!-- Contenido -->
        <div class="modal-content">
            <div class="modal-header">
                <i id="close-x" class="cerrar-btn bx bx-x"></i>
                <p>Crear Ticket</p>
            </div>
            <form action="../Controller/productos_controller.php" method="POST">
                <div class="modal-body">

                    <div class="col">
                        <label for="name">Serie</label><br>
                        <input type="text" name="serie" id="serie" required><br>
                        <label for="firstSurname">Placa</label><br>
                        <input type="text" name="placa" id="placa" required><br>
                        <label for="secondSurname">Marca</label><br>
                        <input type="text" name="marca" id="marca" required><br>
                        <label for="username">Modelo</label><br>
                        <input type="text" name="modelo" id="modelo" required><br>
                    </div>

                    <div class="col">
                        <label for="categoria">Categoría de Producto</label><br>
                        <select name="id_categoria" id="id_categoria">
                            <option value="" disabled="disabled" selected="selected">Selecione una categoría</option>
                            <?php getUnidades(); ?>
                        </select><br>

                        <label for="idUnidad">Partida</label><br>
                        <select name="id_partida" id="id_partida">
                            <option value="" disabled="disabled" selected="selected">Selecione una partida</option>
                            <?php ConsultarPartidas(); ?>
                        </select><br>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="button" type="submit" name="btnCrearTicket">Crear Ticket</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/script.js"></script>
    <script src="../JS/Modal.js"></script>
    <script src="../JS/sortTable.js"></script>

</body>
</div>

</html>