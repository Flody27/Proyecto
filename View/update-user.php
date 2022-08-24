<?php
require_once "../Controller/Usuario-Controller.php";
include "Componentes.php";
$idPersona = $_GET['idper'];
$item = getUser($idPersona);
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
            <h2>Actulizar informacion de usuario</h2>
            <form action="../Controller/Usuario-Controller.php" method="post">
                <div class="form-body">
                    <div class="col">
                        <input type="hidden" name="id" <?php echo " value='" . $idPersona . "' "; ?>>
                        <label for="name">Nombre</label><br>
                        <input type="text" name="name" id="name" <?php echo " value='" . $item['nombre'] . "' "; ?> required><br>
                        <label for="firstSurname">1º Apellido</label><br>
                        <input type="text" name="firstSurname" id="firstSurname" <?php echo " value='" . $item['apellido1'] . "' "; ?> required><br>
                        <label for="secondSurname">2º Apellido</label><br>
                        <input type="text" name="secondSurname" id="secondSurname" <?php echo " value='" . $item['apellido2'] . "' "; ?> required><br>
                        <label for="username">Nombre de usuario</label><br>
                        <input type="text" name="username" id="username" <?php echo " value='" . $item['username'] . "' "; ?> required><br>
                        <input type="hidden" name="password" <?php echo " value='" . $item['password'] . "' "; ?>>
                    </div>

                    <div class="col">
                        <label for="gender">Selecione un genero</label><br>
                        <div class="radioBtns">
                            <?php
                            getGender($item['sexo']);
                            ?>
                        </div>
                        <label for="idUnidad">Unidad

                        </label><br>
                        <select name="idUnidad" id="idUnidad">
                            <option disabled="disabled" selected="selected">Selecione una unidad</option>
                            <?php getUnidad($item['nombre_unidad']); ?>
                        </select><br>

                        <label for="privileges">Privilegios</label><br>

                        <select name="privileges" id="privileges" required>
                            <option disabled="disabled" selected="selected">Selecione un rol</option>
                            <?php getRol($item['nombre_privilegio']); ?>
                        </select><br>
                        <label for="accountStatement">Estado de cuenta</label><br>
                        <div class="radioBtns">
                            <?php
                            getAccStmt($item['estado_cuenta']);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <button onclick="showModal('confDelete');" class="button cancel-btn" id="conf-delete" type="button">Eliminar</button>
                    <button class="button" type="submit" name="update-btn">Actulizar</button>
                </div>
            </form>
        </div>
        <!-------------------- FIN FORMULARIO -------------->
    </section>
    </div>
    <div id="confDelete" class="modal">

        <div class="modal-content modal-delte-confirm">
            <div class="modal-header">
                <i id="close-x" class='cerrar-btn bx bx-x'></i>
                <p>Eliminar usuario</p>
            </div>
            <div class="modal-body">
                <h2 class="red-text">! Esta seguro en eliminar este usuario</h2>
            </div>
            <div class="modal-footer">
                <button id="close-btn" class="button" type="button">Cancelar</button>
                <form action="../Controller/Usuario-Controller.php" method="post">
                    <button class="button cancel-btn" name="delete-btn" type="submit">
                        <?php echo " <a href='../Controller/Usuario-Controller.php?dlt=" . $item['id_persona'] . "'>Eliminar</a> "; ?>
                    </button>
                </form>
            </div>

        </div>

    </div>
    <script src="../js/script.js"></script>
    <script src="../JS/Modal.js"></script>
</body>


</html>