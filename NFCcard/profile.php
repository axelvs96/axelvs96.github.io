<?php

    /*
    $url="http://192.168.0.24/NFCcard/";
    header('Location: '.$url, TRUE, 301);
    die();
    */

    require 'config.php';

    header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");                          // HTTP/1.0
    try
    {
        // El usuario ha rellenado ambos campos
        if ($_GET['tid']==null){
            header("HTTP/1.0 404 Not Found");
            die("<h1>Page Not Found!</h1>");    

        } else {
            $vIdLink = $_GET['tid'];
            //$query = "SELECT id, username, email, nombreUsuario FROM usuarios WHERE id=".mysqli_real_escape_string($enlace,$_GET['id']);
            $query = "SELECT u.name, u.lastname1, u.lastname2, u.address, u.contact1name, u.contact1lastname1, u.contact1lastname2, u.contact1phone, u.healthproblems FROM users u, permalink_table pl WHERE u.id=pl.id and pl.tid=:id_link";
            //$result = mysqli_query($enlace,$query);
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_link', $vIdLink, PDO::PARAM_STR);
            $stmt->execute();

            $sql="DELETE FROM permalink_table WHERE tid=:id_link";
                $stmt2 = $pdo->prepare($sql);
                $stmt2->bindParam(':id_link', $vIdLink, PDO::PARAM_STR);
                $stmt2->execute();
                $stmt2 = null;
                $pdo = null; 
            
            //if (mysqli_num_rows($result)>0)
            if(($i = $stmt->fetch()) == false)
            {
                header("HTTP/1.0 404 Not Found");
                die("<h1>Page Not Found!</h1>The link you specified is either invalid or has expired"); 
            } 
        }


        // (C) CLOSE DATABASE CONNECTION
        $stmt = null;
        $pdo = null;

    } catch (Exception $e) {
      die('Error: ' . $e->getMessage());
    } 


?>
<html lang="es-ES">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="PRAGMA" content="NO-CACHE" />
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="assets/profilestyle.css">
        <title>ID CARD | Profile</title>
    </head>
    <body class="bg" oncopy="return false" oncut="return false" onpaste="return false">
        
        <fieldset>
           <!-- <legend>DATOS</legend> -->
            <h1 class="text"><?php  echo($i["name"]." ".$i["lastname1"]." ".$i["lastname2"]);?></h1> 
            <p class="text"><?php echo($i["healthproblems"]);?></p>
        </fieldset>

        <?php 
            if($i["contact1name"]!=''){
                echo(" <fieldset>".
                        "<legend>DATOS PERSONA CONTACTO</legend>".
                        "<h3 class=\"text\">".$i["contact1name"]." ".$i["contact1lastname1"]." ".$i["contact1lastname2"]."</h3>".
                        "<h3 class=\"text\">Teléfono: <a href=\"tel:".$i["contact1phone"]."\">".$i["contact1phone"]."</a></h3>".
                    "</fieldset> ");
            }
        ?>  

        <?php 
            if(isset($i["contact2name"])){
                echo(" <fieldset>".
                        "<legend>DATOS PERSONA CONTACTO</legend>".
                        "<h3 class=\"text\">".$i["contact2name"]." ".$i["contact2lastname1"]." ".$i["contact2lastname2"]."</h3>".
                        "<h3 class=\"text\">Teléfono: <a href=\"tel:".$i["contact2phone"]."\">".$i["contact2phone"]."</a></h3>".
                    "</fieldset> ");
            }
        ?>  

        <fieldset>
            <legend>DIRECCION PERSONA AFECTADA</legend>
            <div>
                <iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=350&amp;height=250&amp;hl=es&amp;q=<?php echo ($i["address"]!='')?$i["address"]:'NA';?>&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
        </fieldset>
        
    </body>
</html>
