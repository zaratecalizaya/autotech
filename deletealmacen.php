<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from almacen where id_almacen = ".$_POST["idalmacen"]);
   

      if($result==1){
        header("Location: almacen.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idalmacen"];
        
    }
   
?>