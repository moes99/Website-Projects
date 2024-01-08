<!DOCTYPE html>
<html>
    <head>
        <title>Your Cart</title>
        <link rel="stylesheet" href = "../css files/stylesheet_1.css"/>
        <link rel="stylesheet" href = "../css files/cart.css"/>
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

        <!--Products Page Contents-->
        <div class="cart">
            <div class="grid-item-1">
                <a href="index.php"><ion-icon name="arrow-back-circle"></ion-icon> Homepage </a>
                <a href="products.php"><ion-icon name="arrow-back-circle"></ion-icon> Products</a>
            </div>
            <hr>
            <table>
                <tr>
                    <th colspan="2">Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Operation</th>
                </tr>
            <?php
                require 'config.php';
                if(isset($_GET['delete'])){
                    $delete_table = $_GET['table'];
                    $delete_id = $_GET['pid'];
                    $delete_user = $_GET['user'];
                    $delete_sql = "DELETE FROM cart WHERE username = '".$delete_user."' AND pd_table = '".$delete_table."' AND pid = '".$delete_id."'";
                    $conn->query($delete_sql);
                }
                if(isset($_GET['user'])){
                    $username = $_GET['user'];
                    $sql = "SELECT * FROM cart where username = '".$username."'";
                    $items = $conn->query($sql);
                    if ($items->num_rows > 0){
                        while($row=$items->fetch_assoc()){
                           $table = $row['pd_table'];
                           $pid = (int)$row['pid'];
                           $item_sql = "SELECT Manufacturer, Model, Price, ImgDirec FROM ".$table." WHERE ID = ".$pid;
                           $details = $conn->query($item_sql);
                           $detials_array = $details->fetch_assoc();
                           $username = 'k';
                           echo '<tr>
                                    <td class="image"><img src="'.$detials_array["ImgDirec"].'/img1.jpg" alt="product image"/>
                                    <td>'.$detials_array['Manufacturer'].' '.$detials_array['Model'].'</td>
                                    <td>TBD</td>
                                    <td>'.$detials_array['Price'].'</td>
                                    <td>TBD</td>
                                    <td>
                                        <a href="cart.php?user='.$username.'&table='.$table.'&pid='.$pid.'&delete=1" class="delete"><ion-icon name="trash-sharp"></ion-icon> Delete</a>
                                    </td>
                                </tr>';
                        }
                    }
                }
                else{
                    header('location: register.php');
                }
            ?>
            </table>
        </div>

        <!--Footer-->
        <?php
            require 'footer.php';
        ?>
    </body>
</html>