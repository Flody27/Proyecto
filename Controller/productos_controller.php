<?php

include "..\Model\productos_model.php";

function TablaInventario()
{
    $listaInventario = ConsultarInventario();

    while ($producto = mysqli_fetch_array($listaInventario)) {
        echo "<tr>";
        echo "<td>" . $producto["serie_producto"] . "</td>";
        echo "<td>" . $producto["placa_producto"] . "</td>";
        echo "<td>" . $producto["nombre_marca"] . "</td>";
        echo "<td>" . $producto["Modelo"] . "</td>";
        echo "<td>" . $producto["ide_nombre_cat"] . "</td>";
        echo "<td>" . $producto["id_partida"] . "</td>";
        echo "<td>" . $producto["desc_estado"] . "</td>";
        echo "<td><button class='button' ><a href='producto.php?q=" . $producto["serie_producto"] . "'><i class='bx bxs-pencil'></i></a></button></td>";        
        echo "</tr>";
    }
}

function ConsultarProducto($Serie_producto)
{
    $producto = ConsultarProductoModel($Serie_producto);
    $item = mysqli_fetch_array($producto);
    return $item;
}

function getEstado($Estado){
    $Estados = getEstadosProducto();
    while ($item = mysqli_fetch_array($Estados)) {
        if($item['desc_estado'] == $Estado){
            echo "<option selected value=" . $item['id_estado'] . ">" . $item['desc_estado'] . "</option>";

        }else{
            echo "<option selected value=" . $item['id_estado'] . ">" . $item['desc_estado'] . "</option>";
        }
    }
}

if (isset($_POST['btnCrearTicket'])) {
    $serie = $_POST["serie"];
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modeo"];
    $categoria = $_POST["id_categoria"]; 
    $partida = $_POST["id_partida"]; 

    if (RegistrarProductoModel($serie, $placa, $marca, $modelo, $categoria, $partida)
    ) {
        header("Location: ../View/admin-inventario.php");
        echo '<p>Se logro hacer el registro correctamente</p>';
    } else {
        echo '<p>Error</p>';
    }

    
    header("Location: ../View/admin-tickets.php");
}

if (isset($_POST['btnActualizar'])) {
    $serie = $_POST['Serie'];
    $estado = $_POST['Estado'];
    if (ActualizarEstadoProducto( $serie, $estado)) {
        header("location: ../View/admin-inventario.php");
    } else {
        echo '<p>Error</p>';
    }
}


function ConsultarPartidas()
{       
    $listaPartidas = ConsultarPartidasModel();
    while($item = mysqli_fetch_array($listaPartidas))
    {   
        echo "<option value=".$item["id_categoria"].$item["id_partida"] .">". $item["descripcion_partida"] . "</option>";
    }
}

?>