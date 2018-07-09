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

<section class="bio">
  <div class="bio_row">
    <h3>Biblioteca</h3>
    <input type="text" name="search_list" value="" placeholder="Artista o album" class="bio_intext">
  </div>
  <div class="bio_content">
    <h2>RESUMEN Y BOLETA</h2>
    <div class="bio_list">
      <div class="bio_item active">
        <img src="" alt="">
        <h4>The world wont listen</h4>
        <p class="bio_subtitle">the smith</p>
        <p class="bio_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, .</p>
        <div class="buttom">
          <a href="#" title="Ver más" class="rrss_item ico arrow">ver más</a>
          <a href="#" title="Agregar al carro" class="rrss_item ico shop">carrito</a>
        </div>
      </div>
      <div class="bio_item">
        <img src="" alt="">
        <h4>The world wont listen</h4>
        <p class="bio_subtitle">the smith</p>
        <p class="bio_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, .</p>
        <div class="buttom">
          <a href="#" title="Ver más" class="rrss_item ico arrow">ver más</a>
          <a href="#" title="Agregar al carro" class="rrss_item ico shop">carrito</a>
        </div>
      </div>
    </div>
  <div class="bio_aside">
    <div class="rrss">
      <a href="#" title="Ir a facebook" class="rrss_item ico facebook">facebook</a>
      <a href="#" title="Ir a instagram" class="rrss_item ico instagram">instagram</a>
      <a href="#" title="Ir a youtube" class="rrss_item ico youtube">youtube</a>
    </div>
  </div>
</section>


<?php include('contact.php'); ?>
<!--End of content-->
<?php include('footer.php'); ?>
