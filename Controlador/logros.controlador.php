<?php



  require_once 'modelo/Funciones/GrupoComportamientoDAO.php';
  require_once 'modelo/Funciones/ComportamientoDAO.php';
  require_once 'modelo/Funciones/NivelesDAO.php';
  require_once 'modelo/Funciones/LogrosDAO.php';
class ControladorLogro{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
  
      public function ctrListarNivelTabla($pagina,$cantidad){
      
            
       $tabla = "nivel";
       $Niveld = new NivelesDAO();
        $respuesta = $Niveld -> listNivel($pagina,$cantidad);
    
        return $respuesta;
  
      }

      public function ctrRegistroNivel(){
      
        if(isset($_POST["id"])){
         
            if(($_POST["id"])==0){
              
    
                    $datos = array("nombre"=>$_POST["nombre"],
                           "numero"=>$_POST["numero"],
                          "puntajemin"=>$_POST["puntajemin"],
                          "grupomin"=>$_POST["grupomin"]
                           
                         
                           );
                           
              
            
                    $tabla = "nivel";
                    $Usuariod = new NivelesDAO();
                    $respuesta = $Usuariod -> addNivel($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
    
    
    
                
                            
          
            }else{
              
                
                  $datos = array("id"=>$_POST["id"],
                  "nombre"=>$_POST["nombre"],
                  "numero"=>$_POST["numero"],
                  "puntajemin"=>$_POST["puntajemin"],
                  "grupomin"=>$_POST["grupomin"]
                  );
                  
    
    
                  //    echo $datos["id"],$datos["nombre"],$datos["puntaje"],$datos["grupos"];
    
               //echo $datos["puntaje"];
                  $tabla = "nivel";
                  $Usuariod = new NivelesDAO();
                  $respuesta = $Usuariod ->updateNivel($tabla,$datos);
            
                  return $respuesta;
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
    

  
    
}

?>