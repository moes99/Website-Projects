<!DOCTYPE html>
<html>
    <head>
        <title>Solar Energy Products</title>
        <link rel="stylesheet" href = "../css files/details.css"/>
        <script type = "text/javascript" src = "../javascript files/script_1.js" defer></script>
    </head>
    <body>
        <?php 
        session_start();
        require 'header.php';
        ?>

        <!--Details Page Contents-->
        <div class="details_container">
            <div class="grid-item-1">
                <a href="index.php"><ion-icon name="arrow-back-circle"></ion-icon> Homepage </a>
                <a href="products.php"><ion-icon name="arrow-back-circle"></ion-icon> Products</a>
            </div>
            <hr>
            <div id="product">
                <?php
                    require 'config.php';
                    $message = "";
                    if(isset($_POST['user'])){
                        $user = $_POST['user'];
                        $table = $_POST['table'];
                        $pid = $_POST['ID'];
                        $sql = "SELECT * FROM cart WHERE username = '".$user."' AND pd_table = '".$table."' AND pid = '".$pid."'";
                        $exist = $conn->query($sql);
                        if ($exist->num_rows > 0){
                            $message = '<p class="added">This item has already been added to your cart!';
                        }
                        else{
                            $insert = "INSERT INTO cart (username,pd_table,pid) VALUES ('$user','$table','$pid')";
                            $conn->query($insert);
                            $message = '<p class="added">Item was added to your cart successfully!</p>';
                        }
                    }
                    if(!isset($_POST["table"])){
                        header("products.php");
                    }
                    else{
                        $sql = "SELECT * FROM ".$_POST["table"]." WHERE ID = ".$_POST["ID"];
                        $product = $conn->query($sql);
                    }

                    if ($product->num_rows > 0){
                        $product = $product->fetch_assoc();
                        echo '<h1 id="pd_name">'.$product["Manufacturer"].' '.$product["Model"].'</h1>
                        <div id="pd_imgs">
                            <img src="'.$product["ImgDirec"].'/img1.jpg" alt="'.$product["Manufacturer"].' '.$product["Model"].'" id="main_img"/>
                        <div id="imgs">';
                        $countimgs = count(glob($product["ImgDirec"].'*'));
                        for ($i = 1; $i<= $countimgs; $i++){
                            echo '<img src="'.$product["ImgDirec"].'/img'.$i.'.jpg" class="smol"/>';
                        }
                    }
                    echo '</div>
                    </div>
                    <ul id="pd_desc">';
                    $check = array("ID", "Manufacturer", "Model", "ImgDirec", "Price");
                    foreach($product as $key => $value){
                        if (!in_array($key, $check)){
                            echo '<li>'.$key.': '.$value.'</li>';
                        }
                    }
                    echo '</ul>
                    <form method="post" action="'.$_SERVER["PHP_SELF"].'" id="price">
                    <input type="hidden" name="table"'.' value="'.$_POST['table'].'"/>
                    <input type="hidden" name="ID"'.' value="'.$_POST['ID'].'"/>
                    <input type="hidden" name="user"'.' value="j"/>
                    <input type="submit" name="add" value="Add to Cart" id="pr"/></form>';

                    echo $message;
                ?>
            </div> 
        </div>

        <!--Footer-->
        <?php
        require 'footer.php';
        ?>

        <!--Script for ion icons-->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>