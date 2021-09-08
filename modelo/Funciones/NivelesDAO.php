<?php
 
class NivelesDAO {
 
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
	
	   public function isnivelexist($tabla, $id) {

        require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE Id = '".$id."'")) {

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
 
    /**
     * agregar nuevo usuario
     */
    public function addNivel($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
             //$clave = $datos["clave"];
          $result=mysqli_query($link,"INSERT INTO ".$tabla." (Nombre,Numero,PuntajeMin,GruposMin) VALUES('".$datos["nombre"]."','".$datos["numero"]."','".$datos["puntajemin"]."','".$datos["grupomin"]."')");
          return $result;
      

    }


    public function updateNivel($tabla,$datos ){
  
      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isnivelexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre ='".$datos["nombre"]."',Numero='".$datos["numero"]."' ,PuntajeMin='".$datos["puntajemin"]."' ,GruposMin='".$datos["grupomin"]."'  where Id = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }


    }


  
	

    public function listCategoria($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
    
      $query = "SELECT Id,Nombre,Numero,PuntajeMin,GruposMin FROM nivel ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
    
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          
          array_push($json, array($line["Id"],$line["Nombre"],$line["Numero"],$line["PuntajeMin"],$line["GruposMin"]));
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

 
  




 

  public function listGrupos(){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        $query = "SELECT Id,Nombre FROM grupocomportamiento order by Nombre";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          	array_push($json, array($line["Id"],$line["Nombre"]));
          }
			
        }
		
		mysqli_close($link);
		return $json;
		
	}


  public function listGrupo($idGrupo){
    require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
        $query = "SELECT Id,Nombre FROM grupocomportamiento WHERE Id = ".$idGrupo." order by Nombre";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
            //$json['cliente'][]=nada;
          while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($json, array($line["Id"],$line["Nombre"]));
          }
      
        }
    
    mysqli_close($link);
    return $json;
    
  }








  
}
 
?>
