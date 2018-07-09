<header class="header">
   <div class="header_logo">
     <a href="/" title="Ir al inicio" class="logo">vinitrola</a>
   </div>
   <ul class="header_items">
     <li class="header_art"> <a href="#" title="Carrito de compras" class="ico bag"> <span>1</span> </a> </li>
     <li class="header_art"> <a href="#" title="Login" class="ico user"></a><?php if($_SESSION[user_id]){ echo $_SESSION[name];  }?></li>
     <li class="header_art"> <a href="#" title="Buscar" class="ico search"></a> </li>
     <li class="header_art"> <a href="#" title="mostrar menu" class="ico ham"><span></span><span></span><span></span></a> </li>
   </ul>
   <div class="header_modal">
     <nav class="header_nav">
       <ul class="header_list">
         <li class="header_item"> <a href="/" title="Ir al inicio"> Inicio </a> </li>
         <li class="header_item"> <a href="/biblioteca.php"> Biblioteca</a> </li>
         <li class="header_item"> <a href="/carrito.php"> Carrito</a> </li>
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
