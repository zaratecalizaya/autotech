


<?php

require_once 'Controlador/vehiculoController.php';
    $cgrupo = new ControladorVehiculo();
    $resultado=  $cgrupo ->ctrActualizarEstadoVehiculo($_POST['id']);
    
    echo $resultado;
?>