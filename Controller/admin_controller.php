<?php
    include "..\model\admin_model.php";

/**FUNCIONES PARA TABLAS */
function LlenadoTabla(){
    $listaUnidades = ConsultarUnidades();

    while($unidad = mysqli_fetch_array($listaUnidades)){
        echo "<tr>";
            echo "<td>" . $unidad["id_unidad"] . "</td>";
            echo "<td>" . $unidad["nombre_unidad"] . "</td>";
            echo "<td>" . $unidad["id_region"] . "</td>";
            echo '<td><input type="button" value="Prueba" id="boton_prueba" onclick="#"></td>';
        echo "</tr>";            
    }
}

function TablaInventario(){
    $listaInventario = ConsultarInventario();

    while($producto = mysqli_fetch_array($listaInventario)){
        echo "<tr>";
            echo "<td>" . $producto["serie_producto"] . "</td>";
            echo "<td>" . $producto["placa_producto"] . "</td>";
            echo "<td>" . $producto["id_marca"] . "</td>";
            echo "<td>" . $producto["Modelo"] . "</td>";
            echo "<td>" . $producto["id_cat_prod"] . "</td>";
            echo "<td>" . $producto["id_partida"] . "</td>";
            echo "<td>" . $producto["id_estado_producto"] . "</td>";
            echo '<td><input type="button" value="Prueba" id="boton_prueba" onclick="#"></td>';
        echo "</tr>";            
    }
}

function TablaTickets(){
    $listaTickets = ConsultarTickets();

    while($ticket = mysqli_fetch_array($listaTickets)){
        echo "<tr>";
            echo "<td>" . $ticket["No_Ticket"] . "</td>";
            echo "<td>" . $ticket["fecha_apertura"] . "</td>";
            echo "<td>" . $ticket["id_user_solicitante"] . "</td>";
            echo "<td>" . $ticket["estado_ticket"] . "</td>";
            echo '<td><input type="button" value="Ver" class="abrir_modal" id="boton_prueba" onclick="#"></td>';
        echo "</tr>";            
    }
}




/** FUNCIONES PARA TARJETAS RESUMEN DE INVENTARIO */

function CantPortatilesDisponibles(){
    $resultado = ConteoPortatilesDispo();

    $cant =mysqli_fetch_assoc($resultado);
        echo $cant["total"];       
}

function CantWorkstationDisponibles(){
    $resultado = ConteoWorkstationDispo();

    $cant =mysqli_fetch_assoc($resultado);
        echo $cant["total"];       
}

function CantDesktopDisponibles(){
    $resultado = ConteoDesktopDispo();

    $cant =mysqli_fetch_assoc($resultado);
        echo $cant["total"];       
}

function CantScannerDisponibles(){
    $resultado = ConteoScannerDispo();

    $cant =mysqli_fetch_assoc($resultado);
        echo $cant["total"];       
}

function CantImpresoraDisponibles(){
    $resultado = ConteoImpresoraDispo();

    $cant =mysqli_fetch_assoc($resultado);
        echo $cant["total"];       
}

function CantServerDisponibles(){
    $resultado = ConteoServerDispo();

    $cant =mysqli_fetch_assoc($resultado);
        echo $cant["total"];       
}