<?php



  require_once 'modelo/Funciones/CategoriaDAO.php';

class ControladorCategoria{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
  
      
     public function ctrListarCategoriaTabla($pagina,$cantidad){
      
            
      $tabla = "categoria";
      $Niveld = new CategoriaDAO();
       $respuesta = $Niveld -> listCategoria($pagina,$cantidad);
   
       return $respuesta;
 
     }
      


      public function ctrRegistroCategoria(){
      
        if(isset($_POST["id"])){
         
            if(($_POST["id"])==0){
              $directorio = 'fotoperfil/';
                $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
                if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
    
                    $datos = array("nombre"=>$_POST["nombre"],
                           "imagen"=>$subir_archivo
                                                     );
                           
              
            
                    $tabla = "categoria";
                    $Usuariod = new CategoriaDAO();
                    $respuesta = $Usuariod -> addCategoria($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
    
    
    
                
                  }else{
                   

                    $datos = array("nombre"=>$_POST["nombre"],
                    "imagen"=>""
                                              );
                    
       
      
             $tabla = "categoria";
             $Usuariod = new CategoriaDAO();
             $respuesta = $Usuariod -> addCategoria($tabla,$datos);
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