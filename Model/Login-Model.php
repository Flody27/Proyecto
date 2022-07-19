<?php
include_once 'conexionDB.php';
    function login($username,$password){
        $db = conectarDB();
        $query = $db->query(" CALL `login`('$username')");
        $result = $query->fetch_assoc();
        if($result){
            if(password_verify($password,$result['password'])){
                return true;
            }
            else{
                echo $result['password'],' ',$password;
                echo 'Contra erronea';
                echo mysqli_error($db);
                return false;
            }
        }
        else{
            echo mysqli_error($db);
            return false;
        }
        desconectarDB($db);
    }
