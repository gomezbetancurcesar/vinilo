<?php
  include('header.php');
  $activePage = "producto-agregar.php";
  include('menu.php');

  if(isset($_POST[registrar]) && $_POST[registrar]=="Registrar"){
    $queryInsert= "INSERT INTO producto (id, name, code, category, phrase_sale, description, colors, price, availability, sale, date) VALUES (NULL,'$_POST[name]','$_POST[code]','$_POST[category]','$_POST[phrase_sale]', '$_POST[description]', '$_POST[colors]', '$_POST[price]', '$_POST[availability]', '$_POST[sale]',NOW())";
    $conn->query($queryInsert);
    $ID = $conn->insert_id;
    if($ID) header("Location: index.php");
  }
?>
<!--Formulario Registro-->
<section>
  <div class="container">
    <h1>Agregar producto <span class="badge badge-secondary">Crear Nuevo</span></h1>
    <!--ssasasas-->
    <form id="registrar" name="registrar" method="post" action="">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" placeholder="Ingrese Nombre" name="name" required>
      </div>

      <div class="form-group">
        <label for="code">Código</label>
        <input type="text" class="form-control" placeholder="xxxx45" name="code" required>
      </div>
      <div class="form-group">
        <label for="category">Categoria</label>
        <select class="form-control" name="category">
          <option value="vertical">Vertical</option>
          <option value="horizontal">Horizontal</option>
          <option value="curva">Curva</option>
          <option value="circular">Circular</option>
          <option value="invisible">Invisible</option>
        </select>
      </div>
      <div class="form-group">
        <label for="phrase_sale">Frase promocional</label>
        <textarea class="form-control" rows="5" placeholder="Ingrese frase..." name="phrase_sale" required></textarea>
      </div>
      <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" rows="5" placeholder="Ingrese el texto..." name="description" required></textarea>
      </div>
      <div class="form-group">
        <label for="colors">Color</label>
        <select class="form-control" name="colors">
          <option value="rojo">Rojo</option>
          <option value="azul">Azul</option>
          <option value="negro">Negro</option>
          <option value="verde">Verde</option>
        </select>
      </div>
      <div class="form-group">
        <label for="price">Precio</label>
        <input type="number" class="form-control" placeholder="ejemplo: 1000" name="price" required>
      </div>
      <div class="form-group">
        <label for="availability">¿Tiene Stock?</label>
        <select class="form-control" name="availability" required>
          <option value="0">No</option>
          <option value="1">Si</option>
        </select>
      </div>
      <div class="form-group">
        <label for="sale">¿En Oferta?</label>
        <select class="form-control" name="sale" required>
          <option value="0">No</option>
          <option value="1">Si</option>
        </select>
      </div>

      <div class="form-group">
        <input type="submit" name="registrar" value="Registrar" class="btn btn-primary"/>
      </div>
    </form>
  </div>
</section>
<!--Formulario Registro-->
<?php include('../footer.php'); ?>
