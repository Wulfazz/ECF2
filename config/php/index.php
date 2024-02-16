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

    <?php
    include 'exo/body.php';
    ?>

    <?php
    include 'exo/persos.php';
    ?>

    <!-- footer -->
    <?php
    include 'footer.php';
    ?>