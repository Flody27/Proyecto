<?php
include_once 'conexionDB.php';
function login($username, $password)
{
    $db = conectarDB();
    $query = $db->query(" CALL `login`('$username')");
    $result = $query->fetch_assoc();
    if ($result['username'] == $username) {
        if ($result['estado_cuenta'] == "Activo") {
            if (password_verify($password, $result['password'])) {
                session_start();
                $_SESSION['username'] = $result['username'];
                $_SESSION['rol'] = $result['nombre_privilegio'];
                $_SESSION['id'] = $result['id_persona'];
                return true;
            } 
            else {
                echo '<p class=""> Contraseña y usuario incorrectas </p>';
                echo mysqli_error($db);
                return false;
            }
        }
        else {
            echo "<p>Su cuenta no esta activa</p>";
            return false;
        }
    } else {
        echo mysqli_error($db);
        return false;
    }
    desconectarDB($db);
}

function chagePassword($username, $password)
{
    $db = conectarDB();
    $query = $db->query(" CALL `changePassword`('$username','$password');");
    if ($query) {
        return true;
    } else {
        echo mysqli_error($db);
        return false;
    }
    desconectarDB($db);
}
