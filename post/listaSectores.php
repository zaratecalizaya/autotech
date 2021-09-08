<?php
 if(isset($_POST["lista"])){
    
    $lista= $_POST['lista'];
    
    include ("funciones.php");
            $Carga = new Funciones();
            $respuesta ="";
            
            if($lista=="sector"){
              $respuesta = $Carga -> CargarComboSector();
            }
            
            //return $respuesta;
            if (is_null( $respuesta)){
              echo  "0|Error de conexión al servidor";
            }else{
              echo  $respuesta;  
            }            
     
 }else{
    ?>
    
     <!DOCTYPE html>
    <html>
        <head>
            <title>Ipax Studio</title>
            <style>
                body{
                    background-color: black;
                }
                .box{
                    background-color: white;
                    margin: 10px;
                    padding: 10px;
                }
            </style>
        </head>
        <body>
             
                <div class="box">
                    <h1>Holis, si lees esto hubo un error en el sistema, contacte con su administrador. que tenga un lindo dia</h1>
                </div>
                 
        </body>
    </html>
 
        <?php
}
?>
