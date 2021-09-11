


<?php

require_once 'Controlador/transporteController.php';
    $cgrupo = new ControladorTransporte();
    $resultado=  $cgrupo ->ctrActualizarEstadoTransporte($_POST['id']);
    
    echo $resultado;
?>