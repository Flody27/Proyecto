<?php
include '../Model/Usuario-Model.php';
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
        if(singup($name,$firstSurname,$secondSurname,$username,$password,$gender,
        $idUnidad,$accountStatement,$privileges)){
            header("location: ..Viw/Admin-usuarios-php");
            echo '<p>Se logro hacer el registro correctamente</p>';

        }else{
            echo '<p>Error</p>';
        }
       
    }

    function getUsers(){
        $usersList = getUsersDB();
        while($item = mysqli_fetch_array($usersList)){
            echo "<tr>";
            echo"<td>".$item['id_persona']."</td>";
            echo"<td>".$item['nombre']."</td>";
            echo"<td>".$item['apellido1']."</td>";
            echo"<td>".$item['apellido2']."</td>";
            echo"<td>".$item['username']."</td>";
            echo"<td>".$item['sexo']."</td>";
            echo"<td>".$item['id_unidad']."-".$item['nombre_unidad']."</td>";
            echo"<td>".$item['estado_cuenta']."</td>";
            echo"<td>".$item['id_privilegio']."-".$item['nombre_privilegio']."</td>";
            echo "<tr>";
        }
    }

    function getRoles(){
        $rolesList = getRolesDB();
        while($item = mysqli_fetch_array($rolesList)){
            echo"<option value=".$item['id_privilegio'].">".$item['id_privilegio']."- ".$item['nombre_privilegio']."</option>";
        }
    }

    function getUnidades(){
        $rolesList = getUnidadesDB();
        while($item = mysqli_fetch_array($rolesList)){
            echo"<option value=".$item['id_unidad'].">".$item['id_unidad']."- ".$item['nombre_unidad']."</option>";
        }
    }

?>