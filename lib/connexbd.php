<?php
    $user = "root";
    $pass = "";

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce',$user,$pass);
    }
    catch (pdo_exception $e) {
        print "<p>erreur de connexion</p>";
        exit();
    }

?>