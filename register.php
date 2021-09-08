<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bago | Pagina de Registro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
    <!-- Bago style -->
  <link rel="stylesheet" href="css/bagostyle.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page hero-image">
<div class="register-box ">
  <div class="register-logo">
    <a href="tablero.php"><img src="images/Logo_Bago-completo_blanco.png" height="150" width="350" alt="Logo Image" ></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registra un nuevo Usuario</p>

      <form action="" method="post">
      <div class="input-group mb-3">
      <input type="hidden"  class="form-control"  id="id" name="id" placeholder="ID" value="0" readonly="true">
         
        </div>
        <div class="input-group mb-3">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su Nombre"> 
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Ingrese su Apellido">
                     <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="text" class="form-control" id="materno" name="materno" placeholder="Ingrese su Apellido">
                   <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <select class="form-control select2" id="rol" name="rol"  style="width: 100%;"> 
                    <?php
                      
                      require_once 'Controlador/usuarioController.php';
                     
                     $rol = new ControladorUsuario();
                      $list=  $rol -> ctrListarRolSelect();
                    
                      while (count($list)>0){
                        $User = array_shift($list);
                        $Did = array_shift($User);
                        $Dnombres = array_shift($User);
                        echo '<option value="'.$Did.'">'.$Dnombres.'</option>';
                      }
                    ?>
                    </select>      
        </div>  
      <div class="input-group mb-3">
      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su Usuario"> 
      <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
        <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese su Contraseña">
             <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repita su Contraseña">
                 <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               Acepto los <a href="#">Terminos y Servicios</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
          <?php
                      require_once 'Controlador/usuarioController.php';
                      $usuario = new ControladorUsuario();
                   
                  $resp= $usuario -> ctrRegistroUsuario();
                  //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                  if ($resp=="true"){
                    //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                   //  echo "<meta http-equiv='refresh' content='0'>";
                     header('location: login.php');
                  }elseif($resp=="false"){
                    //echo "<script> alert(' respuesta: al parecer fue falso XD')</script>";
                  }else{
                    //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                  }
                  
                ?>
            <button type="submit" class="btn btn-primary btn-block" value="Enviar">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="login.php" class="text-center">Ya me encuentro registrado</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
