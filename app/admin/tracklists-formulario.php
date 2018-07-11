<?php 
    require_once('../conection.php');
    //include('header.php');
    $conexion = new Conexion();

    $label = "Agregar canción";
    $cancion = array();

    if(isset($_POST["registrar"]) && $_POST["registrar"]=="Registrar"){
      $array = array(
        "table" => "tracklists",
        "data" => array(
          "nombre" => $_POST["nombre"],
          "product_id" => $_GET["productoId"]
        ),
      );
      if(isset($_POST["id"])){
        $array["where"]["id"] = $_POST["id"];
        $conexion->save($array);
        header("Location: tracklists-index.php?productoId=".$_GET["productoId"]);
        die();
      }else{
        $ID = $conexion->save($array);
        header("Location: tracklists-index.php?productoId=".$_GET["productoId"]);
        die();
      }
    }else{
      if(isset($_GET["id"])){
        $label = "Editar canción";
        $cancion = $conexion->find("first", array(
                                  "table" => "tracklists",
                                  "where" => [
                                    "id" => $_GET["id"]
                                  ]
        ));
      }
    }


    $producto = $conexion->find("first", array(
                                "table" => "products",
                                "where" => [
                                  "id" => $_GET["productoId"]
                                ]
    ));
    //debug($producto);
  ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <form id="registrar" name="registrar" method="post" action="tracklists-formulario.php?productoId=<?=$_GET["productoId"];?>">
        <?php
          if(isset($cancion["id"])){
            echo "<input type='hidden' name='id' value='".$cancion["id"]."'>";
          }
        ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?=$label;?></h4>
          <h4 class="modal-subtitle">Álbum: <?=$producto["name"];?></h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre" required <?php if(isset($cancion["nombre"])){ echo "value='".$cancion["nombre"]."'";}?> >
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="registrar" value="Registrar" class="btn btn-primary"/>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>