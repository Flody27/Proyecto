<?php
    include "..\model\admin_model.php";

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