<?php
  include('header.php');
  include('menu.php');

  if(isset($_POST["crear"]) && $_POST["crear"]=="Crear"){
		$conexion = new Conexion();
		$ID = $conexion->save(array(
			"table" => "user",
			"data" => array(
				"username" => $_POST["username"],
				"name" => $_POST["name"],
				"mail" => $_POST["mail"],
				"pass" => $_POST["pass"],
				"time" => array("function" => "NOW()"),
				"isadmin" => "0"
			),
		));

  /*$cuerpo="El usuario ".$_POST['name']." Se ha registrado en la super tienda de rayitas:
	Nombre: ".$_POST['name']."
	Email: ".$_POST['mail']."
	Teléfono: ".$_POST['tel']."
	Dirección: ".$_POST['adress']."
	Pais: ".$_POST['country']."
	Usuario: ".$_POST['username']."
	Clave: ".$_POST['pass']."
	_______________________________________________
	";

	$cabecera = "From: ".$_POST['name']."<".$_POST['mail'].">\n";
	$cabecera .= "Reply-To: ".$_row['mail']."\n";
	$cabecera .= "Bcc: lu.ramirezv@profesor.duoc.cl\n";
	$destinatario="zurita.salgado.fabian@gmail.com";
	$asunto="Gracias bienvenido a Rayitas";
	mail("$destinatario", "$asunto", "$cuerpo", "$cabecera");


    if($ID) header("Location: index.php");*/
  }



?>
<!--Formulario Registro-->
<?php /*<section>
  <div class="container">
    <h1>Resgistro <span class="badge badge-secondary">Crear Nuevo</span></h1>
    <!--ssasasas-->
    <form id="registrar" name="registrar" method="post" action="">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" placeholder="Ingrese Nombre" name="name" required>
      </div>
      <div class="form-group">
        <label for="mail">Email</label>
        <input type="email" class="form-control" id="mail" placeholder="ejemplo@ejemplo.com" name="mail" required>
      </div>
      <div class="form-group">
        <label for="tel">Teléfono</label>
        <input type="text" class="form-control" id="tel" placeholder="+(56)9 1234 5678" name="tel" required>
      </div>
      <div class="form-group">
        <label for="country">País</label>
        <select class="form-control" id="country" name="country">
          <option value="chile">Chile</option>
          <option value="argentina">Argentina</option>
          <option value="peru">Peru</option>
          <option value="rusia">Rusia</option>
          <option value="italia">Italia</option>
        </select>
      </div>
      <div class="form-group">
        <label for="adress">Dirección</label>
        <input type="text" class="form-control" id="adress" placeholder="Calle falsa 123, VillaSana" name="adress" required>
      </div>
      <div class="form-group">
        <label for="user">Usuario</label>
        <input type="text" class="form-control" id="username" placeholder="Ingrese nombre de usuario" name="username" required>
      </div>
      <div class="form-group">
        <label for="pass">Contraseña</label>
        <input type="password" class="form-control" id="pass" placeholder="Ingrese su clave" name="pass" required>
      </div>
      <div class="form-group">
        <label for="admin">Es Administrador</label>
        <select class="form-control" id="admin" name="admin">
          <option value="0">No</option>
          <option value="1">Si</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="registrar" value="Registrar" class="btn btn-primary"/>
      </div>
    </form>
  </div>
</section>*/?>

<section class="contact">
  <div class="contact_content hide">
    <h2>Crear Cuenta</h2>
    <form id="registrar" name="crear" method="post" action="" class="contact_form">
      <div class="contact_group">
        <label for="username">Nombre de usuario</label>
        <input type="text" id="username" placeholder="Nombre de usuario" name="username" required>
      </div>
      <div class="contact_group">
        <label for="name">¿Cúal es tu nombre?</label>
        <input type="text" id="name" placeholder="¿Cúal es tu nombre?" name="name" required>
      </div>
      <div class="contact_group">
        <label for="mail">¿Y tú Email?</label>
        <input type="email" id="mail" placeholder="¿Y tú Email?" name="mail" required>
      </div>
      <div class="contact_group">
        <label for="pass">Contraseña</label>
        <input type="password" id="pass" placeholder="Contraseña" name="pass" required>
      </div>
      <div class="contact_group">
        <input type="submit" name="crear" value="Crear" class="link red"/>
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
