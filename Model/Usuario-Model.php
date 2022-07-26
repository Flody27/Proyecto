<?php
include_once 'conexionDB.php';
    function singup($name,$firstSurname,$secondSurname,$username,$password,$gender,
    $idUnidad,$accountStatement,$privileges){
        $db = conectarDB();
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $db->query("CALL `singup`('$name','$firstSurname','$secondSurname','$username','$password_hash','$gender',
        $idUnidad,'$accountStatement',$privileges);");
        if($query){
            return true;
        }else{
            echo mysqli_error($db);
            return false;
        }
        desconectarDB($db);
    }
    

    function getUsersDB(){
        $db = conectarDB();
        $users = $db->query("CALL `getUsers`();");
        desconectarDB($db);
        return $users;
    }
    
    function getRolesDB(){
        $db = conectarDB();
        $roles =  $db->query("CALL `getRoles`();");
        desconectarDB($db);
        return $roles;
    }

    function getUnidadesDB(){
        $db = conectarDB();
        $unidades =  $db->query("SELECT * FROM UNIDAD");
        desconectarDB($db);
        return $unidades;
    }

?>