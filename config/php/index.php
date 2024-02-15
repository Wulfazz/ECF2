<?php
ob_start(); // Active la sortie tamponnée
session_start();
?>

    <!-- connexion à la bdd -->
    <?php
    include 'db.php';
    ?>

    <?php
    include 'header.php';
    ?>

    <?php
    include 'navbar.php';
    ?>
    
    <!-- Contenus site (les différentes pages) -->
    <?php
    include 'exo/5vs5.php';
    ?>

    <!-- footer -->
    <?php
    include 'footer.php';
    ?>