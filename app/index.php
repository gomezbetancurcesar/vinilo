<?php
  include('header.php');
  $activePage = "index.php";
  include('menu.php');

  /*$max = 5;
  $pag = 0;

  if(isset($_GET[pag]) && $_GET[pag] <> ""){
    $pag = $_GET[pag];
  }

  if(isset($_GET[search]) && $_GET[search] <> ""){
    $query = "SELECT id, name, phrase_sale, price, code, sale FROM producto WHERE (`name` LIKE '%".$_GET[search]."%')";
  }else{
    $query = "SELECT id, name, phrase_sale, price, code, sale FROM producto";
  }
  $inicio = $pag * $max;
  $query_limit= $query ." LIMIT $inicio,$max";

  $resource = $conn->query($query_limit);
  $total = $resource->num_rows;

  if (isset($_GET[total])) {
    $total = $_GET[total];
  } else {
    $resource_total = $conn -> query($query);
    $total = $resource_total->num_rows;
  }
  $total_pag = ceil($total/$max)-1;
  $pagesTotal = $total / $max;*/

?>

<!--Body of content-->

<?php /*<section>
  <div class="container">
    <h1>Inicio <span class="badge badge-secondary">Listado de rayitas</span></h1>
    <!--Listado-->
    <?php
    if($total){
      while($row = $resource->fetch_assoc()){
    ?>
      <div class="row">
      <div class="col-2">
        <div class="image">
          <img src="assets/img/<?php echo $row['code'];?>.jpg" alt="imagen rayita">
        </div>
      </div>
      <div class="col-6">
        <?php if($row['sale']=="1"){ ?>
          <img src="assets/img/sale.png" alt="imagen promocional" class="imgSale"/>
        <?php } ?>
        <p><?php echo $row['name']; ?></p>
        <p><?php echo $row['phrase_sale']; ?></p>
      </div>
      <div class="col-4">
        <p><?php echo "$".number_format($row['price'], 0, ',', '.'); ?></p>
        <a href="producto.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Ver más</a>
      </div>
    </div>
    <?php
      }
    }else{
    ?>
      <h2>No se han encontrado productos :c</h2>

    <?php }?>
    <nav aria-label="Page navigation center">
      <ul class="pagination">
        <?php if($pag-1 >= 0){?>
          <li class="page-item"><a class="page-link" href="index.php?pag=<?php echo $pag -1;?>&total=<?php echo $total?>">Anterior</a></li>
        <?php }
        for ($i=0; $i < $pagesTotal; $i++) {?>
          <li class="page-item <?php if($pag == $i){ echo 'active'; } ?>"><a class="page-link" href="index.php?pag=<?php echo $i?>&total=<?php echo $total?>"><?php echo $i +1;?></a></li>
        <?php }
        if($pag +1 <= $total_pag ){?>
          <li class="page-item"><a class="page-link" href="index.php?pag=<?php echo $pag +1;?>&total=<?php echo $total?>">Siguiente</a></li>
        <?php }?>
      </ul>
    </nav>
  </div>
</section>*/ ?>

<section class="banner">
  <div class="banner_content">
    <div class="banner_info">
    </div>
    <div class="banner_slide">
      <div class="banner_item">
        <img src="dist/images/miriam-hernandez.png" alt="imagen banner">
        <div class="banner_text">
          <p>Album lorem ipsum</p>
          <h2 class="banner_title">Miriam Hérnandez <span>$10.000</span></h2>
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
    <div class="buttom">
      <a href="#" title="Ver más" class="rrss_item ico arrow">ver más</a>
      <a href="#" title="Agregar al carro" class="rrss_item ico shop">carrito</a>
    </div>
  </div>
</section>


<?php include('contact.php'); ?>
<!--End of content-->
<?php include('footer.php'); ?>
