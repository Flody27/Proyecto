<?php

include_once 'conexionDB.php';

function ConsultarInventario(){
    $instancia = conectarDB();

    $listaInventario = $instancia -> query ("CALL ConsultarInventario();");

    desconectarDB($instancia);

    return $listaInventario;
}

function ConsultarProductoModel($Serie_producto)
{    
    $instancia = conectarDB();
    $producto = $instancia -> query("CALL Consultar_Estado_Producto('$Serie_producto');");
    desconectarDB($instancia);
    return $producto;
}

function getEstadosProducto(){    
    $instancia = conectarDB();
    $Estados = $instancia -> query("CALL ConsultarEstados();");
    desconectarDB($instancia);
    return $Estados;
}

function RegistrarProductoModel($serie, $placa, $marca, $modelo, $categoria, $partida)
{    
    $instancia = conectarDB();
    $instancia -> query("CALL RegistrarProducto('$serie', '$placa', $marca, '$modelo', $categoria, '$partida', 'Disponible');");
    desconectarDB($instancia);
}

function ActualizarEstadoProducto($serie, $estado){
    $db = conectarDB();
    $query = $db->query(" CALL `ActualizarEstadoProducto`('$serie', $estado);");
    desconectarDB($db);
    if($query){
        return true;
    }else{
        echo mysqli_error($db);
        return false; 
    }
}

function ConsultarPartidasModel()
{    
    $instancia = conectarDB();
    $listaPartidas = $instancia -> query("CALL Consultar_Partidas();");
    desconectarDB($instancia);
    return $listaPartidas;
}

?>