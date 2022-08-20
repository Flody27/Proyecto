<?php
include_once "..\Model\icket_model.php";

function ConsultarTicket($no_ticket)
{
    $ticket = ConsultarTicketModel($no_ticket);
    $item = mysqli_fetch_array($ticket);
    return $item;
}


if (isset($_POST['btnCrearTicket'])) {
    $id_solicitante = $_POST["solicitante"];
    $nro_ticket = $_POST["no_ticket"];
    $partida_solicitada = $_POST["txtPartida"];
    $cantidad_solicitada = $_POST["cant_prod"];

    if (RegistrarTicketModel($id_solicitante, $nro_ticket, $partida_solicitada, $cantidad_solicitada)
    ) {
        header("Location: ../View/admin-tickets.php");
        echo '<p>Se logro hacer el registro correctamente</p>';
    } else {
        echo '<p>Error</p>';
    }

    
    header("Location: ../View/admin-tickets.php");
}


if (isset($_POST['btnActualizar'])) {
    $ticket = $_POST["ticket"];
    $solicitante = $_POST["solicitante"];
    $estado = $_POST["estado_ticket"];

    ActualizarTicketModel($ticket, $solicitante, $estado);
    header("Location: ../View/admin-dashboard.php");
}

function TablaDetalleTicket($No_ticket)
{
    $listaDetalles = ConsultarDetalleTicket($No_ticket);

    while ($detalle = mysqli_fetch_array($listaDetalles)) {
        echo "<tr>";
        echo "<td>" . $detalle["partida_producto"] . "</td>";
        echo "<td>" . $detalle["descripcion_partida"] . "</td>";
        echo "<td>" . $detalle["cantidad"] . "</td>";
        echo "</tr>";
    }
}

function TablaComentariosTicket($No_ticket)
{
    $listaComentarios = Consultar_Comentarios_Ticket($No_ticket);

    while ($detalle = mysqli_fetch_array($listaComentarios)) {
        echo "<tr>";
        echo "<td>" . $detalle["fecha_comentario"] . "</td>";
        echo "<td>" . $detalle["username"] . "</td>";
        echo "<td>" . $detalle["comentario"] . "</td>";
        echo "</tr>";
    }
}

    function Nvo_Nro_Ticket()
    {
        $nro_ticket = ConsultarNumeroTicketNvoModel();
        $item = mysqli_fetch_array($nro_ticket);
        echo '' . $item['id'] . '';
    }

    function ConsultarPartidas()
    {       
        $listaPartidas = ConsultarPartidasModel();
        while($item = mysqli_fetch_array($listaPartidas))
        {   
            echo "<option value=". $item["id_partida"] ."-" . $item["descripcion_partida"] . "</option>";
        }
    } 

    function ConsultarTicketU($Usuario)
{
    $listaTicketUsuario = ConsultarTicketUModel($Usuario);

    while ($item = mysqli_fetch_array($listaTicketUsuario)) {

            echo "<tr>";
            echo "<td>" . $item["No_Ticket"] . "</td>";
            echo "<td>" . $item["fecha_apertura"] . "</td>";
            echo "<td>" . $item["id_user_solicitante"] . "</td>";
            echo "<td>" . $item["estado_ticket"] . "</td>";
            echo "</tr>";
        
        
    }
}

function ConsultarSolicitante($Usuario)
{       
    $listaUsuario = ConsultarSolicitanteModel($Usuario);
    while($item = mysqli_fetch_array($listaUsuario))
    {   
        echo "<option value=". $item["id_persona"] ."-" . $item["nombre"] . "</option>";
    }
} 
?>