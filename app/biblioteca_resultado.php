<?php
  require_once('conection.php');
  $conexion = new Conexion();
  $where = array();

  if(isset($_POST["busqueda"])){
    $busqueda = $_POST["busqueda"];
    $where["_like_"] = "(lower(name) like '%".strtolower($_POST["busqueda"])."%' or lower(artista) like '%".strtolower($_POST["busqueda"])."%')";
  }
  $productos = $conexion->find("all", array(
                              "table" => "products",
                              "where" => $where
  ));
?>
<div class="bio_list">
  <?php
    if(!empty($productos)){
      foreach ($productos as $key => $producto){
        $img = "/img/".$producto["code"].".jpg";
        $class = false;
        if($key == 0)
          $class = "active";
        ?>
          <div class="bio_item <?=$class;?>">
            <img src="<?=$img;?>" alt="" style="display:none; max-width: 75px;">
            <h4><?=$producto["name"];?></h4>
            <p class="bio_subtitle"><?=$producto["artista"];?></p>
            <p class="bio_text"><?=nl2br($producto["text"]);?></p>
            <div class="buttom">
              <a href="/producto.php?id=<?=$producto["id"];?>" title="Ver más" class="rrss_item ico arrow">ver más</a>
              <a href="/boleta.php?action=add&id=<?=$producto["id"];?>" title="Agregar al carro" class="rrss_item ico shop">carrito</a>
            </div>
          </div>
        <?php
      }
    }else{
      ?>
      <div class="bio_item active">
        <h4>No hay resultados disponibles</h4>
      </div>
      <?php
    }
  ?>
</div>