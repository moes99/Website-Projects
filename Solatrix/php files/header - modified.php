<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "../css files/stylesheet_1.css"/>
  <style>
    /* CSS styles for dropdown menu */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropbtn {
        background-color: #F8D238;
        color: #333;
        font-size: 16px;
        border: none;
        cursor: pointer;
      }
      
      .dropdown-content {
        display: none;
        position: absolute;
        z-index: 1;
        background-color: #F8D238;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        border-radius: 5px;
        padding: 12px 16px;
      }
      
      .dropdown-content a {
        color: #333;
        padding: 6px 0;
        text-decoration: none;
        display: block;
      }
      
      .dropdown-content a:hover {
        background-color: #f1f1f1;
      }
      
      .show {
        display: block;
      }
  </style>
  <script type="text/javascript" defer>
    /* JavaScript code for dropdown menu */
    const dropdown = document.querySelector('.dropdown');
    const dropdownBtn = document.querySelector('.dropbtn');
    const dropdownContent = document.querySelector('.dropdown-content');
    
    dropdownBtn.addEventListener('click', () => {
      dropdownContent.classList.toggle('show');
    });
    
    window.addEventListener('click', (event) => {
      if (!event.target.matches('.dropbtn')) {
        if (dropdownContent.classList.contains('show')) {
          dropdownContent.classList.remove('show');
        }
      }
    });
  </script>
</head>
<body>
  <?php
    $user = "";
    if(isset($_SESSION["user_name"])){
      $user = $_SESSION["user_name"];
    }
    else{
      $user = "Guest";
    }     
  ?>
    <!--Navigation Bar-->
    <div class="header">
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
          <a href="cart.php?user=<?php echo $user?>"><ion-icon name="cart-sharp" class="ss_img" id="cart"></ion-icon></ion-icon></a>
          <div class="dropdown">
            <button class="dropbtn">
              <ion-icon name="person-sharp" class="ss_img" id="user"></ion-icon>
              <ion-icon name="caret-down"></ion-icon>
            </button>
            <div class="dropdown-content">
              <a href="#"><?php echo $user;?></a>
              <a href="logout.php">Logout</a>
            </div>
          </div>
          <form method="post" action="search.php" id="search_form">
            <input type = "search" placeholder="What are you looking for?" class="search" name="search"/>
          </form>
          <ion-icon name="search-sharp" id="search-icon" class="ss_img"></ion-icon>
        </div>

        
          <a href="cart.php?user=<?php echo $user?>"><ion-icon name="cart-sharp" class="ss_img small_screen" id="cart"></ion-icon></ion-icon></a>
          <ion-icon name="grid-sharp" id="dropdown_icon" class="ss_img small_screen" onclick="return dropdown()"></ion-icon>
          <div class="dropdown small_screen">
            <button class="dropbtn">
              <ion-icon name="person-sharp" class="ss_img" id="user"></ion-icon>
              <ion-icon name="caret-down"></ion-icon>
            </button>
            <div class="dropdown-content">
              <a href="#"><?php echo $user;?></a>
              <a href="logout.php">Logout</a>
            </div>
          </div>
          <div class="small_screen" id="links">
              <a class="nav_links" href="about_us.php" target="_parent">About Us</a> 
              <a class="nav_links" href="products.php" target="_parent">Products</a> 
              <a class="nav_links" href="services.php" target="_parent">Services</a> 
              <a class="nav_links" href="projects.php" target="_parent">Projects</a>
          </div>
            <form action="search.php" method="post">
              <div class="small_screen" id="ss_search">
                  <input type = "search" placeholder="What are you looking for?" class="search" name="search"/>
              </div>
            </form>
      </header>
    </div>
        
  <!--Script for ion icons-->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>