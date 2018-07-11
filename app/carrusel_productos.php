<?php
  require_once('conection.php');
  $conexion = new Conexion();
  $where = array();
  $formAction = "carrusel_productos.php";

  if(isset($_GET["id"])){
    $where["id !"] = $_GET["id"];
    $formAction .= "?id=".$_GET["id"];
  }

  if(isset($_POST["id"])){
    $where["id !"] = $_POST["id"];
    $formAction .= "?id=".$_POST["id"];;
  }

  $debug = false;
  $busqueda = false;
  if(isset($_POST["busqueda"])){
    $busqueda = $_POST["busqueda"];
    $where["_like_"] = "(lower(name) like '%".strtolower($_POST["busqueda"])."%' or lower(artista) like '%".strtolower($_POST["busqueda"])."%')";
  }

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
      <form class="find_form buscadorCarrusel" action="<?=$formAction;?>" method="post">
        <fieldset>
          <input type="text" name="busqueda" value="<?=$busqueda;?>" placeholder="Busca tu música" class="inputBuscadorCarrusel"/>
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

<script type="text/javascript">
  $(document).ready(function(){
    var timeout;
    $("body").off("keyup", ".inputBuscadorCarrusel");
    $("body").on("keyup", ".inputBuscadorCarrusel", function(e){
      clearTimeout(timeout);
      timeout = setTimeout(function(){
        let url = $(".buscadorCarrusel").attr("action");
        $.ajax({
          url: url,
          type: "post",
          data: $(".buscadorCarrusel").serialize(),
          beforeSend: function(){},
          success:function(response){
            $(".contenedorCarusel").html(response);
            $('.carrusel').slick({
              infinite: false,
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplay: true,
              autoplaySpeed: 5000,
              arrows: true
            });
          },
          complete: function(status, xhr){

          }
        })
      }, 500);
    });
  });
</script>