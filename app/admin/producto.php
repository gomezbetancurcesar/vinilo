<?php
  include('header.php');
  $activePage = "producto.php";
  include('menu.php');

  $errorPage = 0;

  //Validación de ID
  if($_GET[id] == ""){
    $errorPage = 1;
  }else{
    $query = "SELECT * FROM producto WHERE 1 AND id='$_GET[id]'";
    $resource = $conn->query($query);
    $total = $resource->num_rows;
    $row = $resource->fetch_assoc();

    //Query de compra

    if(isset($_POST[actualizar]) && $_POST[actualizar]=="actualizar"){
      $query="UPDATE producto SET name = '$_POST[name]', code = '$_POST[code]', category = '$_POST[category]', phrase_sale = '$_POST[phrase_sale]', description = '$_POST[description]', colors = '$_POST[colors]', price = '$_POST[price]', availability = '$_POST[availability]', sale = '$_POST[sale]' WHERE `id` = '$_POST[idProduct]'";
      if($conn->query($query)) header("Location: producto.php?id=$_POST[idProduct]");
    }
  }
?>
<!--start of content-->
<section>
  <div class="container">
    <?php if($errorPage != 1){ ?>
    <?php if($row['sale']=="1"){ ?>
      <img src="../assets/img/sale.png" alt="imagen promocional" class="imgSale"/>
    <?php } ?>
    <form id="compra" name="compra" method="post" action="">
    <h1><?php echo $row['name'];?> <span class="badge badge-secondary">Detalles</span></h1>
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <img src="../assets/img/<?php echo $row['code']; ?>.jpg" alt="imagen de rayita">
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
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <input name="idProduct" type="hidden" value="<?php echo $row['id'];?>" />
        <a href="producto.php?id=<?php echo $row['id']; ?>&change=active" title="Editar" class="btn btn-success">Editar Datos</a>
        <a href="index.php?idDelete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Desea eliminar este registro?')">Borrar</a>
      </div>
      <div class="col-xs-12 col-md-8 <?php if(!isset($_GET[change]) && $_GET[change]!="active"):?>hiddeForm<?php endif;?>">
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" placeholder="Ingrese Nombre" name="name" value="<?php echo $row['name'];?>" required>
        </div>

        <div class="form-group">
          <label for="code">Código</label>
          <input type="text" class="form-control" placeholder="xxxx45" name="code" value="<?php echo $row['code'];?>" required>
        </div>
        <div class="form-group">
          <label for="country">Categoria</label>
          <select class="form-control" name="category">
            <option value="vertical" <?php if ($row['category'] == "vertical"){echo "selected='selected'";} ?>>Vertical</option>
            <option value="horizontal" <?php if ($row['category'] == "horizontal"){echo "selected='selected'";} ?>>Horizontal</option>
            <option value="curva" <?php if ($row['category'] == "curva"){echo "selected='selected'";} ?>>Curva</option>
            <option value="circular" <?php if ($row['category'] == "circular"){echo "selected='selected'";} ?>>Circular</option>
            <option value="invisible" <?php if ($row['category'] == "invisible"){echo "selected='selected'";} ?>>Invisible</option>
          </select>
        </div>
        <div class="form-group">
          <label for="phrase_sale">Frase promocional</label>
          <textarea class="form-control" rows="5" placeholder="Ingrese frase..." name="phrase_sale" required><?php echo $row['phrase_sale'];?></textarea>
        </div>
        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea class="form-control" rows="5" placeholder="Ingrese el texto..." name="description" required><?php echo $row['description'];?></textarea>
        </div>
        <div class="form-group">
          <label for="colors">Color</label>
          <select class="form-control" name="colors">
            <option value="rojo" <?php if ($row['colors'] == "rojo"){echo "selected='selected'";} ?>>Rojo</option>
            <option value="azul" <?php if ($row['colors'] == "azul"){echo "selected='selected'";} ?>>Azul</option>
            <option value="negro" <?php if ($row['colors'] == "negro"){echo "selected='selected'";} ?>>Negro</option>
            <option value="verde" <?php if ($row['colors'] == "verde"){echo "selected='selected'";} ?>>Verde</option>
          </select>
        </div>
        <div class="form-group">
          <label for="price">Precio</label>
          <input type="number" class="form-control" placeholder="ejemplo: 1000" name="price" value="<?php echo $row['price'];?>" required>
        </div>
        <div class="form-group">
          <label for="availability">¿Tiene Stock?</label>
          <select class="form-control" name="availability" required>
            <option value="0" <?php if ($row['availability'] == "0"){echo "selected='selected'";} ?>>No</option>
            <option value="1" <?php if ($row['availability'] == "1"){echo "selected='selected'";} ?>>Si</option>
          </select>
        </div>
        <div class="form-group">
          <label for="sale">¿En Oferta?</label>
          <select class="form-control" name="sale" required>
            <option value="0" <?php if ($row['sale'] == "0"){echo "selected='selected'";} ?>>No</option>
            <option value="1" <?php if ($row['sale'] == "1"){echo "selected='selected'";} ?>>Si</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" name="actualizar" value="actualizar" class="btn btn-primary"/>
        </div>
      </div>
    </div>

    </form>
    <?php
      }else{
    ?>
      <h1>Error: Página No encontrada!</h1>
      <img src="assets/img/error.png" alt="error 500">
  <?php } ?>
  </div>
</section>
<!--End of content-->
<?php include('../footer.php'); ?>
