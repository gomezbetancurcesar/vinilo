<?php
  include('header.php');
  $activePage = "productos-index.php";
  include('menu.php');
  $conexion = new Conexion();

  $producto = array();

  $label = "Agregar producto";
  $subtitulo = "Crear nuevo";

  if(isset($_POST["registrar"]) && $_POST["registrar"]=="Registrar"){
    $array = array(
      "table" => "products",
      "data" => array(
        "name" => $_POST["name"],
        "artista" => $_POST["artista"],
        "category" => $_POST["category"],
        "text" => $_POST["text"],
        "price" => $_POST["price"],
      ),
    );

    if(isset($_POST["code"]))
      $array["data"]["code"] = $_POST["code"];

    if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])){
      $imgFolder = dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR;
      move_uploaded_file($_FILES["file"]["tmp_name"], $imgFolder.$_POST["code"].".jpg");
    }

    if(isset($_POST["id"])){
      $array["where"]["id"] = $_POST["id"];
      $conexion->save($array);
      header("Location: productos-index.php");
    }else{
      $ID = $conexion->save($array);
      if($ID) header("Location: productos-index.php");
    }

  }else{
    if(isset($_GET["id"])){
      $label = "Editar producto";
      $subtitulo = "Editar datos";
      $producto = $conexion->find("first", array(
                                "table" => "products",
                                "where" => [
                                  "id" => $_GET["id"]
                                ]
      ));
    }
  }

  $categorias = $conexion->find("list", array(
                      "table" => "products",
                      "fields" => "DISTINCT(category)"
  ));
  $artistas = $conexion->find("list", array(
                      "table" => "products",
                      "fields" => "DISTINCT(artista)"
  ));
?>
<!--Formulario Registro-->
<section>
  <div class="container">
    <h1><?=$label;?> <span class="badge badge-secondary"><?=$subtitulo;?></span></h1>
    <!--ssasasas-->
    <form id="registrar" name="registrar" method="post" action="" enctype="multipart/form-data">
      <?php
        if(isset($producto["id"])){
          echo "<input type='hidden' name='id' value='".$producto["id"]."'>";
          echo "<input type='hidden' name='code' value='".$producto["code"]."'>";
        }
      ?>
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" placeholder="Ingrese Nombre" name="name" required <?php if(isset($producto["name"])){ echo "value='".$producto["name"]."'";}?> >
      </div>
      <div class="form-group">
        <label for="code">Código</label>
        <input type="text" class="form-control" placeholder="xxxx45" name="code" required <?php if(isset($producto["code"])){ echo "value='".$producto["code"]."' disabled";}?> >
      </div>
      <div class="form-group">
        <label for="code">Carátula</label>
        <input type="file" class="form-control" placeholder="Seleccione" name="file" accept=".jpg, .jpeg" <?php if(!isset($producto["id"])){ echo "required"; }?> >
      </div>
      <div class="form-group">
        <label for="category">Categoria</label>
        <select class="form-control" name="category">
          <option value="">Seleccione</option>
          <?php
            foreach ($categorias as $id => $categoria){
              $selected = false;
              if(isset($producto["category"]) && ($id == $producto["category"]))
                $selected = "selected";
              ?>
              <option value="<?=$id?>"  <?=$selected;?> ><?=$categoria;?></option>
              <?php
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="category">Artista</label>
        <select class="form-control" name="artista">
          <option value="">Seleccione</option>
          <?php
            foreach ($artistas as $id => $artista){
              $selected = false;
              if(isset($producto["artista"]) && ($id == $producto["artista"]))
                $selected = "selected";
              ?>
              <option value="<?=$id?>" <?=$selected;?> ><?=$artista;?></option>
              <?php
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" rows="5" placeholder="Ingrese el texto..." name="text" required><?php if(isset($producto["text"])){ echo $producto["text"];}?></textarea>
      </div>
      <div class="form-group">
        <label for="price">Precio</label>
        <input type="number" class="form-control" placeholder="ejemplo: 1000" name="price" required <?php if(isset($producto["price"])){ echo "value='".$producto["price"]."'";}?> >
      </div>
      <div class="form-group">
        <input type="submit" name="registrar" value="Registrar" class="btn btn-primary"/>
      </div>
    </form>
  </div>
</section>
<!--Formulario Registro-->
<?php include('../footer.php'); ?>
