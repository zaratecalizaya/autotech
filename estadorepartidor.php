


<?php

require_once 'Controlador/RepartidorController.php';
    $cgrupo = new ControladorRepartidor();
    $resultado=  $cgrupo ->  ctrActualizarEstadoRepartidor($_POST['id']);
    
    echo $resultado;
?>