<?php
 
class vehiculoDAO {
 
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

 
       
    public function addVehiculo($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      //$mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (año,marca,modelo,imagen,estado) VALUES('".$datos["año"]."','".$datos["marca"]."','".$datos["modelo"]."','".$datos["imagen"]."',1)";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el vehiculo";
              }
            
			
         

    }

      






	   public function isvehiculoexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_vehiculo = '".$id."'")) {

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


    public function updateVehiculo($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isvehiculoexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET año='".$datos["año"]."',marca ='".$datos["marca"]."',modelo='".$datos["modelo"]."',imagen='".$datos["imagen"]."'    where id_vehiculo = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }

 
    public function listVehiculo($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_vehiculo,año,marca,modelo,imagen,estado FROM vehiculo  ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      
      if(mysqli_num_rows($result)>0){
         
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $destado ="Deshabilitado";
         if ($line["estado"]==1){
            $destado ="Habilitado";
        }        
          array_push($json, array($line["id_vehiculo"],$line["año"],$line["marca"],$line["modelo"],$line["imagen"],$destado));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }
  

    public function updatestatusvehiculo($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
      
        
        $pu=$this->isvehiculoexist($tabla, $datos["id"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id_vehiculo = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}
      
    }  



      
  
}
 
 
 
 
?>
