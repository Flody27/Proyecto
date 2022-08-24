<?php
include_once "..\controller\admin_controller.php";
// include_once "..\controller\Productos_controller.php";
include_once "..\controller\icket_controller.php";
include_once "..\controller\Login-Controller.php";
include "Componentes.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Órdenes Recibidas</title>

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
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="cliente-dashboard.php">
                            <i class='bx bxs-receipt icon'></i>
                            <span class="text nav-text">Órdenes</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="cliente-usuarios.php">
                            <i class='bx bxs-user-account icon'></i>
                            <span class="text nav-text">Perfil</span>
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
        <?php navbar();
        $Usuario = $_SESSION['username'];
        $id = $_SESSION['id']; ?>

        <!--------------------- FIN NAVBAR------------- -->

        <!-------------------- INICIO RESUMEN -------------->
        <!-- <div class="tarjetas">
           
            
        </div> -->
        <div class="funciones">
            <h1>Lista de tickets</h1>
            <button onclick="showModal('addTicket');" id="AddBtn" class="button btn-agregar">
                <i class='bx bxs-plus-circle'></i>
                <p>Agregar Ticket</p>
            </button>
            <div class="search-box">
                <p class="button search-btn">
                    <i class="bx bx-search icon"></i>
                </p>
                <input id="search-input" type="text" name="search-input" value="" placeholder="escriba algo para buscar">
            </div>
        </div>
        <!-------------------- FIN RESUMEN -------------->

        <!-------------------- INICIO TABLA -------------->

        <div class="contenido">
            <div id="Tickets" class="tabla_contenido">
                <table class="tabla table-sortable table-search">
                    <thead>
                        <tr class="header">
                            <th># Ticket</th>
                            <th>Fecha</th>
                            <th>Solicitante</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php ConsultarTicketU($Usuario) ?>
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
            <form action="../Controller/icket_controller.php" method="POST">
                <div class="modal-body">

                    <div class="col">
                        <input type="hidden" <?php echo "value='" . $id . "'" ?> name="id_creador">
                        <label for="no_ticket"># Ticket</label>
                        <input type="text" name="no_ticket" id="no_ticket" Value="<?php Nvo_Nro_Ticket(); ?>" readonly="true"><br>
                        <label for="">solicitante</label>
                        <input type="hidden" name="solicitante" <?php echo "value='" . $Usuario . "'" ?>>
                        <input disabled type="text" name="usuario_solicitante" id="" <?php echo "value='" . $id . "-" . $Usuario . "'" ?>>
                        <!-- <select  name="solicitante" id="solicitante">
                            <option selected  selected="selected">
                                
                            </option>
                        </select><br> -->
                        <div class="row">
                            <div class="tabla_productos">
                                <h1 class="titulo_productos">Producto a Solicitar</h1>
                                <label for="idUnidad">Partida</label><br>
                                <select name="txtPartida" id="txtPartida">
                                    <option value="" disabled="disabled" selected="selected">Selecione una partida</option>
                                    <?php ConsultarPartidas(); ?>
                                </select><br>
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cant_prod" id="cant_prod">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="button" id="close-btn" type="button">Cerrar</button>
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