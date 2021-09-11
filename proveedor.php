<?php
session_start();
if (!isset($_SESSION['session_id'])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Autotech</title>
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
      <img src=<?php echo $_SESSION['session_perfil'] ?> alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Autotech</span>
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
            <h1 class="m-0 text-white">Proveedor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tablero.php">Inicio</a></li>
              <li class="breadcrumb-item active text-white">Proveedor</li>
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
                <h3 class="card-title">Lista de Proveedor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nit</th>
                    <th>Razon Social</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    require_once 'Controlador/proveedorController.php';
                   $proveedor = new ControladorProveedor();
                    $list=  $proveedor -> ctrListarProveedor(1,1000);
                    
                    while (count($list)>0){
                      $Proveedor = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($Proveedor);
                      echo "<td>".$Did."</td>";
                      $Dnit = array_shift($Proveedor);
                      echo "<td>".$Dnit."</td>";
                      $Drazon_social = array_shift($Proveedor);
                      echo "<td>".$Drazon_social."</td>";
                      $Dtelefono = array_shift($Proveedor);
                      echo "<td>".$Dtelefono."</td>";
                      $Ddirección = array_shift($Proveedor);
                      echo "<td>".$Ddirección."</td>";
                      $Dcorreo = array_shift($Proveedor);
                      echo "<td>".$Dcorreo."</td>";
                   
                      
                      echo '<td>
                              <button class="btn" onclick="saveData('.$Did.',\''.$Dnit.'\','.$Drazon_social.',\''.$Dtelefono.'\','.$Ddirección.',\''.$Dcorreo.'\')"><i class="fas fa-edit"></i> Editar</button>
                                                  
                              <form action="deleteproveedor.php" class="d-inline" method="post" >
                              <input type="hidden" id="idproveedor" name="idproveedor" value="'.$Did .'" />
                               <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form> 
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
                <h3 class="card-title"><label id="TituloUser">Agregar Proveedor</label> </h3> 
                <button id="nuevoproveedor" class="btn float-right" onclick="newUser()" > <i class="fas fa-user-plus"></i> Nuevo Proveedor</button>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"  enctype="multipart/form-data" method="post"   >
                <div class="card-body">
                  <div class="form-group">
                    
                    <input type="hidden"  class="form-control"  id="id" name="id" placeholder="ID" value="0" readonly="true">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Nit</label>
                    <input type="text" class="form-control" id="nit" name="nit" placeholder="Ingrese el nombre del almacen">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Razon Social</label>
                    <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Ingrese el nombre del almacen">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el nombre del almacen">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Dirección</label>
                    <input type="text" class="form-control" id="dirección" name="dirección" placeholder="Ingrese el nombre del almacen">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Correo</label>
                    <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese el nombre del almacen">
                  </div>
                  

                 
                  
                 
                  
               
                <!-- /.card-body -->

                <div class="card-footer">
                  <?php
                  
                    $resp= $proveedor -> ctrRegistroProveedor();
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
        
        <a href="exportarusuarioweb.php" class="btn btn-success">Descargar Excel</a>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
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
  function saveData(id,nit,razon_social,telefono,dirección,correo){
    document.getElementById("id").value = id;
    document.getElementById("nit").value = nit;
    document.getElementById("razon_social").value = razon_social;
    document.getElementById("telefono").value = telefono;
    document.getElementById("dirección").value = dirección;
    document.getElementById("correo").value = correo;
  
   
    $('#TituloUser').text("Editar proveedor");
//    document.getElementById("TituloUser").value = "Editar Usuario";  
  }
  
  function newUser(){
    document.getElementById("id").value = 0;

        document.getElementById("nit").value = 0;
        document.getElementById("razon_social").value = "";
        document.getElementById("telefono").value = 0;
        document.getElementById("dirección").value = "";
        document.getElementById("correo").value = "";
        
    
   
    $('#TituloUser').text("Agregar Proveedor");
  //  document.getElementById("TituloUser").value = "Agregar Usuario";  
  }
  
 /* function updateStatus(id){
      var parametros = {
                "id" : id
            
        };
      
      $.ajax({
        type: "POST",
        url: "estadovehiculo.php",
        data: parametros,
        success:function( msg ) {
          window.location.href = window.location.href;
         //alert( "Data actualizada. " + msg );
        }
       });
  }*/
  
</script>

</body>
</html>
