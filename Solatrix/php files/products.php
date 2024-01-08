<!DOCTYPE html>
<html>
    <head>
        <title>Solar Energy Products</title>
        <link rel="stylesheet" href = "../css files/stylesheet_1.css"/>
        <link rel="stylesheet" href = "../css files/products.css"/>
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
                        <a href="cart.php?user=k"><ion-icon name="cart-sharp" class="ss_img" id="cart"></ion-icon></ion-icon></a>
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

        <!--Products Page Contents-->
        <div class="products_container">
            <a href="index.php" class="grid-item-1"><ion-icon name="arrow-back-circle"></ion-icon> Homepage</a>
            <hr>
            <button id="solar_inv" class="products_category">Solar Inverters</button>
            <button id="pv_panels" class="products_category">Photovoltaic Panels</button>
            <button id="heat_panels" class="products_category">Solar Heating Panels</button>
            <button id="batteries" class="products_category">Batteries</button>
            <button id="reset"><ion-icon name="refresh-circle"></ion-icon></button>
            <div class="products">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $conn = new mysqli($servername, $username, $password, "project database");
                    
                    if ($conn->connect_error){
                        die("Connection failed:".$conn->connect_error);
                    }
                ?>
                <div id="inv_containers" class="product">
                    <?php
                        $sql = "SELECT ID, Manufacturer, Model, Power, AC, DC, MPPT, ImgDirec FROM solar_inverters";
                        $inverters = $conn->query($sql);
                        
                        if($inverters->num_rows>0){
                            while($row = $inverters->fetch_assoc()){
                                echo '<div class="sub_pd">
                                <img class="pd_img" src="'.$row["ImgDirec"].'/img1.jpg" alt="Solar Inverter"/>
                                <ul class="pd_description">
                                    <li>'.$row["Manufacturer"].' '.$row["Model"].'</li>
                                    <li>Power Capacity: '.$row["Power"].'</li>
                                    <li>DC Input: '.$row["DC"].'</li>
                                    <li>AC Output: '.$row["AC"].'</li>
                                    <li>MPPT Voltage Range: '.$row["MPPT"].'</li>
                                </ul>
                                <form action="details.php" method="post" class="pd_details">
                                    <input type="hidden" name="table" value="solar_inverters"/>
                                    <input type="hidden" name="ID" value="'.$row["ID"].'"/>
                                    <input type="submit" value="More Details" class="pd_btn"/>
                                </form>
                            </div>';
                            }
                        }
                    ?>
                </div>
                <div id="pv_containers" class="product">
                    <?php 
                        $sql_pv = "SELECT ID, Manufacturer, Model, Pmp, Voc, Isc, Efficiency, ImgDirec FROM pv_panels";
                        $pv_panels = $conn->query($sql_pv);
                        if($pv_panels->num_rows>0){
                            while($row = $pv_panels->fetch_assoc()){
                                echo '<div class="sub_pd">
                                <img class="pd_img" src="'.$row["ImgDirec"].'/img1.jpg" alt="PV Panel"/>
                                <ul class="pd_description">
                                    <li>'.$row["Manufacturer"].' '.$row["Model"].'</li>
                                    <li>Peak Power: '.$row["Pmp"].'</li>
                                    <li>Voc: '.$row["Voc"].'</li>
                                    <li>Isc: '.$row["Isc"].'</li>
                                    <li>Efficiecny: '.$row["Efficiency"].'</li>
                                </ul>
                                <form action="details.php" method="post" class="pd_details">
                                    <input type="hidden" name="table" value="pv_panels"/>
                                    <input type="hidden" name="ID" value="'.$row["ID"].'"/>
                                    <input type="submit" value="More Details" class="pd_btn"/>
                                </form>
                            </div>';  
                            }
                        }
                    ?>
                </div>
                <div id="heat_containers" class="product">
                    <?php
                        $sql_heat = "SELECT ID, Manufacturer, Model, NbTubes, TankCapacity, TubeDiameter, TubeLength, ImgDirec FROM ht_panels";
                        $heat_panels = $conn->query($sql_heat);
                        if($heat_panels->num_rows>0){
                            while($row = $heat_panels->fetch_assoc()){
                                echo '<div class="sub_pd">
                                <img class="pd_img" src="'.$row["ImgDirec"].'/img1.jpg" alt="Solar Heating Panel"/>
                                <ul class="pd_description">
                                    <li>'.$row["Manufacturer"].' '.$row["Model"].'</li>
                                    <li>Tank Capacity: '.$row["TankCapacity"].'</li>
                                    <li>Number of Tubes: '.$row["NbTubes"].'</li>
                                    <li>Tube Diameter: '.$row["TubeDiameter"].'</li>
                                    <li>Tube Length: '.$row["TubeLength"].'</li>
                                </ul>
                                <form action="details.php" method="post" class="pd_details">
                                    <input type="hidden" name="table" value="ht_panels"/>
                                    <input type="hidden" name="ID" value="'.$row["ID"].'"/>
                                    <input type="submit" value="More Details" class="pd_btn"/>
                                </form>
                            </div>';
                            }
                        }
                    ?>
                </div>
                <div id="bat_containers" class="product">
                    <?php
                        $sql_bats = "SELECT ID, Manufacturer, Model, Voltage, Capacity, Tech, ImgDirec FROM batteries";
                        $batts = $conn->query($sql_bats);
                        if($batts->num_rows>0){
                            while($row = $batts->fetch_assoc()){
                                echo '<div class="sub_pd">
                                <img class="pd_img" src="'.$row["ImgDirec"].'/img1.jpg" alt="Solar Battery"/>
                                <ul class="pd_description">
                                    <li>'.$row["Manufacturer"].' '.$row["Model"].'</li>
                                    <li>Capacity: '.$row["Capacity"].'</li>
                                    <li>Voltage: '.$row["Voltage"].'</li>
                                    <li>Type: '.$row["Tech"].'</li>
                                </ul>
                                <form action="details.php" method="post" class="pd_details">
                                    <input type="hidden" name="table" value="batteries"/>
                                    <input type="hidden" name="ID" value="'.$row["ID"].'"/>
                                    <input type="submit" value="More Details" class="pd_btn"/>
                                </form>
                            </div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <!--Footer-->
        <?php
            require 'footer.php';
        ?>
    </body>
</html>