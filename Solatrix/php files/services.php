<!DOCTYPE html>
<html>
    <head>
        <title>Services</title>
        <link rel="stylesheet" href = "../css files/stylesheet_1.css"/>
        <link rel="stylesheet" href="../css files/services.css"/>
        <script type = "text/javascript" src = "../javascript files/script_1.js" defer></script>
    </head>
    <body>
        <!--Navigation Bar-->
        <?php 
        session_start();
        require 'header.php';
        ?>

        <!--Services Page Contents-->
        <div class="services-container">
            <a href="index.php" class="grid-item-1"><ion-icon name="arrow-back-circle"></ion-icon> Homepage</a>
            <div class="space2"></div>
            <hr>
            <div id="pv_system">
                <a href="pv_sizing.php" class="sh1">Photovoltaic System</a>
                <img src="../resources/project images/image 8.jpg" class="simg"/>
            </div>
            <div id="solar_heating">
                <a href="solar_heating_sizing.php" class="sh1">Solar Water Heating</a>
                <img src="../resources/project images/image 6.jpg" class="simg"/>
            </div>
        </div>

    <?php
    require 'footer.php';
    ?>

        <!--Script for ion icons-->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>