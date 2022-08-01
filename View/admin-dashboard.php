<?php
include "..\controller\admin_controller.php";
include "Componentes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrador - Dashboard</title>

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <!------------------- SIDEBAR ------------------>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                <a href="admin-dashboard.php"><img  src="../logo.png" alt="logo"></a>
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
                    <li>
                        <button class="tablink" onclick="openPage('Unidades', this)">
                            <i class='bx bxs-bell icon'></i>
                            <span class="text nav-text">Notificaciones</span>
                        </button>
                    </li>
                    <li>
                        <button class="tablink" onclick="openPage('Tickets', this)" id="defaultOpen">
                            <i class='bx bxs-receipt icon'></i>
                            <span class="text nav-text">Órdenes</span>

                    </li>
                    <li>
                        <button class="tablink" onclick="openPage('Inventario', this)">
                            <i class='bx bxs-spreadsheet icon'></i>
                            <span class="text nav-text">Inventario</span>
                        </button>
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
            <h1>Resumen Inventario</h1>
            <div class="dashboard-container">

                <div class="card tarjeta1">
                    <div class="info-portatiles">
                        <h3>Portátiles</h3>
                        <h2><?php CantPortatilesDisponibles(); ?></h2>
                    </div>
                </div>

                <div class="card tarjeta2">
                    <div class="info-workstations">
                        <h3>Workstations</h3>
                        <h2><?php CantWorkstationDisponibles(); ?></h2>
                    </div>
                </div>

                <div class="card tarjeta3">
                    <div class="info-desktops">
                        <h3>Desktops</h3>
                        <h2><?php CantDesktopDisponibles(); ?></h2>
                    </div>
                </div>

                <div class="card tarjeta4">
                    <div class="info-Impresoras">
                        <h3>Impresoras</h3>
                        <h2><?php CantImpresoraDisponibles(); ?></h2>
                    </div>
                </div>

                <div class="card tarjeta5">
                    <div class="info-scanners">
                        <h3>Scanners</h3>
                        <h2><?php CantScannerDisponibles(); ?></h2>
                    </div>
                </div>

                <div class="card tarjeta6">
                    <div class="info-servidores">
                        <h3>Servidores</h3>
                        <h2><?php CantServerDisponibles(); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <!-------------------- FIN RESUMEN -------------->

        <!-------------------- INICIO TABLA -------------->
        <div class="contenido">
            <div id="Tickets" class="tabcontent">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th># Ticket</th>
                            <th>Fecha</th>
                            <th>Solicitante</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php TablaTickets(); ?>
                    </tbody>
                </table>

            </div>
            <div id="Inventario" class="tabcontent">

                <table class="tabla">
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

            <div id="Unidades" class="tabcontent">

                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Id Unidad</th>
                            <th>Nombre Unidad</th>
                            <th>ID Región</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php LlenadoTabla(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="contenedor-modal">
            <div class="modal modal-close">
                <i class='bx bxs-up-arrow cierre_modal'></i>
                <div class="detalle-ticket">
                    <div class="header-ticket">
                        <div class="no_ticket">
                            <h1 class="no_ticket">Ticket:</h1>
                            <input type="text" id="numero" name="numero" value="" readonly="true">
                        </div>
                        <div class="fecha_apertura">
                            <h2 class="etiqueta_fecha">Fecha:</h2>
                            <input type="text" id="fecha" name="fecha" value="" readonly="true">
                        </div>
                        <div class="solicitante">
                            <h2 class="etiqueta_solicitante">Solicitante:</h2>
                            <input type="text" id="nombre" name="nombre" value="" readonly="true">
                        </div>
                        <div class="estado_ticket">
                            <h2 class="etiqueta_estado">Estado:</h2>
                            <input type="text" id="estado" name="estado" value="" readonly="true">
                        </div>
                    </div>

                    <div class="detalles">
                        <div class="tabla_productos">
                            <h1 class="titulo_productos">Producto Solicitado</h1>
                            <table class="productos">
                                <thead>
                                    <tr>
                                        <th>Partida</th>
                                        <th>Descripción</th>
                                        <th>Cantidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- /*<?php //LlenadoTabla(); 
                                            ?>*/ -->
                                </tbody>
                            </table>
                        </div>
                        <div class="tabla_anotaciones">
                            <h1 class="titulo_anotaciones">Anotaciones</h1>
                            <table class="anotaciones">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Autor</th>
                                        <th>Comentario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- /*<?php //LlenadoTabla(); 
                                            ?>*/ -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>







    <script src="../js/script.js"></script>
</body>

</html>