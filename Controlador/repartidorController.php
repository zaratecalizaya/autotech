<?php

require_once 'modelo/Funciones/repartidorDAO.php';
require_once 'modelo/utilitario.php';

class ControladorRepartidor{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
      ///aqui


     public function ctrRegistroRepartidor(){
      
         if(isset($_POST["id"])){
       
                   $mutil = new Utils();
             //      $mutil -> console_log('esta ingresando');
                    
                    
                    if(($_POST["id"])==0){
                   // $mutil -> console_log('esta ingresando');
                        $datos = array(
                         "nombre"=>$_POST["nombre"],
                         "paterno"=>$_POST["paterno"],
                         "materno"=>$_POST["materno"],
                         "telefono"=>$_POST["telefono"],
                         "licencia"=>$_POST["licencia"],
                        
                       
                       
                         );
          
                   $tabla = "repartidor";
                   $Repartidord = new repartidorDAO();
                   $respuesta = $Repartidord -> addRepartidor($tabla,$datos);
                   // return $respuesta;  
                   if ($respuesta==true){
                     return "true";
                    }else{
                      return $respuesta;  
                     }



                        
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
               
                "nombre"=>$_POST["nombre"],
                "paterno"=>$_POST["paterno"],
                "materno"=>$_POST["materno"],
                "telefono"=>$_POST["telefono"],
                "licencia"=>$_POST["licencia"],
              
                  
            
            );
          
                $tabla = "repartidor";
                $Repartidord = new repartidorDAO();
                $respuesta = $Repartidord -> updateRepartidor($tabla,$datos);
          
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
  



      public function ctrListarRepartidor($pagina,$cantidad){
           
       $tabla = "repartidor";
       $Repartidord = new repartidorDAO();
        $respuesta = $Repartidord->listRepartidor($pagina,$cantidad);
    
        return $respuesta;
  
      }


      public function ctrActualizarEstadoRepartidor($id){
      

        $tabla = "repartidor";
        $datos = array("id"=>$id);
        $Vehiculod = new repartidorDAO();
        $respuesta = $Vehiculod -> updatestatusrepartidor($tabla,$datos);
        return $respuesta; 
        
      
    }

    public function listarrepartidorselect(){
      $Transported = new repartidorDAO();
      $respuesta = $Transported -> listarrepartidorselect();
      return $respuesta;
    }





    
}

?>