<!DOCTYPE html>
<html>
    <head>
        <title>About Us</title>
        <link rel="stylesheet" href = "../css files/stylesheet_1.css"/>
        <link rel="stylesheet" href="../css files/projects.css"/>
        <script type = "text/javascript" src = "../javascript files/script_1.js" defer></script>
    </head>
    <body>
        <!--Navigation Bar-->
        <div class="header">
            <form>
                <header>
                    <div class="name_logo">
                        <img src = "../resources/logos/logo.png" alt = "Solatrix Logo"/>
                        <h1>Solatrix</h1>
                    </div>
                    <nav class="large_screen">
                        <a class="nav_links" href="about_us.php" target="_parent">About Us</a> 
                        <a class="nav_links" href="products.php" target="_parent">Products</a> 
                        <a class="nav_links" href="services.php" target="_parent">Services</a> 
                        <a class="nav_links" href="projects.php" target="_parent">Projects</a> 
                    </nav>
                    <div class="reg_search large_screen">
                        <a href="register.html" target = "_blank"><ion-icon name="person-sharp" class="ss_img" id="user"></ion-icon></a>
                        <input type = "text" placeholder="What are you looking for?" id = "search"/>
                        <ion-icon name="search-sharp" id="search-icon"></ion-icon>
                    </div>
                    <div class="space"></div>
                    <div class="icon_reg">
                        <ion-icon name="search-sharp" id="mini_search" class="ss_img" onclick="return mini()"></ion-icon>
                        <a href="register.html" target = "_blank"><ion-icon name="person-sharp" class="ss_img"></ion-icon></a>
                        <ion-icon name="grid-sharp" id="dropdown_icon" class="ss_img" onclick="return dropdown()"></ion-icon>
                    </div>
                </header>
                <div class="small_screen" id="links">
                    <a class="nav_links" href="about_us.php" target="_parent">About Us</a> 
                    <a class="nav_links" href="products.php" target="_parent">Products</a> 
                    <a class="nav_links" href="services.php" target="_parent">Services</a> 
                    <a class="nav_links" href="projects.php" target="_parent">Projects</a>
                </div>
                <div class="small_screen" id="ss_search">
                    <input type = "text" placeholder="What are you looking for?" id = "search"/>
                </div>
            </form>
        </div>

        <!--About US Page Contents-->
        <div class="grid-container">
            <a href="index.php" class="grid-item-1"><ion-icon name="arrow-back-circle"></ion-icon> Homepage</a>
            <div class="space2"></div>
            <hr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($servername, $username, $password, "project database");
            
            if ($conn->connect_error){
                die("Connection failed:".$conn->connect_error);
            }
            $sql = "SELECT * FROM projects";
            $projects = $conn->query($sql);
            if($projects->num_rows>0){
                while($row = $projects->fetch_assoc()){
                    $title = $row['Title'];
                    $description = $row["Description"];
                    $image_path = $row["Cover_image"];
                    echo '<div class="container">
                            <img src="'.$image_path.'" alt="project image" class="p_img"/>
                            <h2 class="title">'.$title.'</h2>
                            <p class="description">'.$description.'</p>
                            </div>';
                }
            }
            else{
                die("Error loading products");
            }
            ?>
        </div>

        <!--Footer-->
        <?php 
            require 'footer.php'; 
        ?>
    </body>
</html>