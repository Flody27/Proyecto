<?php
    function conectarDB(){
        $hostname = 'localhost:3306';
        $user ='root';
        $password = '';
        $database = 'proyecto';
        return mysqli_connect($hostname,$user,$password,$database);
    }

    function desconectarDB($database){
        return mysqli_close($database);
    }
?>