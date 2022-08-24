<?php
include_once "..\controller\Usuario-Controller.php";
include_once "..\controller\admin_controller.php";
include_once "..\controller\Login-Controller.php";
include "Componentes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrador de usuarios</title>

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
        $Usuario = $_SESSION['username']; ?>
        <!--------------------- FIN NAVBAR------------- -->

        <!-------------------- INICIO RESUMEN -------------->
        <div class="tarjetas">
            <h1>Usuario</h1>
        </div>

        <!-------------------- FIN RESUMEN -------------->

        <!-------------------- INICIO TABLA -------------->
        <div class="contenido">
            <table class="tabla table-sortable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre completo</th>
                        <th>Username</th>
                        <th>Sexo</th>
                        <th>Unidad</th>
                        <th>Cuenta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php getUsuario($Usuario) ?>
                </tbody>
            </table>
        </div>

    </section>

    <script src="../js/script.js"></script>
    <script src="../JS/Modal.js"></script>
    <script src="../JS/sortTable.js"></script>

</body>
</div>

</html>