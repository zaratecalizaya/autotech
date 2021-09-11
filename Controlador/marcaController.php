<?php

require_once 'modelo/Funciones/marcaDAO.php';
require_once 'modelo/utilitario.php';

class ControladorMarca{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroMarca(){
      
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
          
                    $tabla = "marca";
                    $Marcad = new marcaDAO ();
                    $respuesta = $Marcad -> addMarca($tabla,$datos);
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
            
                  $tabla = "marca";
                  $Marcad = new marcaDAO();
                  $respuesta = $Marcad -> updateMarca($tabla,$datos);
            
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



      public function ctrListarMarca($pagina,$cantidad){
      
            
       $tabla = "marca";
       $Marcad = new marcaDAO();
        $respuesta = $Marcad -> listMarca($pagina,$cantidad);
    
        return $respuesta;
  
      }



          
      public function ctrActualizarEstadoMarca($id){
      

        $tabla = "marca";
        $datos = array("id"=>$id);
        $Marcad = new marcaDAO();
        $respuesta = $Marcad -> updatestatusmarca($tabla,$datos);
        return $respuesta; 
        
      
    }

        
    }
    
?>