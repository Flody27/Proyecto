<?php
    function conectarDB(){
        $hostname = 'localhost:3306';
        $user ='root';
        $password = '';
        $database = 'principal';
        return mysqli_connect($hostname,$user,$password,$database);
    }

    function desconectarDB($database){
        return mysqli_close($database);
    }
?>