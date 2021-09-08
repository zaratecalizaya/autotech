
<?php
session_start();
if (!isset($_SESSION['session_id'])) {
    header('location: login.php');
}
?>

<?php include("encabezado.php"); ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bago</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Bago style -->
  <link rel="stylesheet" href="css/bagostyle.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include("barrasup.php"); ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src=<?php echo $_SESSION['session_perfil'] ?> alt="Bago Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Administrador</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['session_usuario'] ?> </a>
          
        </div>
        <div class="right">
          <i class="fas fa-sign-out-alt"></i>  
        </div>
        
      </div>

      <!-- Sidebar Menu -->
      <?php include("navegador.php"); ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header hero-image" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-white">Categoria</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tablero.php">Inicio</a></li>
              <li class="breadcrumb-item active text-white">Categoria</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content hero-image" >
      <div class="container-fluid" >
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title">Lista de Categorias</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                  
                    <th>Acciones</th>
                  </thead>
                  <tbody>
                  <?php 
                    require_once 'Controlador/categoriaController.php';
                    $categoria = new ControladorCategoria();
                    $list=  $categoria -> ctrListarCategoriaTabla(1,1000);
                    
                    while (count($list)>0){
                      $Cat = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($Cat);
                      echo "<td>".$Did."</td>";
                      $Dnombre = array_shift($Cat);
                      echo "<td>".$Dnombre."</td>";
                      
                      $Darchivo = array_shift($Cat);
                      if ($Darchivo!=""){
                        echo "<td><img src='".$Darchivo."' width='100'></td>";  
                      }else{
                        echo "<td></td>";
                      }
                      
                      echo '<td>
                              <button class="btn" onclick="saveData('.$Did.',\''.$Dnombre.'\',\''.$DPuntajeMeta.'\')"><i class="fas fa-edit"></i> Editar</button>
                              <button class="btn" onclick="updateStatus('.$Did.')"><i class="far fa-'.$DestadoIco.'"></i>'.$Destadobtn.'</button>
                            </td>';
                      echo "</tr>";
                    }
                    
                    ?>
                    
                  
               
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
        
 
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
 
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><label id="TituloUser">Agregar Categoria</label> </h3> 
                <button id="nuevoNivel" class="btn float-right" onclick="newUser()" > <i class="fas fa-user-plus"></i> Nuevo Nivel</button>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" method="post"    >
                <div class="card-body">
                  <div class="form-group">
                   
                    <input type="hidden"  class="form-control"  id="id" name="id" placeholder="ID" value="0" readonly="true">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el Nombre">
                  </div>
                  <div class="form-group">
                    <label for="InputUsuario">Foto Perfil</label>
                   <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                    <p><input name="subir_archivo" type="file" /></p>
                  </div>
                   
                   
                  
                 

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <?php
                  
                    $resp= $categoria -> ctrRegistroCategoria();
                    //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                    if ($resp=="true"){
                      //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                       echo "<meta http-equiv='refresh' content='0'>";
                    }elseif($resp=="false"){
                      //echo "<script> alert(' respuesta: al parecer fue falso XD')</script>";
                    }else{
                      //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                    }
                    
                  ?>
              


                                   
                  <input type="submit" class="btn btn-primary" value="Enviar">
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
       
      <div class="card-footer">
        
        <a href="exportarniveles.php" class="btn btn-success">Descargar Excel</a>
        </div>
 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include("pie.php"); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    
    
  });
</script>

<script>
  function saveData(id, nombre,numero,puntajemin,grupomin){
    document.getElementById("id").value = id;
    document.getElementById("nombre").value = nombre;
    document.getElementById("numero").value = numero;
    document.getElementById("puntajemin").value = puntajemin;
    document.getElementById("grupomin").value = grupomin;
 
    $('#TituloUser').text("Editar Nivel");
//    document.getElementById("TituloUser").value = "Editar Usuario";  
  }
  
  function newUser(){
    document.getElementById("id").value = 0;
    document.getElementById("nombre").value = "";
    
    
    $('#TituloUser').text("Agregar Categoria");
  //  document.getElementById("TituloUser").value = "Agregar Usuario";  
  }
  
  function updateStatus(id){
      var parametros = {
                "id" : id,
              
        };
      
      $.ajax({
        type: "POST",
        url: "comportamientoestado.php",
        data: parametros,
        success:function( msg ) {
          window.location.href = window.location.href;
       //  alert( "Data actualizada. " + msg );
        }
       });
  }
  
  
</script>
<?php include 'footer.php';?>
</body>
</html>
