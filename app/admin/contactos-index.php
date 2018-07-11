<?php
  include('header.php');
  $activePage = "contactos-index.php";
  include('menu.php');
  $conexion = new Conexion();

  if(isset($_GET["id"]) && isset($_GET["leido"])){
    $conexion->save(array(
      "table" => "contacts",
      "where" => array("id" => $_GET["id"]),
      "data" => array("leido" => $_GET["leido"])
    ));
    header("Location: contactos-index.php");
  }

  $contactos = $conexion->find("all", array(
                      "table" => "contacts"
  ));
?>
<!--Formulario Registro-->
<section>
  <div class="container">
    <div class="col-md-12">
      <h1>Listado contactos</h1>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Estado</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo</th>
          <th>Texto</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($contactos as $key => $contacto) {
            ?>
            <tr>
              <td>
                <?=$contacto["time"];?>
              </td>
              <td>
                <?php
                  $opts = [
                    "class" => "label-default",
                    "texto" => "Leído"
                  ];
                  if(!$contacto["leido"]){
                    $opts = [
                      "class" => "label-success",
                      "texto" => "Nuevo"
                    ];
                  }
                ?>
                <span class="label <?=$opts['class'];?>"><?=$opts['texto'];?></span>
              </td>
              <td>
                <?=$contacto["name"];?>
              </td>
              <td>
                <?=$contacto["lastname"];?>
              </td>
              <td>
                <?=$contacto["mail"];?>
              </td>
              <td>
                <?=nl2br($contacto["text"]);?>
              </td>
              <td>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Acciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <?php
                        $opts = [
                          "texto" => "Marcar como leído",
                          "leido" => 1
                        ];
                        if($contacto["leido"]){
                          $opts = [
                            "texto" => "Marcar como no leído",
                            "leido" => 0
                          ];
                        }
                      ?>
                      <a class="dropdown-item" href="contactos-index.php?id=<?=$contacto["id"]?>&leido=<?=$opts["leido"];?>"><?=$opts["texto"];?></a>
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
