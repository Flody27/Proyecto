<?php
include_once "../Controller/Login-Controller.php"; 
include_once "../Controller/Usuario-Controller.php";   
  
    function navbar(){
        session_start();
        ValidarSesion();
        echo '
        <nav>
            <div class="welcome">
                <h1> '. $_SESSION['username'] .'</h1>
                <h3>Rol: '.$_SESSION['rol'].'</h3>
            </div>
            <div class="profile-details">
                <span class="admin_name">Ajustes</span>
                <i class="bx bx-chevrons-down"></i>
            </div>
        </nav>
        ';
    }
