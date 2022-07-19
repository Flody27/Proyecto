<?php
include '../Model/Login-Model.php'; 
    if(isset($_POST['login-btn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(login($username,$password)){
            session_start();
            $_SESSION['username'] = $username;
            header('Location: ../View/login.php');
        }else{
            echo '<p class=""> Contraseña y usuario incorrectas </p>';
        }

    }

    if(isset($_POST['logout-btn'])){
        session_start();
        session_destroy();
        header('location: ../View/login.php');
    }

?>