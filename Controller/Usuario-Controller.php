<?php
include '../Model/Usuario-Model.php';
if (isset($_POST['sing-up-btn'])) {
    $name = $_POST['name'];
    $firstSurname = $_POST['firstSurname'];
    $secondSurname = $_POST['secondSurname'];
    $gender = $_POST['gender'];
    $idUnidad = $_POST['idUnidad'];
    $accountStatement = $_POST['accountStatement'];
    $privileges = $_POST['privileges'];
    $username =  $_POST['username'];
    $password = $_POST['password'];
    if (singup(
        $name,
        $firstSurname,
        $secondSurname,
        $username,
        $password,
        $gender,
        $idUnidad,
        $accountStatement,
        $privileges
    )) {
        header("location: ../View/admin-usuarios.php");
        echo '<p>Se logro hacer el registro correctamente</p>';
    } else {
        echo '<p>Error</p>';
    }
}

function getUsers()
{
    $usersList = getUsersDB();
    while ($item = mysqli_fetch_array($usersList)) {
        echo "<tr>";
        echo "<td>" . $item['id_persona'] . "</td>";
        echo "<td>" . $item['nombre'] . " " . $item['apellido1'] . " " . $item['apellido2'] . "</td>";
        echo "<td>" . $item['username'] . "</td>";
        echo "<td>" . $item['sexo'] . "</td>";
        echo "<td>" . $item['id_unidad'] . "-" . $item['nombre_unidad'] . "</td>";
        echo "<td>" . $item['estado_cuenta'] . "</td>";
        echo "<td>" . $item['id_privilegio'] . "-" . $item['nombre_privilegio'] . "</td>";
        echo "<td><button class='button' ><a href='Update-User.php?idper=" . $item['id_persona'] . "'>Editar o Eliminar</a>
            </button></td>";
        echo "</tr>";
    }
}

function getGender($gender)
{
    if ($gender == 'Masculino') {
        echo '
            <input checked type="radio" name="gender" id="gender" value="Masculino" required>
            <p>Masculino</p>
            <input type="radio" name="gender" id="gender" value="Femenino" required>
            <p>Femenino</p>
            ';
    } else {
        echo '
            <input type="radio" name="gender" id="gender" value="Masculino" required>
            <p>Masculino</p>
            <input checked type="radio" name="gender" id="gender" value="Femenino" required>
            <p>Femenino</p>
            ';
    }
}

function getAccStmt($accstmt)
{
    if ($accstmt == 'Activo') {
        echo '
            <input checked type="radio" name="accountStatement" id="accountStatement" value="Activo" required>
            <p>Activo</p>
            <input type="radio" name="accountStatement" id="accountStatement" value="Inactivo" required>
            <p>Inactivo</p>
            ';
    } else {
        echo '
            <input type="radio" name="accountStatement" id="accountStatement" value="Activo" required>
            <p>Activo</p>
            <input checked type="radio" name="accountStatement" id="accountStatement" value="Inactivo" required>
            <p>Inactivo</p>
            ';
    }
}

function getUser($id)
{
    $userInfo = getUserDB($id);
    $item = mysqli_fetch_array($userInfo);
    return $item;
}

function getRol($rol)
{
    $rolesList = getRolesDB();
    while ($item = mysqli_fetch_array($rolesList)) {
        if ($rol == $item['nombre_privilegio']) {
            echo "<option selected value=" . $item['id_privilegio'] . ">" . $item['id_privilegio'] . "- " . $item['nombre_privilegio'] . "</option>";
        } else {
            echo "<option value=" . $item['id_privilegio'] . ">" . $item['id_privilegio'] . "- " . $item['nombre_privilegio'] . "</option>";
        }
    }
}

function getRoles()
{
    $rolesList = getRolesDB();
    while ($item = mysqli_fetch_array($rolesList)) {
        echo "<option value=" . $item['id_privilegio'] . ">" . $item['id_privilegio'] . "- " . $item['nombre_privilegio'] . "</option>";
    }
}

function getUnidades()
{
    $rolesList = getUnidadesDB();
    while ($item = mysqli_fetch_array($rolesList)) {
        echo "<option value=" . $item['id_unidad'] . ">" . $item['id_unidad'] . "- " . $item['nombre_unidad'] . "</option>";
    }
}

function getUnidad($Unidad)
{
    $rolesList = getUnidadesDB();
    while ($item = mysqli_fetch_array($rolesList)) {
        if ($item['nombre_unidad'] == $Unidad) {
            echo "<option selected value=" . $item['id_unidad'] . ">" . $item['id_unidad'] . "- " . $item['nombre_unidad'] . "</option>";
        } else {
            echo "<option value=" . $item['id_unidad'] . ">" . $item['id_unidad'] . "- " . $item['nombre_unidad'] . "</option>";
        }
    }
}

if (!empty($_GET['dlt'])) {
    $id =  $_GET['dlt'];
    if (delete($id)) {
        header("location: ../View/admin-usuarios.php");
    } else {
        echo '<p>Error</p>';
    }
}



if (isset($_POST['update-btn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $firstSurname = $_POST['firstSurname'];
    $secondSurname = $_POST['secondSurname'];
    $gender = $_POST['gender'];
    $idUnidad = $_POST['idUnidad'];
    $accountStatement = $_POST['accountStatement'];
    $privileges = $_POST['privileges'];
    $username =  $_POST['username'];
    $password = $_POST['password'];
    if (updateDB(
        $id,
        $name,
        $firstSurname,
        $secondSurname,
        $username,
        $password,
        $gender,
        $idUnidad,
        $accountStatement,
        $privileges
    )) {
        header("location: ../View/admin-usuarios.php");
    } else {
        echo '<p>Error</p>';
    }
}
if (isset($_POST['updateUser-btn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $firstSurname = $_POST['firstSurname'];
    $secondSurname = $_POST['secondSurname'];
    $gender = $_POST['gender'];
    $username =  $_POST['username'];
    $password = $_POST['password'];
    if (updateUserDB(
        $id,
        $name,
        $firstSurname,
        $secondSurname,
        $username,
        $password,
        $gender
    )) {
        header("location: ../View/cliente-usuarios.php");
    } else {
        echo '<p>Error</p>';
    }
}


function getUsuario($Usuario)
{
    $user = getUsuarioModel($Usuario);
    while ($item = mysqli_fetch_array($user)) {
        echo "<tr>";
        echo "<td>" . $item['id_persona'] . "</td>";
        echo "<td>" . $item['nombre'] . " " . $item['apellido1'] . " " . $item['apellido2'] . "</td>";
        echo "<td>" . $item['username'] . "</td>";
        echo "<td>" . $item['sexo'] . "</td>";
        echo "<td>" . $item['id_unidad'] . "</td>";
        echo "<td>" . $item['estado_cuenta'] . "</td>";
        echo "<td><button class='button' ><a href='update-user-cliente.php?idper=" . $item['id_persona'] . "'>Editar</a>
            </button></td>";
        echo "</tr>";
    }
}


function role()
{
    if ($_SESSION['rol'] != 'Administrador') {
        header('location: ../View/cliente-dashboard.php');
    }
    
}
