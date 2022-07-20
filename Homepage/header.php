<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr. PC</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <nav>
    <div class="wrapper">
      <div class="logo"><a href="http://localhost/Website/Homepage/homepage.php">Mr. PC</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="#">What's NΞW</a></li>
        
        
        <li>
          <a href="" class="desktop-item">Products</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Products</label>
          <div class="mega-box">
            <div class="content">
              
              <div class="row">
                <header>PC</header>
                <ul class="mega-links">
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Laptops/laptophomepage.php">Laptops</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Cabinets/laptophomepage.php">Cabinets</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Monitors/laptophomepage.php">Monitors</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/os/laptophomepage.php">OS</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Components-I</header>
                <ul class="mega-links">
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Motherboards/laptophomepage.php">Motherboards</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Ram/laptophomepage.php">RAM</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/SSD/laptophomepage.php">SSD</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Harddrives/laptophomepage.php">Harddrives</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Components-II</header>
                <ul class="mega-links">
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Processor/laptophomepage.php">Processors</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Graphics/laptophomepage.php">Graphics</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Powersupply/laptophomepage.php">Power Supply</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Coolers/laptophomepage.php">Coolers</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Peripherals</header>
                <ul class="mega-links">
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Mouse/laptophomepage.php">Mouse</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Keyboard/laptophomepage.php">Keyboards</a></li>
                  <li><a href="http://localhost/Website/Homepage/Products/Categories/Sound/laptophomepage.php">Sound</a></li>
                  <li><a href="#">Accessories</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Software</header>
                <ul class="mega-links">
                  <li><a href="#">Gaming</a></li>
                  <li><a href="#">Streaming</a></li>
                  <li><a href="#">Editing</a></li>
                  <li><a href="#">Others</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Lifestyle</header>
                <ul class="mega-links">
                  <li><a href="#">Masks</a></li>
                  <li><a href="#">Chairs</a></li>
                  <li><a href="#">Gear & Aparrel</a></li>
                  <li><a href="#">Accessories</a></li>
                </ul>
              </div>

            </div>
          </div>
        </li>

        <li><a href="http://localhost/Website/Homepage/aboutus.php">About_Us</a></li>
        
        <li>
          <a href="http://localhost/Website/Homepage/Accountpage/accountpage.php" class="desktop-item">Account</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Account</label>
          
        </li>
                <li><a href="http://localhost/Website/Homepage/Products/Cartpage/cartpage.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </a></li>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fa fa-bars" aria-hidden="true"></i></label>
    </div>
  </nav>

</body>
</html>
