<?php
include_once "../Controller/admin_controller.php";
include_once "../Controller/icket_controller.php";
include_once "..\controller\Usuario-Controller.php";

include "Componentes.php";

$no_ticket = $_GET["q"];
$Ticket = ConsultarTicket($no_ticket);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../CSS/Modal.css">
    <title>Ticket</title>
</head>

<body>

    <!------------------- SIDEBAR ------------------>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../logo.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">Convenio Marco</span>
                </div>
            </div>

            <i class='bx bx-right-arrow-circle toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
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
        <?php navbar();
        role(); ?>
        <!--------------------- FIN NAVBAR------------- -->

        <!-------------------- INICIO FORMULARIO -------------->
        <div class="form">
            <h2>Información de Ticket</h2>
            <form action="../Controller/icket_controller.php" method="post">
                <div class="form-body" id="cuerpo_form_ticket">
                    <div class="col">
                        <div class="row">
                            <label for="ticket">Ticket: </label><br>
                            <input type="text" name="ticket" id="ticket" Value="<?php echo $Ticket["No_Ticket"]; ?>" readonly="true"><br>
                            <label for="fecha">Fecha: </label><br>
                            <input type="text" name="fecha" id="fecha" Value="<?php echo $Ticket["fecha_apertura"]; ?>" readonly="true"><br>
                            <label for="solicitante">Solicitante: </label><br>
                            <input type="text" name="solicitante" id="solicitante" Value="<?php echo $Ticket["nombre"]; ?>" required><br>
                            <label for="estado">Estado de Ticket: </label><br>
                            <input type="text" name="estado_ticket" id="estado_ticket" Value="<?php echo $Ticket["estado_ticket"]; ?>" required><br>
                        </div>

                        <div class="row">
                            <div class="tabla_productos">
                                <h1 class="titulo_productos">Producto Solicitado</h1>
                                <table class="productos">
                                    <thead>
                                        <tr>
                                            <th>Partida</th>
                                            <th>Descripcion</th>
                                            <th>Cantidad</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php TablaDetalleTicket($no_ticket); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
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
                                        <?php TablaComentariosTicket($no_ticket); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="button" type="submit" name="btnActualizar">Actualizar</button>
                    </div>
            </form>
        </div>
        <!-------------------- FIN FORMULARIO -------------->
    </section>
    </div>

    <script src="../js/script.js"></script>
    <script src="../JS/Modal.js"></script>
</body>


</html>