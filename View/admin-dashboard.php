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

            <div id="Unidades" class="tabla_contenido">

                <table class="tabla table-sortable">
                    <thead>
                        <tr>
                            <th>Id Unidad</th>
                            <th>Nombre Unidad</th>
                            <th>ID Región</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>  
    </section>







    <script src="../js/script.js"></script>
    <script src="../JS/sortTable.js"></script>
</body>

</html>