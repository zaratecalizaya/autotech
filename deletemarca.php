<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from marca where id_marca = ".$_POST["idmarca"]);
   

      if($result==1){
        header("Location: marca.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idmarca"];
        
    }
   
?>