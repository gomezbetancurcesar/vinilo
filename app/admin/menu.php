<?php
  $pages = array();
  $pages["index.php"] = "Inicio";
  $pages["producto-agregar.php"] = "Agregar Producto";
?>

<header class="container">
  <h4>Administrador</h4>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php foreach($pages as $url=>$title):?>
          <li class="nav-item">
            <a class="nav-link <?php if($url === $activePage):?>active<?php endif;?>" href="<?php echo $url;?>">
              <?php echo $title;?>
            </a>
          </li>
        <?php endforeach;?>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Ingrese su búsqueda" aria-label="Ingrese su búsqueda" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
      <?php if($_SESSION[adminid]){?><a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0">Cerrar Sesión</a><?php }?>
    </div>
  </nav>
</header>
