<?php
include_once 'conexionDB.php';
    function singup($name,$firstSurname,$secondSurname,$username,$password,$gender,
    $idUnidad,$accountStatement,$privileges){
        $db = conectarDB();
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $db->query("CALL `singup`('$name','$firstSurname','$secondSurname','$username','$password_hash','$gender',
        '$idUnidad','$accountStatement','$privileges');");
        if($query){
            return true;
        }else{
            echo mysqli_error($db);
            return false;
        }
        desconectarDB($db);
    }

?>