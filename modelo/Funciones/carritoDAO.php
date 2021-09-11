<?php
 
class carritoDAO {
 
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

 
       
    public function addCarrito($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      //$mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (monto,estado) VALUES('".$datos["monto"]."',1)";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el carrito";
              }
            
			
         

    }

      






	   public function iscarritoexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_carrito = '".$id."'")) {

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


    public function updateCarrito($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->iscarritoexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET monto='".$datos["monto"]."'   where id_carrito = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }

 
    public function listCarrito($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_carrito,monto,estado FROM carrito  ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      
      if(mysqli_num_rows($result)>0){
         
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $destado ="Deshabilitado";
         if ($line["estado"]==1){
            $destado ="Habilitado";
        }        
          array_push($json, array($line["id_carrito"],$line["monto"],$destado));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }
  

    public function updatestatuscarrito($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
      
        
        $pu=$this->iscarritoexist($tabla, $datos["id"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id_carrito = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}
      
    }  
     
  
}
 

 
?>
