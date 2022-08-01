<?php
include_once 'conexionDB.php';
    function singup($name,$firstSurname,$secondSurname,$username,$password,$gender,
    $idUnidad,$accountStatement,$privileges){
        $db = conectarDB();
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $db->query("CALL `singup`('$name','$firstSurname','$secondSurname','$username','$password_hash','$gender',
        $idUnidad,'$accountStatement',$privileges);");
        desconectarDB($db);
        if($query){
            return true;
        }else{
            echo mysqli_error($db);
            return false;
        }
    }
    
    function getUsersDB(){
        $db = conectarDB();
        $users = $db->query("CALL `getUsers`();");
        desconectarDB($db);
        return $users;
    }

    function getUserDB($id){
        $db = conectarDB();
        $user = $db->query("CALL `getUser`('$id');");
        desconectarDB($db);
        return $user;
    }
    
    function getRolesDB(){
        $db = conectarDB();
        $roles =  $db->query("CALL `getRoles`();");
        desconectarDB($db);
        return $roles;
    }

    function getUnidadesDB(){
        $db = conectarDB();
        $unidades =  $db->query("CALL `getUnidades`();");
        desconectarDB($db);
        return $unidades;
    }

    function delete($id){
        $db = conectarDB();
        $query=$db->query("DELETE FROM `user` WHERE id_persona = '$id'");
        desconectarDB($db);
        if($query){
            return true;
        }else{
            echo mysqli_error($db);
            return false; 
        }
    }

    function updateDB($id,$name,$firstSurname,$secondSurname,$username,$password,$gender,
    $idUnidad,$accountStatement,$privileges){
        $db = conectarDB();
        $query = $db->query(" CALL `updateUser`($id,'$name','$firstSurname','$secondSurname','$username','$password','$gender',
        $idUnidad,'$accountStatement',$privileges);");
        desconectarDB($db);
        if($query){
            return true;
        }else{
            echo mysqli_error($db);
            return false; 
        }
    }
