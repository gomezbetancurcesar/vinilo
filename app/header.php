<?php require_once('conection.php');

if(!isset($_SESSION))session_start();

/*if(!$_SESSION['user_id']){
  $_SESSION[volver] = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
  header('Location: login.php');
}*/

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinitrola</title>
    <!--css-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700" rel="stylesheet">
    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="dist/css/app.css">
    <!--js-->
    <script src="dist/js/jquery.min.js"></script>
    <!--<script src="assets/js/bootstrap.min.js"></script>-->
    <script src="dist/js/app.js"></script>
  </head>
  <body>
    <?php
      /*$pages = array();
      $pages["index.php"] = "Inicio";
      $pages["boleta.php"] = "Boleta";
      $pages["producto.php"] = "Producto";
      $pages["registro.php"] = "Registro";
      $pages["contact.php"] = "Contacto";*/
    ?>
