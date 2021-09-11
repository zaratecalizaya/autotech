


<?php

require_once 'Controlador/carritoController.php';
    $cgrupo = new ControladorCarrito();
    $resultado=  $cgrupo ->ctrActualizarEstadoCarrito($_POST['id']);
    
    echo $resultado;
?>