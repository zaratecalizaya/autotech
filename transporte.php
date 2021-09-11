

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AutoTech</title>
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
      <img src="" alt="" class="brand-image img-circle elevation-3"
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
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./tablero.php" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tablero
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="Almacen.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Almacen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Repuesto.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Repuestos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Categoria.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Vehiculo.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehiculo</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Ingresos.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Proveedor.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Consultar Compras
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./consulta_compra.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consultar Compras</p>
                </a>
              </li>
              
            </ul>
            
          </li>
          <li class="nav-item ">
            <a href="./Configuraciones.php" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Configuraciones
             
              </p>
            </a>
          
          </li>
        </ul>
      </nav>
    
    
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
            <h1 class="m-0 text-white">Transporte</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tableroAlmacenero.php">Inicio</a></li>
              <li class="breadcrumb-item active text-white">Transporte</li>
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
                <h3 class="card-title">Lista de Transporte</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Placa</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                
                    
                  </thead>
                  <tbody>
                 <?php 
                    require_once 'Controlador/transporteController.php';
  
                  
                    $ctransporte = new ControladorTransporte();
                    $list=  $ctransporte -> ctrListarTransporte(1,1000);
                    
                    while (count($list)>0){
                      $Transporte = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($Transporte );
                      echo "<td>".$Did."</td>";
                      $Dmarca = array_shift($Transporte);
                      echo "<td>".$Dmarca."</td>";
                      $Dplaca = array_shift($Transporte);
                      echo "<td>".$Dplaca."</td>";
                      $Dtipo = array_shift($Transporte);
                      echo "<td>".$Dtipo."</td>";
                      $Did_repartidor = array_shift($Transporte);
                      echo "<td>".$D."</td>";
                      $Destado = array_shift($Transporte);
                      $Destadobtn="Habilitar";
                      $DestadoIco="thumbs-up";
                      echo "<td>".$Destado."</td>";
                      if ($Destado=="Habilitado"){
                        $Destadobtn="Deshabilitar";
                        $DestadoIco="thumbs-down";
                      }  
                    
                      echo '<td>
                      <button class="btn" onclick="saveData('.$Did.',\''.$Dmarca.'\',\''.$Dplaca.'\',\''.$Dtipo.'\')"><i class="fas fa-edit"></i> Editar</button> 
                      <button class="btn" onclick="updateStatus('.$Did.')"><i class="far fa-'.$DestadoIco.'"></i>'.$Destadobtn.'</button>
                     
                      <form action="deletetransporte.php" class="d-inline" method="post" >
                      <input type="hidden" id="idtransporte" name="idtransporte" value="'.$Did .'" />
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
                <h3 class="card-title"><label id="TituloUser">Agregar Transporte</label> </h3> 
                <button id="nuevoNivel" class="btn float-right" onclick="newUser()" > <i class="fas fa-user-plus"></i> Nuevo Transporte</button>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data"  method="post"   >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputId"></label>
                    <input type="hidden"  class="form-control"  id="id" name="id" placeholder="ID" value="0" readonly="true">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese la marca">
                  </div>
                  <div class="form-group">
                    <label for="InputUsuario">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingrese el placa">
                  </div>
                   
                   
                
    
    
    <div class="form-group">
    <label for="InputUsuario">Tipo</label>  
                    <select class="form-control select2"  id="tipo" name="tipo"  style="width: 100%;"  placeholder="Ingrese el tipo"> 
                      <option selected="selected">Auto</option>
                      <option>Camion</option>
                      <option>Moto</option>
                     
                    
                    </select>
                  </div>
                  <div class="form-group">
    <label for="InputUsuario">Nombre</label>  
                    <select class="form-control select2"  id="nombre" name="nombre"  style="width: 100%;"  placeholder="seleccione repartidor"> 
                    <option selected="selected">seleccione</option>
                                                <?php
                                                   require_once 'Controlador/repartidorController.php';
                     
                                                     $cusuario = new ControladorRepartidor();
                                                     $list=  $cusuario -> listarrepartidorselect();
                    
                                                        while (count($list)>0){
                                                          $User = array_shift($list);
                                                          $Did = array_shift($User);
                                                          $Dnombres = array_shift($User);
                                                          
                                                          echo '<option value="'.$Did.'">'.$Dnombres.'</option>';
                                                        }
                                                 ?>
                                          

                      <option></option>
                      
                     
                    
                    </select>
                  </div>
                  
                </div>
                   
                

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <?php
                    $resp= $ctransporte -> ctrRegistroTransporte();
                    //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                    if ($resp=="true"){
                     // echo "<script> alert(' respuesta: ".$resp." ')</script>";
                       echo "<meta http-equiv='refresh' content='0'>";
                    }elseif($resp=="false"){
                      //echo "<script> alert(' respuesta: al parecer fue falso XD')</script>";
                    }else{  
                      if ($resp!=""){
                      echo "<script> alert(' respuesta: ".$resp." ')</script>";
                    } }
                    
                  ?>
                  
                  <input type="submit" class="btn btn-primary" value="Enviar">
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
       
      <div class="card-footer">
        
       <!-- <a href="exportarniveles.php" class="btn btn-success">Descargar Excel</a>-->
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

 
   
  
  function saveData(id, marca, placa, tipo){
    document.getElementById("id").value = id;
    document.getElementById("marca").value = marca;
    document.getElementById("placa").value = placa;
    document.getElementById("tipo").value = tipo;
 
 
    $('#TituloUser').text("Editar Transporte");
 //    document.getElementById("TituloUser").value = "Editar Usuario";  
  }
  
  function newUser(){
    document.getElementById("id").value = 0;
    document.getElementById("marca").value = "";
    document.getElementById("placa").value = "";
    document.getElementById("tipo").value = "";
   
     
    
    $('#TituloUser').text("Agregar Transporte");
  //  document.getElementById("TituloUser").value = "Agregar Usuario";  
  }
  
   
  function updateStatus(id){
      var parametros = {
                "id" : id,
        
              
        };
      
      $.ajax({
        type: "POST",
        url: "estadotransporte.php",
        data: parametros,
        success:function( msg ) {
          window.location.href = window.location.href;
        // alert( "Data actualizada. " + msg );
        }
       });
  }
 
</script>

<!-- Usuario SCRIPTS -->
<script src="build/js/Usuarios.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- PAGE SCRIPTS -->
</body>
</html>
