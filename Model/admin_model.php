<?php

include_once 'conexionDB.php';

    function ConsultarUnidades(){
        $instancia = conectarDB();

        $listaUnidades = $instancia -> query ("CALL ConsultarUnidades();");

        desconectarDB($instancia);

        return $listaUnidades;
    }
    function ConsultarTickets(){
        $instancia = conectarDB();
        $listaTickets = $instancia -> query ("CALL ConsultarTickets();");
        desconectarDB($instancia);
        return $listaTickets;
    }


    function ConsultarInventario(){
        $instancia = conectarDB();

        $listaInventario = $instancia -> query ("CALL ConsultarInventario();");

        desconectarDB($instancia);

        return $listaInventario;
    }


/** FUNCIONES PARA CONTEO DE RESUMEN INVENTARIO */
    function ConteoPortatilesDispo(){
        $instancia = conectarDB();

        $cantPortatilesDispo = $instancia -> query ("CALL conteo_portatiles();");

        desconectarDB($instancia);

        return $cantPortatilesDispo;
    }

    function ConteoWorkstationDispo(){
        $instancia = conectarDB();

        $cantWorkstationDispo = $instancia -> query ("CALL conteo_workstation();");

        desconectarDB($instancia);

        return $cantWorkstationDispo;
    }    
    
    function ConteoDesktopDispo(){
        $instancia = conectarDB();

        $cantDesktopDispo = $instancia -> query ("CALL conteo_desktop();");

        desconectarDB($instancia);

        return $cantDesktopDispo;
    }    

    function ConteoScannerDispo(){
        $instancia = conectarDB();

        $cantScannerDispo = $instancia -> query ("CALL conteo_scanner();");

        desconectarDB($instancia);

        return $cantScannerDispo;
    }    

    function ConteoImpresoraDispo(){
        $instancia = conectarDB();

        $cantImpresoraDispo = $instancia -> query ("CALL conteo_impresora();");

        desconectarDB($instancia);

        return $cantImpresoraDispo;
    }    

    function ConteoServerDispo(){
        $instancia = conectarDB();

        $cantServerDispo = $instancia -> query ("CALL conteo_servidores();");

        desconectarDB($instancia);

        return $cantServerDispo;
    }    
?>