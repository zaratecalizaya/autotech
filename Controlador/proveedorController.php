<?php

require_once 'modelo/Funciones/proveedorDAO.php';
require_once 'modelo/utilitario.php';

class ControladorProveedor{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroProveedor(){
      
        if(isset($_POST["id"])){
         
         $mutil = new Utils();
                   //   $mutil -> console_log('esta ingresando');
                      
                      
                      if(($_POST["id"])==0){
              
            
                
                 // $mutil -> console_log('esta ingresando');
                     
             // $subir_archivo = 'imagenes/'.basename($_FILES['subir_archivo']['name']);
            //  if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
               // $mutil -> console_log('esta ingresando');
                  $datos = array(
                    "nit"=>$_POST["nit"],
                    "razon_social"=>$_POST["razon_social"],
                    "telefono"=>$_POST["telefono"],
                    "dirección"=>$_POST["dirección"],
                    "correo"=>$_POST["correo"]
                        
                       //  "imagen"=>$subir_archivo
                         );
          
                    $tabla = "proveedor";
                    $Proveedord = new proveedorDAO();
                    $respuesta = $Proveedord -> addProveedor($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
  
  
  
                // return "La subida de imagen ha fallado";
                
          
            }else{
             
               $datos = array("id"=>$_POST["id"],
            "nit"=>$_POST["nit"],
            "razon_social"=>$_POST["razon_social"],
            "telefono"=>$_POST["telefono"],
            "dirección"=>$_POST["dirección"],
            "correo"=>$_POST["correo"]
                   
                   // "imagen"=>""
                 
                 
                   
                   );
            
                  $tabla = "proveedor";
                  $Proveedord = new proveedorDAO();
                  $respuesta = $Proveedord -> updateProveedor($tabla,$datos);
            
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



      public function ctrListarProveedor($pagina,$cantidad){
      
            
       $tabla = "proveedor";
       $Proveedord = new proveedorDAO();
        $respuesta = $Proveedord -> listProveedor($pagina,$cantidad);
    
        return $respuesta;
  
      }



          
      public function ctrActualizarEstadoProveedor($id){
      

        $tabla = "proveedor";
        $datos = array("id"=>$id);
        $Proveedord = new proveedorDAO();
        $respuesta = $Proveedord -> updatestatusproveedor($tabla,$datos);
        return $respuesta; 
        
      
    }

        
    }
    
?>