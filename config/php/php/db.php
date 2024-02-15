<?php
    // Connexion bdd
    $host = "mysql"; 
    $port = "3306";
    $dbname = "afci"; 
    $user = "admin"; 
    $pass = "admin"; 
    
    
    // Création d'une nouvelle instance de la classe PDO
    $bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    // Configuration des options PDO / permet les messages d'erreurs
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>