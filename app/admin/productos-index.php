<?php
  include('header.php');
  $activePage = "productos-index.php";
  include('menu.php');
  $conexion = new Conexion();

  $productos = $conexion->find("all", array(
                      "table" => "products"
  ));
?>
<!--Formulario Registro-->
<section>
  <div class="container">
    <div class="col-md-12">
      <h1>Listado productos</h1>
      <a href="productos-formulario.php" class="btn btn-primary">Agregar producto</a>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th></th>
          <th>Código</th>
          <th>Nombre</th>
          <th>Artista</th>
          <th>Categoría</th>
          <th>Precio</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($productos as $key => $producto) {
            ?>
            <tr>
              <td>
                <?php
                  $path = $_SERVER["SCRIPT_FILENAME"]."/../..";
                  $img = "/img/".$producto["code"].".jpg";
                ?>
                <img src="<?=$img;?>" width="60px">
              </td>
              <td>
                <?=$producto["code"];?>
              </td>
              <td>
                <?=$producto["name"];?>
              </td>
              <td>
                <?=$producto["artista"];?>
              </td>
              <td>
                <?=$producto["category"];?>
              </td>
              <td>
                <?=peso($producto["price"]);?>
              </td>
              <td>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Acciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <a class="dropdown-item" href="productos-formulario.php?id=<?=$producto["id"]?>">Editar</a>
                      <a class="dropdown-item" href="#">Tracklist</a>
                       <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="productos-formulario.php?action=remove&id=<?=$producto["id"]?>">Eliminar</a>
                    </div>
                  </div>
              </td>
            </tr>
            <?php
          }
        ?>
        <tr></tr>
      </tbody>
    </table>
  </div>
</section>
<!--Formulario Registro-->
<?php include('../footer.php'); ?>
