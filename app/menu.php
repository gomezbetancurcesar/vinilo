<header class="header">
   <div class="header_logo">
     <a href="/" title="Ir al inicio" class="logo">vinitrola</a>
   </div>
   <ul class="header_items">
     <li class="header_art">
        <a href="/boleta.php" title="Carrito de compras" class="ico bag">
          <?php
            if(isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])){
              ?>
                <span><?=count($_SESSION["carrito"]);?></span>
              <?php
            }
          ?>
        </a>
      </li>
      <?php
        if(isset($_SESSION["user_id"])){
          ?>
          <li class="header_art"> <a href="/logout.php" title="Login" class="ico user"></a><?php echo $_SESSION["name"]; ?></li>
          <?php
        }else{
          ?>
          <li class="header_art"> <a href="/login.php" title="Login" class="ico user"></a></li>
          <?php
        }
      ?>
     <li class="header_art"> <a href="/biblioteca.php" title="Buscar" class="ico search"></a> </li>
     <li class="header_art"> <a href="#" title="mostrar menu" class="ico ham"><span></span><span></span><span></span></a> </li>
   </ul>
   <div class="header_modal">
     <nav class="header_nav">
       <ul class="header_list">
         <li class="header_item"> <a href="/" title="Ir al inicio"> Inicio </a> </li>
         <li class="header_item"> <a href="/biblioteca.php"> Biblioteca</a> </li>
         <li class="header_item"> <a href="/boleta.php"> Carrito</a> </li>
       </ul>
     </nav>
     <form class="header_form" action="index.html" method="get">
       <div class="header_group">
         <label>¿Qué deseas buscar?</label>
         <input type="text" name="search" value="" placeholder="¿Qué deseas buscar?">
       </div>
     </form>
     <span class="ico logoWhite"></span>
   </div>
</header>
<aside class="aside">
  <div class="aside_content">
    <span class="ico logoWhite"></span>
  </div>
</aside>
