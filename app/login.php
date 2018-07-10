<?php //require_once('conection.php');

	include('header.php');
	include('menu.php');

	$error="";
  if((isset($_POST["username"]) && $_POST["username"]<>"") && (isset($_POST["pass"]) && $_POST["pass"]<>"") ){
    $conexion = new Conexion();
    $usuario = $conexion->find("first", array(
                              "table" => "user",
                              "where" => array(
                                "username" => $_POST["username"],
                                "pass" => $_POST["pass"],
                              )
    ));
		$_SESSION["user_id"]=$usuario["id"];
		$_SESSION["name"]=$usuario["name"];
		$_SESSION["mail"]=$usuario["mail"];

		$volver=($_SESSION["volver"])?$_SESSION["volver"]:"index.php";
	 header("Location: ".$volver);
	} else {
		$error="Usuario/Clave no registrados";
	}
?>

<?php /*<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!--Styles-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <!--JS-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/global.js"></script>
  </head>
  <body>
    <section>
      <div class="container">
        <h1>Login <span class="badge badge-secondary">Ingrese sus datos</span></h1>
        <!--login error-->
        <?php if($error){?>
          <div class="alert alert-dismissible alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <div><?php echo $error;?></div>
          </div>
        <?php }?>
        <!--ssasasas-->
        <form id="registrar" name="registrar" method="post" action="">
          <div class="form-group">
            <label for="user">Usuario</label>
            <input type="text" class="form-control" id="username" placeholder="Ingrese nombre de usuario" name="username" required>
          </div>
          <div class="form-group">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass" placeholder="Ingrese su clave" name="pass" required>
          </div>
          <div class="form-group">
            <input type="submit" name="ingresar" value="Ingresar" class="btn btn-primary"/>
          </div>
        </form>
      </div>
    </section>
  </body>
</html>*/?>


<section class="contact">
  <div class="contact_content hide">
    <h2>Iniciar Sesión</h2>
		<?php if($error){?>
			<div class="alert alert-dismissible alert-danger" role="alert">
			<div><?php echo $error;?></div>
			</div>
		<?php }?>
    <form id="registrar" name="registrar" method="post" action="" class="contact_form">
      <div class="contact_group">
        <label for="username">Nombre de usuario</label>
        <input type="text" id="name" placeholder="Nombre de usuario" name="username" required>
      </div>
      <div class="contact_group">
        <label for="pass">Contraseña</label>
        <input type="password" id="pass" placeholder="Contraseña" name="pass" required>
      </div>
      <div class="contact_group">
        <input type="submit" name="contact" value="Ingresar" class="link red"/>
      </div>
			<div class="contact_group">
        <p>¿No tienes usuario? <a href="registro.php" title="Crear una cuenta">Crear Cuenta</a></p>
      </div>
    </form>
  </div>
  <div class="contact_aside">
    <div class="rrss">
      <a href="#" title="Ir a facebook" class="rrss_item ico facebook">facebook</a>
      <a href="#" title="Ir a instagram" class="rrss_item ico instagram">instagram</a>
      <a href="#" title="Ir a youtube" class="rrss_item ico youtube">youtube</a>
    </div>
  </div>
</section>


<!--Formulario Registro-->
<?php include('footer.php'); ?>
