<?php
include '../Model/Singup-Model.php';
    if(isset($_POST['sing-up-btn'])){
        $name= $_POST['name'];
        $firstSurname = $_POST['firstSurname'];
        $secondSurname = $_POST['secondSurname'];
        $gender = $_POST['gender'];
        $idUnidad = $_POST['idUnidad'];
        $accountStatement = $_POST['accountStatement'];
        $privileges = $_POST['privileges'];  
        $username =  $_POST['username'];
        $password = $_POST['password'];
        if(singup($name,$firstSurname,$secondSurname,$gender,
        $idUnidad,$accountStatement,$privileges,$username,$password)){
            echo '<p>Se logro hacer el registro correctamente</p>';
        }else{
            echo '<p>Error</p>';
        }
       
    }

?>