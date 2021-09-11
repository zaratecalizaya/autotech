<?php
 
class pedidoDAO {
 
    private $db;
    // constructor

    function __construct() {
        require_once 'modelo/Conexion/connectbd.php';
        // connecting to database

        $this->db = new DB_Connect();
        $this->db->connect();

    }
 
    // destructor
    function __destruct() {
 
    }
	
    /**
     * agregar nuevo usuario
     */

 
       
    public function addPedido($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      //$mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (fecha_pedido,fecha_entrega,hora_pedido,hora_entrega,precio_total,estado) VALUES('".$datos["fecha_pedido"]."','".$datos["fecha_entrega"]."','".$datos["hora_pedido"]."','".$datos["hora_entrega"]."','".$datos["precio_total"]."',1)";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el pedido";
              }
            
			
         

    }

      






	   public function ispedidoexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_pedido = '".$id."'")) {

        /* determinar el número de filas del resultado */
        $num_rows  = mysqli_num_rows($result);

        if ($num_rows > 0) {
          return true;
        } else {
          // no existe
          return false;
        }

      }else {
        return false;
      }
      
  }


    public function updatePedido($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->ispedidoexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET fecha_pedido='".$datos["fecha_pedido"]."' ,fecha_entrega='".$datos["fecha_entrega"]."' ,hora_pedido='".$datos["hora_pedido"]."' ,hora_entrega='".$datos["hora_entrega"]."',precio_total='".$datos["precio_total"]."'   where id_pedido = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }

 
    public function listPedido($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_pedido,fecha_pedido,fecha_entrega,hora_pedido,hora_entrega,precio_total,estado FROM pedido  ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      
      if(mysqli_num_rows($result)>0){
         
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $destado ="Deshabilitado";
         if ($line["estado"]==1){
            $destado ="Habilitado";
        }        
          array_push($json, array($line["id_pedido"],$line["fecha_pedido"],$line["fecha_entrega"],$line["hora_pedido"],$line["hora_entrega"],$line["precio_total"],$destado));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }
  

    public function updatestatuspedido($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
      
        
        $pu=$this->ispedidoexist($tabla, $datos["id"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id_carrito = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}
      
    }  
     
  
}
 

 
?>
