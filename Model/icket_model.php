<?php

include_once "conexionDB.php";

    function ConsultarTicketModel($No_ticket)
        {    
            $instancia = conectarDB();
            $ticket = $instancia -> query("CALL Consultar_Ticket($No_ticket);");
            desconectarDB($instancia);
            return $ticket;
        }

        function ConsultarDetalleTicket($No_ticket){
            $instancia = conectarDB();

            $listaDetalles = $instancia -> query ("CALL Consultar_Detalle_Ticket($No_ticket);");

            desconectarDB($instancia);

            return $listaDetalles;
        }

        function Consultar_Comentarios_Ticket($No_ticket){
            $instancia = conectarDB();

            $listaComentarios = $instancia -> query ("CALL Consultar_Comentarios_Ticket($No_ticket);");

            desconectarDB($instancia);

            return $listaComentarios;
        }

    function RegistrarTicketModel($id_solicitante, $nro_ticket, $partida_solicitada, $cantidad_solicitada)
        {    
            $instancia = conectarDB();
            $instancia -> query("CALL RegistroTicketAdmin('$id_solicitante', $nro_ticket, '$partida_solicitada', $cantidad_solicitada);");
            desconectarDB($instancia);
        }


    function ActualizarTicketModel($No_ticket, $solicitante, $estado)
        {    
            $instancia = conectarDB();
            $instancia -> query("CALL ActualizarTicket($No_ticket,'$solicitante', '$estado');");
            desconectarDB($instancia);
        }    

    function ConsultarNumeroTicketNvoModel()
    {    
        $instancia = conectarDB();
        $numero = $instancia -> query("CALL nro_nvo_ticket();");
        desconectarDB($instancia);
        return $numero;
    }

    function ConsultarPartidasModel()
    {    
        $instancia = conectarDB();
        $listaPartidas = $instancia -> query("CALL Consultar_Partidas();");
        desconectarDB($instancia);
        return $listaPartidas;
    }
    function ConsultarTicketUModel($Usuario)
    {    
        $instancia = conectarDB();
        $listaTicketUsuario = $instancia -> query("CALL ConsultarTicketU('$Usuario');");
        desconectarDB($instancia);
        return $listaTicketUsuario;
    }

    function ConsultarSolicitanteModel($Usuario)
    {    
        $instancia = conectarDB();
        $listaUsuario = $instancia -> query("CALL ConsultarSolicitante('$Usuario');");
        desconectarDB($instancia);
        return $listaUsuario;
    }

?>
