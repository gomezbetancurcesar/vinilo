<?php require_once('../conection.php');

if(!isset($_SESSION))session_start();

if((isset($_POST[username]) && $_POST[username]<>"") && (isset($_POST[pass]) && $_POST[pass]<>"") ){
		$query="SELECT * FROM clients WHERE 1 AND username='$_POST[username]' AND pass='$_POST[pass]' AND admin='1' ";
		$resource=$conn->query($query);
		if($t=$resource->num_rows){
		$row=$resource->fetch_assoc();
		$_SESSION[adminid]=$row[id];
		$_SESSION[name]=$row[name];
		$_SESSION[mail]=$row[mail];
		$_SESSION[tel]=$row[tel];
		$_SESSION[country]=$row[country];
		$_SESSION[adress]=$row[adress];

		$volver=($_SESSION[volverad])?$_SESSION[volverad]:"index.php";
	  header("Location: ".$volver);
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
