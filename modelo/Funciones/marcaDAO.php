<?php
 
class marcaDAO {
 
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

 
       
    public function addMarca($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      //$mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (nombre) VALUES('".$datos["nombre"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el marca";
              }
            
			
         

    }

      






	   public function ismarcaexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_marca = '".$id."'")) {

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


    public function updateMarca($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->ismarcaexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET nombre='".$datos["nombre"]."'  where id_marca = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }

 
    public function listMarca($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_marca,nombre FROM marca  ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      
      if(mysqli_num_rows($result)>0){
         
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //  $destado ="Deshabilitado";
        // if ($line["estado"]==1){
         //   $destado ="Habilitado";
       // }        
          array_push($json, array($line["id_marca"],$line["nombre"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }
  

    public function updatestatusmarca($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
      
        
        $pu=$this->ismarcaexist($tabla, $datos["id"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id_marca = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}
      
    }  



      
  
}
 
 
 
 
?>
