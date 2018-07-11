<?php
  require_once('../conection.php');
  $activePage = "productos-index.php";
  $conexion = new Conexion();
  if(isset($_GET["id"])){
    if($_GET["action"] == "remove"){
      $conexion->delete("tracklists", $_GET["id"]);
      header("Location: tracklists-index.php?productoId=".$_GET["productoId"]);
      die();
    }
  }
  $canciones = $conexion->find("all", array(
                          "table" => "tracklists",
                          "where" => array("product_id" => $_GET["productoId"])
  ));

  include('header.php');
  include('menu.php');
?>
<!--Formulario Registro-->
<section>
  <div class="container">
    <div class="col-md-12">
      <h1>Tracklist</h1>
      <a href="tracklists-formulario.php?productoId=<?=$_GET["productoId"];?>" class="btn btn-primary openModal">Agregar canción</a>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($canciones as $key => $cancion) {
            ?>
            <tr>
              <td>
                <?=$cancion["nombre"];?>
              </td>
              <td>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Acciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <a class="dropdown-item openModal" href="tracklists-formulario.php?id=<?=$cancion["id"];?>&productoId=<?=$_GET["productoId"];?>">Editar</a>
                       <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="tracklists-index.php?id=<?=$cancion["id"];?>&productoId=<?=$_GET["productoId"];?>&action=remove">Eliminar</a>
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

<script type="text/javascript">
  $(document).ready(function() {
    $(".openModal").click(function(e){
      e.preventDefault();
      let url = $(this).attr("href");

      console.log(url);
      $.ajax({
        url: url,
        beforeSend: function(){
          $("#myModal").remove();
        },
        success: function(response){
          $("body").append(response);
        },
        complete:function(status, xhr){
          $("#myModal").modal();
        }
      });
    });
  });
</script>
