<?php
  include('header.php');
  include('menu.php');

  if(isset($_GET["validate"]) && $_GET["validate"] == 1){
    $query="SELECT * FROM clients WHERE 1 AND id='$_SESSION[user_id]'";
    $resource = $conn->query($query);
    $row = $resource->fetch_assoc();
    
    $body = "El usuario ".$row['name']." a realizado una compra en el sitio web: 
    Nombre: ".$row['name']."
    Email : ".$row['mail']."
    Teléfono: ".$row['tel']."
    Dirección de entrega: ".$row['adress']."
    País: ".$row["country"]."
    ----------------------------------
    ";
    
    $head = "From: ".$row['name']."<".$row['mail'].">\n";
    $head .= "Reply-To: ".$row['mail']."\n";
    $head .= "Cc: gerente@rayita.cl\n";
    $destinatario .= "fa.zurita@alumnos.duoc.cl";
    $type = "Venta de rayitas desde el sitio web";
    mail("$destinatario", "$type", "$body", "$head");
  }
?>
<section>
</section>
<!--End of content-->
<?php include('footer.php'); ?>
