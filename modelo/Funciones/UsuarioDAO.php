<?php
 
class UsuarioDAO {
 
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

    
 	   public function isuserexist($tabla, $username) {

        require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE Usuario = '".$username."'")) {

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
 

    public function ultimoId() {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $query = "SELECT MAX(id_empleado) as id FROM empleado";
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
    public function adduserWeb($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==false){
          $clave = md5($datos["clave"]);
          //$clave = $datos["clave"];
 
         
          mysqli_query($link,"INSERT INTO empleado (nombre,paterno,materno) VALUES('".$datos["nombre"]."','".$datos["paterno"]."','".$datos["materno"]."')");
          $empleado=$this->ultimoId();
      
         
          $result=mysqli_query($link,"INSERT INTO usuario ( nombre, contraseña, estado, id_cliente, id_repartidor, id_rol, id_empleado)
           VALUES('".$datos["usuario"]."','".$clave."',1,null,null,'".$datos["rol"]."','".$empleado."')");
         
          return $result;
      	}else{
      		return "el usuario ya existe";
      	}

    }
 /**
     * agregar nuevo usuario
     */
    public function updateuserWeb($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==true){
          if ($datos["clave"]==""){
            $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre = '".$datos["nombre"]."',Usuario='".$datos["usuario"]."' ,Paterno='".$datos["paterno"]."' ,Materno='".$datos["materno"]."'  where ID = ".$datos["id"]);
            return $result;
          }else{
            $clave = md5($datos["clave"]);
            $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre = '".$datos["nombre"]."',Usuario='".$datos["usuario"]."' ,Clave ='".$clave."',Paterno='".$datos["paterno"]."' ,Materno='".$datos["materno"]."'  where ID = ".$datos["id"]);
            return $result;
          }          
      	}else{
      		return false;
      	}

    }
 
    public function updatestatususer($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}

    }



	
	public function listusuarioWeb($pagina,$cantidad){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		//$json=$cuenta;
    

		$query = "SELECT u.id_usuario,e.nombre ,e.paterno,e.materno,u.estado,u.nombre as usuario ,r.nombre as rol from usuario u inner join rol r on u.id_rol=r.id_rol inner join empleado e on e.id_empleado=u.id_empleado";
		$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

  	$json = array();
		//$json =mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0){
				//$json['cliente'][]=nada;
			while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            // $fullname= $line["Paterno"]."".$line["Materno"];
        $destado ="Deshabilitado";
        if ($line["estado"]==1){
            $destado ="Habilitado";
        }        
				array_push($json, array($line["id_usuario"],$line["nombre"],$line["paterno"],$line["materno"],$line["rol"],$line["usuario"],$destado));
			}
			
		}
		
		mysqli_close($link);
		return $json;
		
	}
  
	public function getusuario($Nick){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		$query = "SELECT * FROM EFUsuario where Nick='".$Nick."'";
		$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

		$json = array();
		if(mysqli_num_rows($result)>0){
			while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$json['usuario'][]=$line;
			}
			
		}
		
		mysqli_close($link);
		return json_encode($json);
		
	}
  
  
  public function loginUserWeb($datos) { //regusu et no es
        
        $mensaje = "0|Error no identificado";
        require_once 'modelo/Conexion/connectbd.php';
        
            require_once 'modelo/utilitario.php';
                    $mutil = new Utils();
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		        
      	$query = "SELECT u.id_usuario,u.contraseña as clave,u.nombre as usuario ,r.nombre as rol,e.nombre ,e.paterno,e.materno from usuario u inner join rol r on u.id_rol=r.id_rol inner join empleado e on e.id_empleado=u.id_empleado  WHERE u.nombre = '".$datos["usuario"]."' ";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        if(mysqli_num_rows($result)>0){
        	if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $clave = $datos["clave"];
           // $mutil -> console_log('datosclave: '.$datos["clave"]);
           // $mutil -> console_log('clave: '.$clave);
           // $mutil -> console_log('lineclave: '.$line["Clave"]);
            if ($line["clave"]==$clave){
                $fullname=$line["nombre"] ."  ". $line["paterno"] ."  ". $line["materno"];
              $mensaje="1|".$line["id_usuario"]."|".$fullname."|".$line["rol"];
            }else{
              $mensaje="0|Usuario o contraseña incorrecto.";  
            }        
            
          }else{
            $mensaje="0|Error de conexion.";
          }
        }else{
          $mensaje="0|Usuario o contraseña incorrecto sin datos .";
        }
				mysqli_close($link);
        return $mensaje;
	}
  
  
  
  



    
    
    public function updateuserMovil($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==true){
          $query = "SELECT s.nombre as sector,ss.nombre as subsector FROM sector s inner join subsector ss on s.id=ss.idsector where ss.id=".$datos["SubSector"];
      		$result1 = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

      		$json = array();
      		if(mysqli_num_rows($result1)>0){
      			if ($line = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
              if ($datos["clave"]==""){
                $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombres = '".$datos["Nombres"]."',Apellidos = '".$datos["Apellidos"]."',FechaNatal = '".$datos["FechaNatal"]."',IdCargo = '".$datos["Cargo"]."',CI = '".$datos["Ci"]."',Region = '".$datos["Region"]."',Sector = '".$line["sector"]."',SubSector = '".$line["subsector"]."',Usuario='".$datos["usuario"]."' ,FActualizacion = now() where id = ".$datos["id"]);
                if ($result ==true){
                    return "true";
                }else {
                  return "Error al guardar el usuario update";
                }
                        
              }else{
                $clave = md5($datos["clave"]);
                $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombres = '".$datos["Nombres"]."',Apellidos = '".$datos["Apellidos"]."',FechaNatal = '".$datos["FechaNatal"]."',IdCargo = '".$datos["Cargo"]."',CI = '".$datos["Ci"]."',Region = '".$datos["Region"]."',Sector = '".$line["sector"]."',SubSector = '".$line["subsector"]."',Usuario='".$datos["usuario"]."' ,Clave ='".$clave."',FActualizacion = now() where id = ".$datos["id"]);
                return $result;
              }          
              
            }
          }
          return "error al cargar la informacion de sectores"; 
          
          
      	}else{
      		return "no se pudo encontrar al usuario";
      	}

    }



    public function listusuarioSelect(){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
  
      $query = "SELECT  id_rol,nombre from rol";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              // $fullname= $line["Paterno"]."".$line["Materno"];
        
          array_push($json, array($line["id_rol"],$line["nombre"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }

  
}
 
 
 
 
?>
