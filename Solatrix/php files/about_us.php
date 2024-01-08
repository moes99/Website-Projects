<!DOCTYPE html>
<html>
    <head>
        <title>About Us</title>
        <link rel="stylesheet" href = "../css files/stylesheet_1.css"/>
        <link rel="stylesheet" href="../css files/about_us.css"/>
        <script type = "text/javascript" src = "../javascript files/script_1.js" defer></script>
    </head>
    <body>
        <!--Navigation Bar-->
        <?php require 'header.php'; ?>

        <!--About US Page Contents-->
        <div class="grid-container">
            <a href="index.php" class="grid-item-1"><ion-icon name="arrow-back-circle"></ion-icon> Homepage</a>
            <div class="space2"></div>
            <hr>
            <h1 class="grid-tem-2">Our Mission</h1>
            <p>The Lebanon energy crisis that started in late 2020 has left a lot of citizens without access to energy they need in their day to day.
                Hence, Solatrix was created on the mission to provide solar energy packages where people of all economic backgrounds can benefit from.
            </p>
            <hr>
            <h1 class="grid-item-3">Meet The Team!</h1>
            <p>Solatrix was founded in 2023 by two BAU students Abed Al Rahman Al Sharif and Mohammad Omar Shehab. 
                On the left is our mechanical engineer and computer scientist Mohammad Omar. 
                He has 3 years of experience in designing, installing, and maintaining solar energy systems.
                On the right is our senior computer scientist Abed Al Rahman. He is an expert Java programmer with a vast experience in programming Solar inverters and controllers.
            </p>
            <ion-icon name="person-sharp" id="moe_pic" class="member_img"></ion-icon>
            <ion-icon name="person-sharp" id="abed_pic" class="member_img"></ion-icon>
            <hr>
        </div>

        <!--Footer-->
        <?php
            require 'footer.php';
        ?>
    </body>
</html>