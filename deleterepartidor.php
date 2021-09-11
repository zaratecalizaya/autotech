<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from repartidor where id_repartidor = ".$_POST["idrepartidor"]);
   

      if($result==1){
        header("Location: Repartidor.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idrepartidor"];
        
    }
   
?>