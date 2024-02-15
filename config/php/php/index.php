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
        if (isset($_GET['exo'])){
            $exo = $_GET['exo'];
            include "exo/$exo.php";
        }
        ?>

    <!-- footer -->
    <?php
    include 'footer.php';
    ?>