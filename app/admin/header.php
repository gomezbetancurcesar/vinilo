<?php 
require_once('../conection.php');

if(!isset($_SESSION))session_start();

if(!$_SESSION['adminid']){
  $_SESSION[volverad] = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
  header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <!--Styles-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <!--JS-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/global.js"></script>
  </head>
  <body>
    <?php
      $pages = array();
      $pages["index.php"] = "Inicio";
      $pages["boleta.php"] = "Boleta";
      $pages["producto.php"] = "Producto";
      $pages["registro.php"] = "Registro";
    ?>
