<?php
$html = '';

  require_once 'modelo/Funciones/UsuarioDAO.php';
  require_once 'modelo/utilitario.php';
  
  $id_category = $_POST['id_category'];
  $mutil = new Utils();
  $mutil -> console_log('llego sector: '.$id_category);
  /*
  $Usuariod = new UsuarioDAO();
  $respuesta = $Usuariod -> listSubSectores($id_category);
  
  while (count($respuesta)>0){
    $User = array_shift($respuesta);
    $Did = array_shift($User);
    $Dnombres = array_shift($User);
    $html .= '<option value="'.$Did.'">'.$Dnombres.'</option>';
  }*/
  $html .= '<option value="1">Salio id '.$id_category.'</option>';
  echo $html;
?>