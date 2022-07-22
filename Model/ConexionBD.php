<?php 

    function AbrirBD(){
        $server = "localhost:3306";
        $user = "root";
        $password = "";
        $database = "proyecto";

        return mysqli_connect($server, $user, $password, $database);
    }
    
    function CerrarBD($instancia){
        mysqli_close($instancia);
    }
?>