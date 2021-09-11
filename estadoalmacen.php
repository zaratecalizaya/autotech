


<?php

require_once 'Controlador/almacenController.php';
    $cgrupo = new ControladorAlmacen();
    $resultado=  $cgrupo ->ctrActualizarEstadoAlmacen($_POST['id']);
    
    echo $resultado;
?>