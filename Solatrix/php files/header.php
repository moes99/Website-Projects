<?php
require 'config.php';
    $user = "";
    if(isset($_SESSION["user_name"])){
      $user = $_SESSION["user_name"];
      $link = '#';
      $lougout = 'logout.php';
      $log = "Logout";
    }
    else{
      $user = "Guest";
      $logout = 'register.php';
      $link = '#';
      $log = 'Resgiter';
    }     
    if (isset($_POST['submit'])) {
      header('location: search.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "../css files/stylesheet_1.css"/>
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
              <div class="user">
                <a href="<?php echo $link?>" class="icon"><ion-icon name="person-sharp"></ion-icon></a>
                <a href="#" class="username"><?php echo $user;?></a>
                <a href="<?php echo $logout?>" class="logout"><?php echo $log?></a>
              </div>
              <a href="cart.php?user=<?php echo $user?>"><ion-icon name="cart-sharp" class="ss_img" id="cart"></ion-icon></a>
              <input type = "text" placeholder="What are you looking for?" id="search" name="submit"/>
              <ion-icon name="search-sharp" id="search-icon"></ion-icon>
            </div>

            <div class="space"></div>
            <div class="icon_reg">
              <a href="cart.php?user=<?php echo $user?>"><ion-icon name="cart-sharp" class="ss_img" id="cart"></ion-icon></a>
              <div class="user">
                <a href="<?php echo $link?>" class="icon"><ion-icon name="person-sharp"></ion-icon></a>
                <a href="#" class="username"><?php echo $user;?></a>
                <a href="<?php echo $logout?>" class="logout"><?php echo $log?></a>
              </div>
              <ion-icon name="search-sharp" id="mini_search" class="ss_img" onclick="return mini()"></ion-icon>
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
              <input type = "text" placeholder="What are you looking for?" id = "search" name="submit"/>
          </div>
        </form>
      </div>

        
  <!--Script for ion icons-->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>