<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "vinitrola";
$conn = new mysqli($hostname, $username, $password, $database);
if ($conn ->connect_error) {
  die('Error de Conexión (' . $conn->connect_errno . ') ' . $conn->connect_error);
}/*else{
  echo $conn->host_info;
}*/
function dateArray($leFecha){
  list($fec,$hor) = explode(' ', $leFecha);
  list($ano, $mes, $dia) = explode('-', $fec);
  return("$dia/$mes/$ano");
}
?>
