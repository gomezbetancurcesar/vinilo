<?php

  if(isset($_POST["contact"]) && $_POST["contact"]=="ENVIAR"){
    $conexion = new Conexion();
    $ID = $conexion->save(array(
			"table" => "contacts",
			"data" => array(
				"name" => $_POST["name"],
				"lastname" => $_POST["lastname"],
				"mail" => $_POST["mail"],
				"text" => $_POST["textarea"],
				"time" => array("function" => "NOW()")
			),
		));
    
/*    
    if($ID){
      $body = "El usuario ".$_POST['name']." se ha contacto con el sitio de rayitas:
      Nombre: ".$_POST['name']."
      Email : ".$_POST['mail']."
      Asunto: ".$_POST['asun']."
      Mensaje: ".$_POST['msj']."
      ----------------------------------
      ";
  
      $head = "From: ".$_POST['name']."<".$_POST['mail'].">\n";
      $head .= "Reply-To: ".$_POST['mail']."\n";
      $head .= "Cc: zurita.salgado.fabian@gmail.com\n";
      $destinatario .= $_POST['mail'];
      $type = "Contacto - de -".$_POST['name'];
      mail("$destinatario", "$type", "$body", "$head");
    }
*/
    
    //if($ID) header("Location: index.php");
  }
?>
<!--Formulario Registro-->
<section class="contact">
  <div class="contact_content">
    <h2>CONTACTANOS</h2>
    <form id="contact" name="contact" method="post" action="" class="contact_form">
      <div class="contact_group">
        <label for="name">Nombre</label>
        <input type="text" id="name" placeholder="Tu nombre" name="name" required>
      </div>
      <div class="contact_group">
        <label for="lastname">Tu apellido</label>
        <input type="text" id="lastname" placeholder="Tu apellido" name="lastname" required>
      </div>
      <div class="contact_group">
        <label for="mail">Email</label>
        <input type="email" id="mail" placeholder="Tu EMAIL" name="mail" required>
      </div>
      <div class="contact_group">
        <label for="msj">Ingresa tu mensaje</label>
        <textarea name="textarea" id="msj" placeholder="Ingresa tu mensaje" required></textarea>
      </div>
      <div class="contact_group">
        <input type="submit" name="contact" value="ENVIAR" class="link red"/>
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
