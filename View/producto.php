<?php
include_once "../Controller/productos_controller.php";
 include_once "..\Controller\Usuario-Controller.php";
include "Componentes.php";

$no_producto = $_GET["q"];
$Producto = ConsultarProducto($no_producto);

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
    <title>Document</title>
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
        <?php navbar(); role();?>
        <!--------------------- FIN NAVBAR------------- -->

        <!-------------------- INICIO FORMULARIO -------------->
        <div class="form">
            <h2>Información de Producto</h2>
            <form action="../Controller/productos_controller.php" method="post">
                <div class="form-body" id="cuerpo_form_ticket">
                    <div class="col">
                        <div class="row" style="width: 150%;">
                            <label for="ticket">Placa: </label><br>
                            <input type="text" name="Placa" id="Placa" Value="<?php echo $Producto["placa_producto"]; ?>" readonly="true"><br>
                            <label for="fecha">Serie: </label><br>
                            <input type="text" name="Serie" id="Serie" Value="<?php echo $Producto["serie_producto"]; ?>" readonly="true"><br>
                            <label for="solicitante">Descripción: </label><br>
                            <input type="text" name="Descripcion" id="Descripcion" Value="<?php echo $Producto["descripcion_partida"]; ?>" readonly="true" style="height: 150px;"><br>
                            <label for="estado">Estado de Disponibilidad: </label><br>
                            <select name="Estado" id="Estado">                            
                            <?php getEstado($item['desc_estado']); ?>
                        </select>                            
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