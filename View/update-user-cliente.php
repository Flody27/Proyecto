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
        <?php navbar(); ?>
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
                    </div>
                </div>
                <div class="buttons">
                    <button class="button" type="submit" name="updateUser-btn">Actulizar</button>
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