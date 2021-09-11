<?php

require_once 'modelo/Funciones/rolDAO.php';
require_once 'modelo/utilitario.php';

class ControladorRol{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroRol(){
      
        if(isset($_POST["id"])){
         
         $mutil = new Utils();
                   //   $mutil -> console_log('esta ingresando');
                      
                      
                      if(($_POST["id"])==0){
              
            
                
                 // $mutil -> console_log('esta ingresando');
                     
             // $subir_archivo = 'imagenes/'.basename($_FILES['subir_archivo']['name']);
            //  if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
               // $mutil -> console_log('esta ingresando');
                  $datos = array(
                        "nombre"=>$_POST["nombre"],
                        
                       //  "imagen"=>$subir_archivo
                         );
          
                    $tabla = "rol";
                    $Rold = new rolDAO ();
                    $respuesta = $Rold -> addRol($tabla,$datos);
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
                   
                   // "imagen"=>""
                 
                 
                   
                   );
            
                  $tabla = "rol";
                  $Rold = new rolDAO();
                  $respuesta = $Rold -> updateRol($tabla,$datos);
            
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



      public function ctrListarRol($pagina,$cantidad){
      
            
       $tabla = "rol";
       $Rold = new rolDAO();
        $respuesta = $Rold -> listRol($pagina,$cantidad);
    
        return $respuesta;
  
      }



          
      /*public function ctrActualizarEstadoAlmacen($id){
      

        $tabla = "almacen";
        $datos = array("id"=>$id);
        $Almacend = new almacenDAO();
        $respuesta = $Almacend -> updatestatusalmacen($tabla,$datos);
        return $respuesta; 
        
      
    }*/

        
    }
    
?>