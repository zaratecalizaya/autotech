<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from rol where id_rol = ".$_POST["idrol"]);
   

      if($result==1){
        header("Location: rol.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idrol"];
        
    }
   
?>