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
                        <a href="">
                            <i class='bx bxs-bell icon'></i>
                            <span class="text nav-text">Notificaciones</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="">
                            <i class='bx bxs-receipt icon'></i>
                            <span class="text nav-text">Órdenes</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="">
                            <i class='bx bxs-spreadsheet icon'></i>
                            <span class="text nav-text">Inventario</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="adim-usuarios.php">
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
            <h1>Lista de usuarios</h1>
            <div class="dashboard-container">
                <button id="myBtn" class="btn-agregar">
                    <i class='bx bxs-plus-circle'></i>
                    <p>Agregar Usuario</p>
                </button>

            </div>
        </div>

        <!-------------------- FIN RESUMEN -------------->

        <!-------------------- INICIO TABLA -------------->
        <div id="tabla_demo">
            <div class="row">
                <div class="col-12">

                    <table id="tbl_Demo">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>1º Apellido</th>
                                <th>2º Apellido</th>
                                <th>Username</th>
                                <th>Sexo</th>
                                <th>Unidad</th>
                                <th>Cuenta</th>
                                <th>Privilegios</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php getUsers(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>


    <!--Modal -->
    <div id="myModal" class="modal">

        <!-- Contenido -->
        <div class="modal-content">
            <div class="modal-header">
                <i id="close-x" class='cerrar-btn bx bx-x'></i>
                <p>Agregar usuario</p>
            </div>
            <form action="../Controller/Usuario-Controller.php" method="POST">
                <div class="modal-body">

                    <div class="col">
                        <label for="name">Nombre</label><br>
                        <input type="text" name="name" id="name"><br>
                        <label for="firstSurname">1º Apellido</label><br>
                        <input type="text" name="firstSurname" id="firstSurname"><br>
                        <label for="secondSurname">2º Apellido</label><br>
                        <input type="text" name="secondSurname" id="secondSurname"><br>
                        <label for="username">Nombre de usuario</label><br>
                        <input type="text" name="username" id="username"><br>
                        <label for="password">Contraseña</label><br>
                        <input type="password" name="password" id="password"><br>
                    </div>

                    <div class="col">
                        <label for="gender">Selecione un genero</label><br>
                        <div class="radioBtns">
                            <input type="radio" name="gender" id="gender" value="Masculino">
                            <p>Masculino</p>
                            <input type="radio" name="gender" id="gender" value="Femenino">
                            <p>Femenino</p>
                        </div>
                        <label for="idUnidad">Unidad</label><br>
                        
                        <select name="idUnidad" id="idUnidad">
                            <option value="" disabled="disabled" selected="selected">Selecione una unidad</option>
                            <?php getUnidades(); ?>
                        </select><br>

                        <label for="privileges">Privilegios</label><br>

                        <select name="privileges" id="privileges">
                            <option value="" disabled="disabled" selected="selected">Selecione un rol</option>
                            <?php getRoles(); ?>
                        </select><br>
                        <label for="accountStatement">Estado de cuenta</label><br>
                        <div class="radioBtns">
                            <input type="radio" name="accountStatement" id="accountStatement" value="Activo">
                            <p>Activo</p>
                            <input type="radio" name="accountStatement" id="accountStatement" value="Inactivo">
                            <p>Inactivo</p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="close-btn" type="button">Cerrar</button>
                    <button type="submit" name="sing-up-btn">Agregar</button>
                </div>
            </form>
        </div>


        <script src="../js/script.js"></script>
        <script src="../JS/Modal.js"></script>
</body>
</div>

</html>