<?php

        $dbHost = "localhost";
        $dbName = "test";
        $dbChar = "utf8";
        $dbUser = "root";
        $dbPass = "abcd1234";
        try {
          $pdo = new PDO(
            "mysql:host=$dbHost;dbname=$dbName;charset=$dbChar",
            $dbUser, $dbPass, [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
          );
        } catch (Exception $ex) { exit($ex->getMessage()); }
?>
