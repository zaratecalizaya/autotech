<?php

require_once 'modelo/Funciones/usuariotodoDAO.php';
require_once 'modelo/utilitario.php';

class ControladorUsuariotodo{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroUsuariotodo(){
      
        if(isset($_POST["id"])){
         
         $mutil = new Utils();
                   //   $mutil -> console_log('esta ingresando');
                      
                      
                      if(($_POST["id"])==0){
              
            
                
                 // $mutil -> console_log('esta ingresando');
                      $datos = array(
                        "nombre"=>$_POST["nombre"],
                        "contraseña"=>$_POST["contraseña"],
                      
                        
                     
                       // "imagen"=>""
                        );
                    $tabla = "usuariotodo";
                    $Transported = new UsuariotodoDAO ();
                    $respuesta = $Transported -> addUsuariotodo($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
  
  
  
                 // return "La subida de imagen ha fallado";
                
          
            }else{
             
                $datos = array("id"=>$_POST["id"],
                    "nombre"=>$_POST["nombre"],
                    "contraseña"=>$_POST["contraseña"],
                   
                 
                 
                   // "imagen"=>""
                    );
            
                  $tabla = "usuariotodo";
                  $Usuariotodod = new UsuariotodoDAO();
                  $respuesta = $Usuariotodod -> updateUsuariotodo($tabla,$datos);
            
                  //return $respuesta;
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }
                       
              
            }
          
        }else{
          return "";
        }
        
     }



      public function ctrListarUsuariotodo($pagina,$cantidad){
      
            
       $tabla = "usuariotodo";
       $Usuariotodod = new UsuariotodoDAO();
        $respuesta = $Usuariotodod -> listUsuariotodo($pagina,$cantidad);
    
        return $respuesta;
  
      }





      

        
      
    }
      
    


    


?>