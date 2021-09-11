<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from proveedor where id_proveedor = ".$_POST["idproveedor"]);
   

      if($result==1){
        header("Location: proveedor.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idproveedor"];
        
    }
   
?>