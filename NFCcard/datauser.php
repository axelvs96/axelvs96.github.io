<?php


    require 'config.php';

    header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");                          // HTTP/1.0
    
    try
    {
        // El usuario ha rellenado ambos campos
        if ($_GET['id']==null){
            header("HTTP/1.0 404 Not Found");
            die("<h1>Page Not Found!</h1> el usuario esta vacio");    

        }
        
        $idnumber = $_GET['id'];
        //$query = "SELECT id FROM users WHERE id=':id1'";
        $stmt = $pdo->prepare("SELECT id FROM users WHERE id=:id1");
        $stmt->bindParam(':id1', $idnumber, PDO::PARAM_STR);
        $stmt->execute();
        if(($i = $stmt->fetch()) == false)
        {
            header("HTTP/1.0 404 Not Found");
            die("<h1>Page Not Found!</h1>Invalid user");    
            
        } else {
            
            $tid = bin2hex(random_bytes(10));
            $sql=sprintf("INSERT INTO permalink_table (tid,id) VALUES('".$tid."','".$_GET['id']."')");
            $stmt2 = $pdo->prepare($sql);
            $stmt2->execute();
            $stmt2 = null;
            $pdo = null;
            $url="http://localhost/NFCcard/profile.php?tid=".$tid;
            header('Location: '.$url);
            //echo '<script>window.location.href = "'$url'";</script>';
            die();
            
        }

        $stmt = null;
        $pdo = null;

    } catch (Exception $e) {
    die('Error: ' . $e->getMessage());
    }
    

?>
