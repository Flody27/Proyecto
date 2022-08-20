<?php
include_once "../Controller/Login-Controller.php";   
  
    function navbar(){
        //session_start();
        //ValidarSesion();
        echo '
        <nav>
            <div class="welcome">
               
            </div>
            <div class="profile-details">
                <span class="admin_name">Ajustes</span>
                <i class="bx bx-chevrons-down"></i>
            </div>
        </nav>
        ';
    }

?>
