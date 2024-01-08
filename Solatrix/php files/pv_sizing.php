<!DOCTYPE html>
<html>
    <head>
        <title>Photovoltaic System Sizing</title>
        <link rel="stylesheet" href = "../css files/stylesheet_1.css"/>
        <link rel="stylesheet" href="../css files/sizing.css"/>
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

        <!--PV Sizing Page Contents-->
        <div class="_container">
            <div class="grid-item-1">
                <a href="index.php"><ion-icon name="arrow-back-circle"></ion-icon> Homepage </a>
                <a href="services.php"><ion-icon name="arrow-back-circle"></ion-icon> Services</a>
            </div>
            <div class="space2"></div>
            <hr>
            <form id="_sizing_form">
                <h2 class="grid-item-2">Please fill in your project's information below:</h2>
                <label for="location_request">
                    <input type="checkbox" name="location_request" id="location_request"/> 
                    Allow us to access your location
                </label><br><br>
                <table id="options_table">
                    <tr>
                        <th>
                            <label for="app_type">Application Type:</label>
                        </th>
                        <td>
                            <select name="application type" id="app_type">
                                <option value="none">Not selected</option>
                                <option value="house">Private Residence/ Apartment</option>
                                <option value="industrial/commercial">Industrial/ Commercial</option>
                                <option value="food">Food Services</option>
                                <option value="other">Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="app_size">Application Size:</label>
                        </th>
                        <td>
                            <select name="application size" id="app_size">
                                <option value="none">Not selected</option>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="system_type">PV System Type:</label>
                        </th>
                        <td >
                            <select name="system type" id="system_type">
                                <option value="none">Not selected</option>
                                <option value="grid-tied">Grid-tied</option>
                                <option value="off-grid">Off-grid</option>
                                <option value="hybrid">Hybrid</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="bat_in_tr">
                        <th>
                            <label for="bat_type">Battery Type:</label>
                        </th>
                        <td>
                            <select name="battery type" id="bat_type">
                                <option value="none">Not selected</option>
                                <option value="lithium">Lithium</option>
                                <option value="lead-acid">Lead Acid</option>
                                <option value="gel">Gel</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <div id="errors1"></div><br>
                <hr>
                <h2 class="grid-item-2">Please fill in your equipment's loads:</h2>
                <table id="loads">
                    <tr>
                        <th>Equipment</th>
                        <th>Quantity</th>
                        <th>Rated Power in Watts</th>
                        <th>Hourly use per day</th>
                        <th>Days used per week</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="app1" class="app"></td>
                        <td><input type="number" name="qty1" class="qty"></td>
                        <td><input type="number" name="power1" class="power"></td>
                        <td><input type="number" name="hrs1" class="hrs"></td>
                        <td><input type="number" name="days1" class="days"></td>
                    </tr>
                </table>
                <br>
                <div id="errors2"></div><br>
                <center>
                    <button id="add_load" onclick="return add_row()">Add Load</button>
                    <span>&nbsp;&nbsp;&nbsp;</span>
                    <button id="size_sys" onclick="return size()">Size System</button>
                    <span>&nbsp;&nbsp;&nbsp;</span>
                    <button id="reset_table" onclick="return rst()">Reset</button>
                </center>
                <hr>
                <h2 class="grid-item-2">PV System Summary:</h2>
                <table id="results">
                    <tr>
                        <th colspan="2">Total Load in Wh/day</th>
                        <td id="total_load" class="output"></td>
                    </tr>
                    <tr>
                        <th colspan="2">Recommend Solar Inverter Power Capacity in VA</th>
                        <td id="pwr_cap" class="output"></td>
                    </tr>
                    <tr>
                        <th class="nb" rowspan="3">Number of <br>Solar Panels</th>
                        <th>Total</th>
                        <td id="total_panels" class="output"></td>
                    </tr>
                    <tr>
                        <th>Number of Panels in Series</th>
                        <td id="series_panels" class="output"></td>
                    </tr>
                    <tr>
                        <th>Number of Rows of Series Panels</th>
                        <td id="parallel_panels" class="output"></td>
                    </tr>
                    <tr class="bat_out_tr">
                        <th class="nb" rowspan="3">Number of <br>Batteries</th>
                        <th>Total</th>
                        <td id="total_bats" class="output"></td>
                    </tr>
                    <tr class="bat_out_tr">
                        <th>Number of Batteries in Series</th>
                        <td id="series_bats" class="output"></td>
                    </tr>
                    <tr class="bat_out_tr">
                        <th>Number of Rows of Series Batteries</th>
                        <td id="parallel_bats" class="output"></td>
                    </tr>
                </table>
                <br>
                <div id="note">Calculations are based on Vmp = 40V and Isc = 11A per PV panels and Vnom = 12V and Capacity = 200Ah per battery</div>
            </form>
        </div>

        <!--Footer-->
        <?php
            require 'footer.php';
        ?>
    </body>
</html>