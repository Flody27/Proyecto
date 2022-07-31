<?php

    include "ConexionBD.php";

    function ConsultarUnidades(){
        $instancia = AbrirBD();

        $listaUnidades = $instancia -> query ("CALL ConsultarUnidades();");

        CerrarBD($instancia);

        return $listaUnidades;
    }
    function ConsultarTickets(){
        $instancia = AbrirBD();
        $listaTickets = $instancia -> query ("CALL ConsultarTickets();");
        CerrarBD($instancia);
        return $listaTickets;
    }


    function ConsultarInventario(){
        $instancia = AbrirBD();

        $listaInventario = $instancia -> query ("CALL ConsultarInventario();");

        CerrarBD($instancia);

        return $listaInventario;
    }


/** FUNCIONES PARA CONTEO DE RESUMEN INVENTARIO */
    function ConteoPortatilesDispo(){
        $instancia = AbrirBD();

        $cantPortatilesDispo = $instancia -> query ("CALL conteo_portatiles();");

        CerrarBD($instancia);

        return $cantPortatilesDispo;
    }

    function ConteoWorkstationDispo(){
        $instancia = AbrirBD();

        $cantWorkstationDispo = $instancia -> query ("CALL conteo_workstation();");

        CerrarBD($instancia);

        return $cantWorkstationDispo;
    }    
    
    function ConteoDesktopDispo(){
        $instancia = AbrirBD();

        $cantDesktopDispo = $instancia -> query ("CALL conteo_desktop();");

        CerrarBD($instancia);

        return $cantDesktopDispo;
    }    

    function ConteoScannerDispo(){
        $instancia = AbrirBD();

        $cantScannerDispo = $instancia -> query ("CALL conteo_scanner();");

        CerrarBD($instancia);

        return $cantScannerDispo;
    }    

    function ConteoImpresoraDispo(){
        $instancia = AbrirBD();

        $cantImpresoraDispo = $instancia -> query ("CALL conteo_impresora();");

        CerrarBD($instancia);

        return $cantImpresoraDispo;
    }    

    function ConteoServerDispo(){
        $instancia = AbrirBD();

        $cantServerDispo = $instancia -> query ("CALL conteo_servidores();");

        CerrarBD($instancia);

        return $cantServerDispo;
    }    
?>