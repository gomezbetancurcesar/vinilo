<?php require_once('../conection.php');

$error = null;
if(!isset($_SESSION))session_start();

if(!empty($_POST)){
	if((isset($_POST["username"]) && $_POST["username"]<>"") && (isset($_POST["pass"]) && $_POST["pass"]<>"") ){
		$conexion = new Conexion();
		$usuario = $conexion->find("first", array(
			"table" => "user",
			"where" => array(
				"username" => $_POST["username"],
				"pass" => $_POST["pass"],
				"isadmin" => 1
			)
		));
		
		if(!empty($usuario)){
			$_SESSION["adminid"]=$usuario["id"];
			$_SESSION["name"]=$usuario["name"];
			//$_SESSION["mail"]=$usuario["mail"];
			//$_SESSION["tel"]=$usuario["tel"];
			//$_SESSION["country"]=$usuario["country"];
			//$_SESSION["adress"]=$usuario["adress"];
			
			$volver=($_SESSION["volverad"])?$_SESSION["volverad"]:"productos-index.php";
			header("Location: ".$volver);
		}else{
			$error="Usuario/Clave no registrados";
		}
	} else {
		$error="Usuario/Clave no registrados";
	}
}
?>

<!DOCTYPE html>
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
        <h1>Login <span class="badge badge-secondary">Administrador</span></h1>
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
</html>
