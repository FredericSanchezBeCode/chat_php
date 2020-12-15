<?php
    $user = "sql7382175";
    $pass = "2JfUZmMME8";

    try {
        $pdo = new PDO('mysql:host=sql7.freemysqlhosting.net;dbname=sql7382175',$user,$pass);
    }
    catch (pdo_exception $e) {
        print "<p>erreur de connexion</p>";
        exit();
    }

?>