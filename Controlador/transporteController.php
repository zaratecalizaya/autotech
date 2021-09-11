<?php

require_once 'modelo/Funciones/transporteDAO.php';
require_once 'modelo/utilitario.php';

class ControladorTransporte{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroTransporte(){
      
        if(isset($_POST["id"])){
         
         $mutil = new Utils();
                   //   $mutil -> console_log('esta ingresando');
                      
                      
                      if(($_POST["id"])==0){
              
            
                
                 // $mutil -> console_log('esta ingresando');
                      $datos = array(
                        "marca"=>$_POST["marca"],
                        "placa"=>$_POST["placa"],
                        "tipo"=>$_POST["tipo"],
                        
                     
                       // "imagen"=>""
                        );
                    $tabla = "transporte";
                    $Transported = new TransporteDAO ();
                    $respuesta = $Transported -> addTransporte($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
  
  
  
                 // return "La subida de imagen ha fallado";
                
          
            }else{
             
                $datos = array("id"=>$_POST["id"],
                    "marca"=>$_POST["marca"],
                    "placa"=>$_POST["placa"],
                    "tipo"=>$_POST["tipo"],
                 
                 
                   // "imagen"=>""
                    );
            
                  $tabla = "transporte";
                  $Transported = new TransporteDAO();
                  $respuesta = $Transported -> updateTransporte($tabla,$datos);
            
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



      public function ctrListarTransporte($pagina,$cantidad){
      
            
       $tabla = "transporte";
       $Transported = new TransporteDAO();
        $respuesta = $Transported -> listTransporte($pagina,$cantidad);
    
        return $respuesta;
  
      }


      
      public function ctrActualizarEstadoTransporte($id){
      

        $tabla = "transporte";
        $datos = array("id"=>$id);
        $Transported = new TransporteDAO();
        $respuesta = $Transported -> updatestatustransporte($tabla,$datos);
        return $respuesta; 
        
      
    }



      

        
      
    }
      
    


    


?>