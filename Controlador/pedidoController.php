<?php

require_once 'modelo/Funciones/pedidoDAO.php';
require_once 'modelo/utilitario.php';

class ControladorPedido{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  
    public function ctrRegistroPedido(){
      
        if(isset($_POST["id"])){
         
         $mutil = new Utils();
                   //   $mutil -> console_log('esta ingresando');
                      
                      
                      if(($_POST["id"])==0){
              
            
                
                 // $mutil -> console_log('esta ingresando');
                     
             // $subir_archivo = 'imagenes/'.basename($_FILES['subir_archivo']['name']);
            //  if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
               // $mutil -> console_log('esta ingresando');
                  $datos = array(
                    "fecha_pedido"=>$_POST["fecha_pedido"],
                    "fecha_entrega"=>$_POST["fecha_entrega"],
                    "hora_entrega"=>$_POST["hora_entrega"],
                    "hora_pedido"=>$_POST["hora_pedido"],
                    "precio_total"=>$_POST["precio_total"]
                        
                        
                       //  "imagen"=>$subir_archivo
                         );
          
                    $tabla = "pedido";
                    $Pedidod = new pedidoDAO ();
                    $respuesta = $Pedidod -> addPedido($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
  
  
  
                // return "La subida de imagen ha fallado";
                
          
            }else{
             
               $datos = array("id"=>$_POST["id"],
            "fecha_pedido"=>$_POST["fecha_pedido"],
            "fecha_entrega"=>$_POST["fecha_entrega"],
            "hora_entrega"=>$_POST["hora_entrega"],
            "hora_pedido"=>$_POST["hora_pedido"],
            "precio_total"=>$_POST["precio_total"]
            
                   
                   // "imagen"=>""
                 
                 
                   
                   );
            
                  $tabla = "pedido";
                  $Pedidod = new pedidoDAO();
                  $respuesta = $Pedidod -> updatePedido($tabla,$datos);
            
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



      public function ctrListarPedido($pagina,$cantidad){
      
            
       $tabla = "pedido";
       $Pedidod = new pedidoDAO();
        $respuesta = $Pedidod -> listPedido($pagina,$cantidad);
    
        return $respuesta;
  
      }



          
      public function ctrActualizarEstadoPedido($id){
      

        $tabla = "pedido";
        $datos = array("id"=>$id);
        $Pedidod = new pedidoDAO();
        $respuesta = $Pedidod -> updatestatuspedido($tabla,$datos);
        return $respuesta; 
        
      
    }

        
    }
    
?>