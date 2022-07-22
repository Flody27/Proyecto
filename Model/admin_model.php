<?php

    include "ConexionBD.php";

    function ConsultarUnidades(){
        $instancia = AbrirBD();

        $listaUnidades = $instancia -> query ("CALL ConsultarUnidades();");

        CerrarBD($instancia);

        return $listaUnidades;
    }
?>