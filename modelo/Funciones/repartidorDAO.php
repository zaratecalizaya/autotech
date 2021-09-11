<?php
 
class repartidorDAO {
 
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
     



	
  
       
    public function addRepartidor($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
     // $mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (nombre, paterno, materno,telefono,licencia, estado) VALUES('".$datos["nombre"]."','".$datos["paterno"]."','".$datos["materno"]."','".$datos["telefono"]."','".$datos["licencia"]."',1)";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el repartidor";
              }
            
			
         

    }

    public function listarrepartidorselect(){
      
      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    //$json=$cuenta;
    
    $query = "SELECT id_repartidor,nombre,paterno,materno  FROM repartidor   ";
    $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = array();
    //$json =mysqli_num_rows($result);
    if(mysqli_num_rows($result)>0){
        //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $full=$line["nombre"]." ".$line["paterno"]."  ".$line["materno"];
      
      
          array_push($json, array($line["id_repartidor"],$full));
      }
      
    }
    
    mysqli_close($link);
    return $json;
    
      

    }
       
	   public function isrepartidorexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_repartidor = '".$id."'")) {

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


    public function updateRepartidor($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isrepartidorexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET nombre ='".$datos["nombre"]."',paterno='".$datos["paterno"]."' ,telefono='".$datos["telefono"]."',licencia='".$datos["licencia"]."'   where id_repartidor = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }
 
    public function listRepartidor($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_repartidor,nombre,paterno,materno,telefono,licencia,estado FROM repartidor   ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $destado ="Ocupado";
          if ($line["estado"]==1){
              $destado ="Libre";
          }        
          array_push($json, array($line["id_repartidor"],$line["nombre"],$line["paterno"],$line["materno"],$line["telefono"],$line["licencia"],$destado));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }


  


    public function updatestatusrepartidor($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
      
        
        $pu=$this->isrepartidorexist($tabla, $datos["id"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id_repartidor = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}
      
    }  

}
		
?>
