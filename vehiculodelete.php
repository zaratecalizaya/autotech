<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from vehiculo where id_vehiculo = ".$_POST["automovil"]);
   

      if($result==1){
        header("Location: vehiculo.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["automovil"];
        
    }
   
?>