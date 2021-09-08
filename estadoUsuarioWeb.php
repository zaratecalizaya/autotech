<?php

    require_once 'Controlador/usuarioController.php';
    $cusuario = new ControladorUsuario();
    $resultado=  $cusuario -> ctrActualizarEstadoUsuario($_POST['id'],$_POST['usuario']);
    
    echo $resultado;
?>