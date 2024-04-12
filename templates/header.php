<?php
// session_start();
if(!empty($_SESSION['customer'])){
    $user = $_SESSION['customer'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="res/images/site/famousIcon.PNG">
    <title>Famous | Shop</title>

    <!-- css -->
    <link rel="stylesheet" href="res/css/main1.css">
    <link rel="stylesheet" href="res/css/single-product.css">
    <link rel="stylesheet" href="res/css/shopping-cart3.css">


    <!-- External livraries -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="main">
        <header>
            <div class="logo">
                <h2><i class="bx bx-shopping-bag"></i> famous.</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Shop</a></li>
                    <!-- <li><a href="">Beauty</a></li>
                    <li><a href="">Accessories</a></li> -->
                    <li><a href="">Customer Service</a></li>

                    <?php
                    if (!empty($_SESSION['customer'])) {
                        ?>
                    <li><a href="logout.php">Log out</a></li>
                    <?php
                    }else{
                    ?>
                    <li><a href="login-signup-module/login.html">Login / Register</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>

            <div class="search">
                <div class="search-icons">
                    <i class="bx bx-search"></i>
                </div>
                <input type="search" placeholder="Search">
                <div class="search-icons">
                    <button id="shopping-cart-btn">
                        <i class="bx bxs-shopping-bag"></i>
                        
                    </button>
                    <span id="count-cart"></span>
                </div>
            </div>
        </header>
        <!-- <div class="container"> placeholder</div> -->
        