<?php

require_once 'modelo/Funciones/categoriaDAO.php';
require_once 'modelo/utilitario.php';

class ControladorCategoria{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroCategoria(){
      
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
                        "tipo"=>$_POST["tipo"],
                        
                       //  "imagen"=>$subir_archivo
                         );
          
                    $tabla = "categoria";
                    $Categoriad = new categoriaDAO ();
                    $respuesta = $Categoriad -> addCategoria($tabla,$datos);
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
            "tipo"=>$_POST["tipo"],
                   
                   // "imagen"=>""
                 
                 
                   
                   );
            
                  $tabla = "categoria";
                  $Categoriad = new categoriaDAO();
                  $respuesta = $Categoriad -> updateCategoria($tabla,$datos);
            
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



      public function ctrListarCategoria($pagina,$cantidad){
      
            
       $tabla = "categoria";
       $Categoriad = new categoriaDAO();
        $respuesta = $Categoriad -> listCategoria($pagina,$cantidad);
    
        return $respuesta;
  
      }



          
      public function ctrActualizarEstadoCategoria($id){
      

        $tabla = "categoria";
        $datos = array("id"=>$id);
        $Categoriad = new categoriaDAO();
        $respuesta = $Categoriad -> updatestatuscategoria($tabla,$datos);
        return $respuesta; 
        
      
    }

        
    }
    
?>