


<?php

require_once 'Controlador/pedidoController.php';
    $cgrupo = new ControladorPedido();
    $resultado=  $cgrupo ->ctrActualizarEstadoPedido($_POST['id']);
    
    echo $resultado;
?>