<?php

require_once 'modelo/utilitario.php';
      

  require_once 'modelo/Funciones/UsuarioDAO.php';
class ControladorUsuario{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
     public function ctrRegistroUsuario(){
      
        if(isset($_POST["id"])){
          if(($_POST["clave"])==($_POST["clave2"])){
          if(($_POST["id"])==0){
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
              
            
               $datos = array("nombre"=>$_POST["nombre"],
                              "paterno"=>$_POST["paterno"],
                              "materno"=>$_POST["materno"],
                              "rol"=>$_POST["rol"],
                              "usuario"=>$_POST["usuario"],
                              "clave"=>$_POST["clave"]);
            
              $tabla = "empleado";
              $Usuariod = new UsuarioDAO();
              $respuesta = $Usuariod -> adduserWeb($tabla,$datos);
            
            //return $respuesta;
                
            if ($respuesta==true){
              return "true";
            }else{
              return $respuesta;  
            }
          

            
            }else{
            
              return "false2";
            }
          
          }else{



            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
             //$subir_archivo = 'fotoperfil/'.basename($_FILES['subir_archivo']['name']);
             // if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
            $datos = array("id"=>$_POST["id"],
              "nombre"=>$_POST["nombre"],
            "paterno"=>$_POST["paterno"],
            "materno"=>$_POST["materno"],
            "rol"=>$_POST["rol"],
            "usuario"=>$_POST["usuario"],
            "clave"=>$_POST["clave"]);
            
            $tabla = "empleado";
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> updateuserWeb($tabla,$datos);
            
            //return $respuesta;
            if ($respuesta==true){
              return "true";
            }else{
              return $respuesta;  
            }
        //  }
            
            }else{
            
              return "false2";
            }
            
            }
          }else{
              return "Las contraseñas no coinciden";
          }
        }else{
          return "false";
        }
        
    }



     public function ctrloginUserWeb(){
      
        require_once 'modelo/utilitario.php';
                $mutil = new Utils();
                $mutil -> console_log('entro login');
      if(isset($_POST["usuario"])){
        $mutil -> console_log('entro post login');
        $datos = array("usuario"=>$_POST["usuario"],
                       "clave"=>$_POST["clave"]);
        
        
        $Usuariod = new UsuarioDAO();
        $respuesta = $Usuariod -> loginUserWeb($datos);
        
        //return $respuesta;
        if (is_null( $respuesta)){
          $mutil -> console_log('null respuesta');
          return "0|Error de conexión al servidor";
        }else{
          $mutil -> console_log('respuesta no null');
          return $respuesta;  
        }
        
      
    }else{
      return "-1|";
    }                 
      
}
      

      


    
    public function ctrListarUsuarioTabla($pagina,$cantidad){
      
            

      $Serviced = new UsuarioDAO ();
       $respuesta = $Serviced -> listusuarioWeb($pagina,$cantidad);
   
       return $respuesta;
 
     }
      
    public function ctrListarRolSelect(){
      
            

      $Serviced = new UsuarioDAO ();
       $respuesta = $Serviced -> listusuarioSelect();
   
       return $respuesta;
 
     }

     public function ctrActualizarEstadoUsuario($id,$usuario){
      
            
      $tabla = "empleado";
      $datos = array("id"=>$id,
                     "usuario"=>$usuario);
      $Usuariod = new UsuarioDAO();
      $respuesta = $Usuariod -> updatestatususer($tabla,$datos);
      
      return $respuesta;
      
    
}

  
    
}

?>