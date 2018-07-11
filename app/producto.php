<?php
  include('header.php');
  include('menu.php');

  $errorPage = 0;

  $conexion = new Conexion();
  $producto = $conexion->find("first", array(
                              "table" => "products",
                              "where" => array(
                                "id" => $_GET["id"]
                              )
  ));

  //Validación de ID
  /*if($_GET[id] == ""){
    $errorPage = 1;
  }else{
    $query = "SELECT * FROM producto WHERE 1 AND id='$_GET[id]'";
    $resource = $conn->query($query);
    $total = $resource->num_rows;
    $row = $resource->fetch_assoc();

    //Query de compra

    if(isset($_POST[comprar]) && $_POST[comprar]=="comprar"){
      $queryInsert= "INSERT INTO compras (id, client, code, name, price, mount, date) VALUES (NULL,'$_POST[client]','$_POST[code]','$_POST[name]','$_POST[price]', '$_POST[mount]',NOW())";
      $conn->query($queryInsert);
      $ID = $conn->insert_id;
      if($ID) header("Location: boleta.php");
    }
  }*/
?>
<!--start of content-->
<?php /*<section>
  <div class="container">
    <?php if($errorPage != 1){ ?>
    <?php if($row['sale']=="1"){ ?>
      <img src="assets/img/sale.png" alt="imagen promocional" class="imgSale"/>
    <?php } ?>
    <h1><?php echo $row['name'];?> <span class="badge badge-secondary">Detalles</span></h1>
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <img src="assets/img/<?php echo $row['code']; ?>.jpg" alt="imagen de rayita">
      </div>
      <div class="col-xs-12 col-md-8">
        <h2><?php echo $row['name'];?> <em><?php echo $row['code'];?></em> </h2>
        <div class="col-xs-12">
          <div class="col-xs-6">
            <p><?php echo nl2br($row['phrase_sale']);?></p>
          </div>
          <div class="col-xs-6">
            <p>Fecha: <em> <?php echo dateArray($row['date']);?></em></p>
            <p>Categoría: <em> <?php echo $row['category'];?></em></p>
            <p>Colores: <em> <?php echo $row['colors'];?></em></p>
          </div>
        </div>
        <p><?php echo nl2br($row['description']);?></p>
        <div class="">
          <div class="">
            <p><strong> $<?php echo number_format($row['price'], 0, ',', '.');?></strong></p>
          </div>
        </div>
      </div>
    </div>
    <!--Formulario de compra-->
    <div class="row">
      <form id="compra" name="compra" method="post" action="">
        <strong>$<?php echo number_format($row['price'], 0, ',', '.');?></strong><br />
        <div class="form-group">
          <label for="mount">Cantidad</label>
          <input type="text" name="mount" class="form-control" id="mount" placeholder="Ingrese la cantidad">
        </div>
        <input name="price" type="hidden" id="precio" value="<?php echo $row['price']; ?>" />
        <input name="code" type="hidden" id="codigo" value="<?php echo $row['code']; ?>" />
        <input name="name" type="hidden" id="nombre" value="<?php echo $row['name']; ?>" />
        <input name="client" type="hidden" id="cliente" value="<?php echo $_SESSION[user_id];?>" />
        <input type="submit" name="comprar" id="comprar" value="comprar" class="btn btn-primary"/>
      </form>
    </div>
    <?php
      }else{
    ?>
      <h1>Error: Página No encontrada!</h1>
      <img src="assets/img/error.png" alt="error 500">
  <?php } ?>
  </div>
</section>*/
  $imgDefault = "dist/images/item-view.jpg";
  $img = "/img/".$producto["code"].".jpg";
?>

<section class="banner">
  <div class="banner_content">
    <div class="banner_info">
      <h2><?=$producto["name"];?></h2>
      <p class="banner_subtitle"><?=$producto["artista"];?></p>
      <p class="banner_letext"><?=nl2br($producto["text"]);?></p>
      <p class="banner_price"><?=peso($producto["price"]);?></p>
    </div>
    <div class="banner_slide">
      <div class="banner_item">
        <img src="<?=$img;?>" alt="imagen banner">
        <div class="buttom alone">
          <a href="/boleta.php?action=add&id=<?=$producto["id"];?>" title="Agregar al carro" class="rrss_item ico shop">carrito</a>
        </div>
        <!---->
      </div>

    </div>
  </div>
  <div class="banner_aside">
    <div class="rrss">
      <a href="#" title="Ir a facebook" class="rrss_item ico facebook">facebook</a>
      <a href="#" title="Ir a instagram" class="rrss_item ico instagram">instagram</a>
      <a href="#" title="Ir a youtube" class="rrss_item ico youtube">youtube</a>
    </div>
  </div>
</section>

<div class="contenedorCarusel">
  <?php 
    $cabeceraCarrusel = "Discos relacionados";
    $buscador = false;
    include('carrusel_productos.php');
  ?>
</div>

<!--End of content-->
<?php include('footer.php'); ?>
