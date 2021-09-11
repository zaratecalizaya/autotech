<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from transporte where id_transporte = ".$_POST["idtransporte"]);
   

      if($result==1){
        header("Location: transporte.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idtransporte"];
        
    }
   
?>