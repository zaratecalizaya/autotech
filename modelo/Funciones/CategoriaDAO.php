<?php
 
class CategoriaDAO {
 
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
	
	   public function ultimoId() {

        require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        $query = "SELECT MAX(ID) as id FROM imagen  ";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
      
        $json = 0;
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
            //$json['cliente'][]=nada;
          while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
            
            $json=$line["id"];
          }
          
        }
        
        mysqli_close($link);
        return $json;
     
        
    }
 
    /**
     * agregar nuevo usuario
     */
    public function addCategoria($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        mysqli_query($link,"INSERT INTO imagen (Nombre) VALUES('".$datos["imagen"]."')");
        
		    $in=$this->ultimoId();
             
          $result=mysqli_query($link,"INSERT INTO ".$tabla." (Nombre,idImagen) VALUES('".$datos["nombre"]."','".$in."')");
          return $result;
      

    }



  
	

    public function listCategoria($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
    
      $query = "SELECT c.id,c.Nombre,i.Nombre as imagen FROM categoria c inner join imagen i on i.id=c.idImagen ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
    
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          
          array_push($json, array($line["id"],$line["Nombre"],$line["imagen"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }












  public function updatestatuscomportamiento($tabla,$datos) { //regusu et no es

    require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
    
        $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id = ".$datos["id"]);
        return $result;
    
  }  

 
  




 







  
}
 
?>
