<?php
  include('header.php');
  //$activePage = "boleta.php";
  include('menu.php');

  if(isset($_GET["action"])){
    $carroSession = array();
    if(isset($_SESSION["carrito"])) $carroSession = $_SESSION["carrito"];

    switch ($_GET["action"]){
      case 'add':
        $conexion = new Conexion();
        $producto = $conexion->find("first", array(
                        "table" => "products",
                        "where" => array(
                          "id" => $_GET["id"]
                        )
        ));
        $key = false;
        foreach ($carroSession as $k => $carro){
          if($carro["id"] == $_GET["id"]){
            debug("aca");
            $key = $k;
            $producto["cantidad"] = $carro["cantidad"] + 1;
            break;
          }
        }

        if($key !== false){
          $carroSession[$key] = $producto;
        }else{
          $producto["cantidad"] = 1;
          $carroSession[] = $producto;
        }
        $_SESSION["carrito"] = $carroSession;
        break;
      case "remove":
        foreach ($carroSession as $key => $carro){
          if($carro["id"] == $_GET["id"]){
            if($carro["cantidad"] == 1){
              unset($carroSession[$key]);
            }else{
              $carroSession[$key]["cantidad"] = $carro["cantidad"] - 1;
            }
          }
        }
        $_SESSION["carrito"] = $carroSession;
        break;
    }

    $volver=($_SESSION["volver"])?$_SESSION["volver"]:"/boleta.php";
    header("Location: ".$volver);
  }

  /*if(isset($_GET[idElm]) && $_GET[idElm]<> ""){
    $queryDelete = "DELETE FROM compras WHERE id=$_GET[idElm]";
    $conn->query($queryDelete);
  }
  $query="SELECT * FROM compras WHERE 1 AND client='$_SESSION[user_id]' ORDER BY date DESC";
  $resource = $conn->query($query);
  $total = $resource->num_rows;*/
?>
<!--Body of content-->
<?php /*<section class="landing">
  <div class="container">
    <h1>Boleta <span class="badge badge-secondary">Detalles</span></h1>
    <!--Table-->
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Total</th>
        </tr>
     </thead>
     <tbody>
       <?php  while ($row = $resource->fetch_assoc()){
          $tmpPrecio = $row[price]*$row[mount];
          $subtotal += $tmpPrecio;
       ?>
       <tr>
         <td>Rayas <?php echo $row[name];?></td>
         <td><?php echo "$".number_format($row[price]);?></td>
         <td><?php echo $row[mount]; ?></td>
         <td><?php echo "$".number_format($row[price]*$row[mount]); ?> <a href="boleta.php?idElm=<?php echo $row[id]; ?>" class="btn btn-danger">Borrar</a></td>
       </tr>
      <?php } ?>
       <tr class="table-active">
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>SubTotal</td>
         <td><?php echo "$".number_format($subtotal); ?></td>
       </tr>
       <?php if($subtotal > 50000){?>
         <tr class="table-success">
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>Descuento 10%</td>
           <td><?php echo "-$".number_format($subtotal*0.1); $subtotal = $subtotal - ($subtotal*0.1); ?></td>
         </tr>
        <?php }
        if($subtotal > 50000){
          $envio = 0;
        }elseif ($subtotal > 25000) {
          $envio = 2000;
        }else{
          $envio = 5000;
        }?>

       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>Envío</td>
         <td><?php echo "$".number_format($envio); ?></td>
       </tr>
       <tr class="table-active">
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>SubTotal</td>
         <td><?php echo "$".number_format($subtotal = $subtotal + $envio); ?></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>IVA 19%</td>
         <td><?php echo "$".number_format($iva = $subtotal*0.19);?></td>
       </tr>
       <tr class="table-active">
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>Total</td>
         <td><?php echo "$".number_format($total = $subtotal+$iva);?></td>
       </tr>
     </tbody>
    </table>

    <div>
      <a href="/buy.php?validate=1" title="comprar..." class="btn btn-success">Comprar</a>
    </div>

  </div>
</section>*/?>

<section class="bag">
  <div class="bag_row">
    <h3>Carrito de compras</h3>
    <div class="bag_list">
      <?php
        $resumen = array(
          "cantidad" => 0,
          "total" => 0
        );
        if(isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])){
          foreach ($_SESSION["carrito"] as $key => $carrito){
            $resumen["cantidad"] += $carrito["cantidad"];
            $resumen["total"] += ($carrito["cantidad"] * $carrito["price"]);

            ?>
            <div class="bag_item">
              <div class="">
                <a href="/producto.php?id=<?=$carrito["id"];?>" class="bag_title"><?=$carrito["name"];?></a>
                <p class="bag_subtitle"><?=$carrito["artista"];?></p>
                <a href="/boleta.php?action=remove&id=<?=$carrito["id"];?>" class="bag_close">close</a>
              </div>
              <p class="bag_price"><?=$carrito["cantidad"]." x ".peso($carrito["price"]);?></p>
            </div>
            <?php
          }
        }else{

        }
      ?>
    </div>
  </div>
  <div class="bag_content">
    <h2>RESUMEN Y BOLETA</h2>
    <div class="bag_info">
      <div class="">
        <p class="bag_span">Cantidad</p>
        <p class="bag_import"><?php echo $resumen["cantidad"];  echo ($resumen["cantidad"]>1?" Vinilos":" Vinilo"); ?> </p>
      </div>
      <div class="">
        <p class="bag_span">Total</p>
        <p class="bag_import"><?=peso($resumen["total"]);?></p>
      </div>
      <div class="">
        <a href="#" class="link red">Pagar</a>
      </div>
    </div>
  </div>
  <div class="bag_aside">
    <div class="rrss">
      <a href="#" title="Ir a facebook" class="rrss_item ico facebook">facebook</a>
      <a href="#" title="Ir a instagram" class="rrss_item ico instagram">instagram</a>
      <a href="#" title="Ir a youtube" class="rrss_item ico youtube">youtube</a>
    </div>
  </div>
</section>

<!--End of content-->
<?php include('footer.php'); ?>
