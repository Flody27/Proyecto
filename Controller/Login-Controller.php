<?php
include '../Model/Login-Model.php'; 
    if(isset($_POST['login-btn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(login($username,$password)){
            $_SESSION['username'] = $username;
            header('Location: ../View/admin-dashboard.php');
        }else{
            echo "<p>Error inicio sesion</p>";
        }
    }

    if(isset($_POST['logout-btn'])){
        session_start();
        session_destroy();
        header('location: ../View/login.php');
    }

    function ValidarSesion()
    {       
        if($_SESSION['rol'] == null)
        {
            session_destroy();
            header("Location: ../View/login.php");
        }
    }

    if(isset($_POST['change'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        if(chagePassword($username,$password_hash)){
            header("Location: ../View/login.php");
        }

    }

?>