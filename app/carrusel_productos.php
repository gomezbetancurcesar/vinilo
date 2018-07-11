<?php
  require_once('conection.php');
  $where = array();
  if(isset($_GET["id"]))
    $where["id !"] = $_GET["id"];

  if(isset($_POST["id"]))
    $where["id !"] = $_POST["id"];

  $productos = $conexion->find("all", array(
                              "table" => "products",
                              "where" => $where
  ));

  if(!isset($cabeceraCarrusel))
    $cabeceraCarrusel = "¿Qué estás buscando?";

  if(!isset($buscador))
    $buscador = true;

?>
<section class="find">
  <h2><?=$cabeceraCarrusel;?></h2>
  <?php 
    if($buscador){
      ?>
      <form class="find_form" action="index.php" method="post">
        <fieldset>
          <input type="text" name="" value="" placeholder="Busca tu musica">
        </fieldset>
      </form>
      <?php
    }
   ?>
  <div class="carrusel find_list">
    <?php 
      foreach ($productos as $key => $producto){
        $img = "/dist/images/item-view.jpg";
        $img = "/img/".$producto["code"].".jpg";
        ?>
          <div class="find_item">
            <div class="find_img">
              <img src="<?=$img;?>" alt="imagen">
            </div>
            <div class="find_info">
              <h3><?=$producto["name"];?></h3>
              <p class="find_subtitle"><?=$producto["artista"];?></p>
              <p class="find_text"><?=nl2br($producto["text"]);?></p>
              <p class="find_price"><?=peso($producto["price"]);?></p>
            </div>
            <div class="find_buttom">
              <a href="/producto.php?id=<?=$producto["id"];?>" title="Ver más" class="rrss_item ico arrow">ver más</a>
              <a href="/boleta.php?action=add&id=<?=$producto["id"];?>" title="Agregar al carro" class="rrss_item ico shop">carrito</a>
            </div>
          </div>
        <?php
      }
     ?>
  </div>
</section>