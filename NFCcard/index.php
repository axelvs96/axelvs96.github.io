<?php

    
    require 'config.php';

    header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");                          // HTTP/1.0
    if (isset($_SESSION['tagId'])) {
        $user=$_SESSION['tagId'];
    }
    

?>
<html lang="es-ES">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="PRAGMA" content="NO-CACHE" />
<head>
	<meta charset="utf-8">
	<title>ID CARD</title>
</head>
<body>

  <a href="/NFCcard/datauser.php?id=1">Prueba id 1</a>

</body>
</html>
