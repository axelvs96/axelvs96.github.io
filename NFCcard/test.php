<?php

    require 'config.php';
    $id = bin2hex(random_bytes(20));
    $nombre= "Axel";
    $apellido1="Valverde";
    $apellido2="Sanchís";

    $contacto1nombre="nombre";
    $contacto1apellido1="apellido1";
    $contacto1apellido2="apellido2";
    $contacto1telefono="123456789";

    $direccion="Carrer de Tortosa 27 Badalona";
    $healthproblems="Problemas de salud que pueda tener";
        
?>
<html lang="es-ES">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="PRAGMA" content="NO-CACHE" />
    <head>
        <meta charset="utf-8">
        <title>ID CARD</title>
    </head>
    <body oncopy="return false" oncut="return false" onpaste="return false">
        <br><h1><?php  echo($nombre." ".$apellido1." ".$apellido2);?></h1>
        <p><?php echo($healthproblems);?></p>
        <!--<br><?php echo($id);?> -->
        <br><br><h2>Persona de contacto 1</h2>
        <h3><?php  echo($contacto1nombre." ".$contacto1apellido1." ".$contacto1apellido2);?></h3>
        <h3>Teléfono: <a href="tel:<?php echo($contacto1telefono); ?>"><?php echo($contacto1telefono) ?></a></h3>
        <br><h2>Dirección persona afectada</h2>
        <a target="_blank" href="https://maps.google.com/maps?q=<?php echo ($direccion!='')?$direccion:'NA';?>"><?php echo ($direccion!='')?$direccion:'NA';?></a>
    </body>
</html>
