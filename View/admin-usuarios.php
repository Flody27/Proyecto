<?php
include_once "..\controller\Usuario-Controller.php";
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

        <!-------------------- INICIO FUNCIONES -------------->
        <div class="funciones">
            <h1>Lista de usuarios</h1>
            <button onclick="showModal('addUser');" id="AddBtn" class="button btn-agregar">
                <i class='bx bxs-plus-circle'></i>
                <p>Agregar Usuario</p>
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
            <table class="tabla table-sortable table-search">
                <thead>
                    <tr class="header">
                        <th>ID</th>
                        <th>Nombre completo</th>
                        <th>Username</th>
                        <th>Sexo</th>
                        <th>Unidad</th>
                        <th>Cuenta</th>
                        <th>Privilegios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php getUsers(); ?>
                </tbody>
            </table>
        </div>

    </section>


    <!--Modal -->
    <div id="addUser" class="modal">
        <!-- Contenido -->
        <div class="modal-content">
            <div class="modal-header">
                <i id="close-x" class="cerrar-btn bx bx-x"></i>
                <p>Agregar usuario</p>
            </div>
            <form action="../Controller/Usuario-Controller.php" method="POST">
                <div class="modal-body">

                    <div class="col">
                        <label for="name">Nombre</label><br>
                        <input type="text" name="name" id="name" required><br>
                        <label for="firstSurname">1º Apellido</label><br>
                        <input type="text" name="firstSurname" id="firstSurname" required><br>
                        <label for="secondSurname">2º Apellido</label><br>
                        <input type="text" name="secondSurname" id="secondSurname" required><br>
                        <label for="username">Nombre de usuario</label><br>
                        <input type="text" name="username" id="username" required><br>
                        <label for="password">Contraseña</label><br>
                        <input type="password" name="password" id="password" required><br>
                    </div>

                    <div class="col">
                        <label for="gender">Selecione un genero</label><br>
                        <div class="radioBtns">
                            <input type="radio" name="gender" id="gender" value="Masculino" required>
                            <p>Masculino</p>
                            <input type="radio" name="gender" id="gender" value="Femenino" required>
                            <p>Femenino</p>
                        </div>
                        <label for="idUnidad">Unidad

                        </label><br>
                        <!-- <input name="idUnidad" type="number" list="unidades"/><br>
                        <datalist id="unidades">
                          
                        </datalist> -->
                        <select name="idUnidad" id="idUnidad">
                            <option value="" disabled="disabled" selected="selected">Selecione una unidad</option>
                            <?php getUnidades(); ?>
                        </select><br>

                        <label for="privileges">Privilegios</label><br>

                        <select name="privileges" id="privileges" required>
                            <option value="" disabled="disabled" selected="selected">Selecione un rol</option>
                            <?php getRoles(); ?>
                        </select><br>
                        <label for="accountStatement">Estado de cuenta</label><br>
                        <div class="radioBtns">
                            <input type="radio" name="accountStatement" id="accountStatement" value="Activo" required>
                            <p>Activo</p>
                            <input type="radio" name="accountStatement" id="accountStatement" value="Inactivo" required>
                            <p>Inactivo</p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="button" id="close-btn" type="button">Cerrar</button>
                    <button class="button" type="submit" name="sing-up-btn">Agregar</button>
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