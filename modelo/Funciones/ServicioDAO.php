<?php
 
class ServicioDAO {
 
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
    public function addServicio($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        mysqli_query($link,"INSERT INTO imagen (Nombre) VALUES('".$datos["imagen"]."')");
        
		    $in=$this->ultimoId();
             
          $result=mysqli_query($link,"INSERT INTO ".$tabla." (Nombre,Descripcion,Precio,Estado,IdCategoria,IdImagen) VALUES('".$datos["nombre"]."','".$datos["descripcion"]."','".$datos["precio"]."',1,'".$datos["categoria"]."','".$in."')");
          return $result;
      

    }


    public function updateNivel($tabla,$datos ){
  
      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
    //  $pu=$this->isnivelexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre ='".$datos["nombre"]."',Numero='".$datos["numero"]."' ,PuntajeMin='".$datos["puntajemin"]."' ,GruposMin='".$datos["grupomin"]."'  where Id = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }


    }


  
	

    public function listCategoriaSelect(){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
    
      $query = "SELECT c.id,c.Nombre FROM categoria c  ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
    
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          
          array_push($json, array($line["id"],$line["Nombre"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }

    public function listServicios($pagina,$cantidad){
        require_once 'modelo/Conexion/connectbd.php';
            // connecting to database
            $this->db = new DB_Connect();
            $link=$this->db->connect();
        //$json=$cuenta;
        
      
        $query = " Select  s.ID,s.Nombre as servicio,i.Nombre as imagen ,s.Precio ,c.Nombre as categoria,s.Estado from servicio s inner join categoria c on s.IdCategoria=c.ID inner join imagen i on s.IdImagen=i.ID ";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
      
        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
            //$json['cliente'][]=nada;
          while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $destado ="Deshabilitado";
            if ($line["Estado"]==1){
                $destado ="Habilitado";
            }
            array_push($json, array($line["ID"],$line["servicio"],$line["imagen"],$line["Precio"],$line["categoria"],$destado));
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
