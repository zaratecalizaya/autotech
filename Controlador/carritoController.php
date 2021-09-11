<?php

require_once 'modelo/Funciones/carritoDAO.php';
require_once 'modelo/utilitario.php';

class ControladorCarrito{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  
    public function ctrRegistroCarrito(){
      
        if(isset($_POST["id"])){
         
         $mutil = new Utils();
                   //   $mutil -> console_log('esta ingresando');
                      
                      
                      if(($_POST["id"])==0){
              
            
                
                 // $mutil -> console_log('esta ingresando');
                     
             // $subir_archivo = 'imagenes/'.basename($_FILES['subir_archivo']['name']);
            //  if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
               // $mutil -> console_log('esta ingresando');
                  $datos = array(
                        "monto"=>$_POST["monto"],
                        
                        
                       //  "imagen"=>$subir_archivo
                         );
          
                    $tabla = "carrito";
                    $Carritod = new carritoDAO ();
                    $respuesta = $Carritod -> addCarrito($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
  
  
  
                // return "La subida de imagen ha fallado";
                
          
            }else{
             
               $datos = array("id"=>$_POST["id"],
            "monto"=>$_POST["monto"],
            
                   
                   // "imagen"=>""
                 
                 
                   
                   );
            
                  $tabla = "carrito";
                  $Carritod = new carritoDAO();
                  $respuesta = $Carritod -> updateCarrito($tabla,$datos);
            
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



      public function ctrListarCarrito($pagina,$cantidad){
      
            
       $tabla = "carrito";
       $Carritod = new carritoDAO();
        $respuesta = $Carritod -> listCarrito($pagina,$cantidad);
    
        return $respuesta;
  
      }



          
      public function ctrActualizarEstadoCarrito($id){
      

        $tabla = "carrito";
        $datos = array("id"=>$id);
        $Carritod = new carritoDAO();
        $respuesta = $Carritod -> updatestatuscarrito($tabla,$datos);
        return $respuesta; 
        
      
    }

        
    }
    
?>