<?php



  require_once 'modelo/Funciones/ServicioDAO.php';

class ControladorServicio{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
  
      
     public function ctrListarServicioTabla($pagina,$cantidad){
      
            

      $Serviced = new ServicioDAO();
       $respuesta = $Serviced -> listServicios($pagina,$cantidad);
   
       return $respuesta;
 
     }
      



     public function ctrListarCategoriaSelect(){
      
            
        $tabla = "categoria";
        $Catd = new ServicioDAO();
         $respuesta = $Catd -> listCategoriaSelect();
     
         return $respuesta;
   
       }
        

      public function ctrRegistroServicio(){
      
        if(isset($_POST["id"])){
         
            if(($_POST["id"])==0){
              $directorio = 'ImagenP/';
                $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
                if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
    
                    $datos = array("nombre"=>$_POST["nombre"],
                    "descripcion"=>$_POST["descripcion"],
                    "precio"=>$_POST["precio"],
                    "categoria"=>$_POST["categoria"],
                    "imagen"=>$subir_archivo
                                                     );
                           
              
            
                    $tabla = "servicio";
                    $Servicio = new ServicioDAO();
                    $respuesta = $Servicio -> addServicio($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
    
    
    
                
                  }else{
                   

                    $datos = array("nombre"=>$_POST["nombre"],
                    "descripcion"=>$_POST["descripcion"],
                    "precio"=>$_POST["precio"],
                    "categoria"=>$_POST["categoria"],
                    "imagen"=>""
                                                     );
                           
              
            
                    $tabla = "servicio";
                    $Servicio = new ServicioDAO();
                    $respuesta = $Servicio -> addServicio($tabla,$datos);
                        return $respuesta;
                        if ($respuesta==true){
                          return "true";
                        }else{
                          return $respuesta;  
                        }
                             
                  


                    
                  }            
          
            }else{
              
                
              }
          
        }else{
          return "no existe el inicio";
        }
        
    }
    

  
    
}

?>