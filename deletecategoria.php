
<?php


require_once 'modelo/Conexion/connectbd.php';
// connecting to database
$db = new DB_Connect();
$link=$db->connect(); 



$result=mysqli_query($link,"DELETE from categoria where id_categoria = ".$_POST["idcategoria"]);


  if($result==1){
    header("Location:categoria.php");
} else{
    echo "Error a eliminar";
    echo $result;
    echo $_POST["idcategoria"];
    
}

?>