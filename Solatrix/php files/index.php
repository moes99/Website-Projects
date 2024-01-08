                    <?php
                    session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Solatrix!</title>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "stylesheet_1.css"/>
        <link rel="stylesheet" href = "index.css"/>
        <script type = "text/javascript" src = "../javascript files/script_1.js" defer></script>
    </head>
    <body>
        <?php
        require 'header.php';
        ?>
        <!--Index Page Contents-->
        <div id="carousal">
            <div id="discover">
                <button class="navigation" id="left" onclick="return left_nav()"><ion-icon name="caret-back-circle"></ion-icon></button>
                <div id="text">Discover our projects!</div>
                <button class="navigation" id="right" onclick="return right_nav()"><ion-icon name="caret-forward-circle"></ion-icon></button>
            </div>
        </div>

        <?php
        require 'footer.php';
        ?>

    </body>
</html>