<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from usuario where id_usuario = ".$_POST["idusuariotodo"]);
   

      if($result==1){
        header("Location: usuariotodo.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idusuariotodo"];
        
    }
   
?>