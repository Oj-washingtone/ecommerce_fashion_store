<?php
session_start();
require('templates/header.php');
?>

        <div class="container">
            <div class="barner">
                <div class="barner-ad">
                    <h1>Get 20% off New Arivals</h1>
                    <p>Discover your test in fashion and beauty <br> Famous got you covered with amaizing, trendy fashion</p>
                    <button>Shop now <i class="bx bxs-shopping-bag"></i></button>
                </div>
                <div class="barner-slider">
                    <img src="res/images/site/b6.jpg" alt="ad">
                </div>
            </div>
            <div class="new">
                <div class="filter-recommendations">
                    <ul>
                        <li><a href="">All</a></li>
                        <li><a href="">Men</a></li>
                        <li><a href="">Women</a></li>
                        <li><a href="">Boys</a></li>
                        <li><a href="">Girls</a></li>
                        <li><a href="">Baby</a></li>
                        <li><a href="">Moms</a></li>
                        <li><a href="">Traditional</a></li>
                        
                    </ul>
                </div>
                <hr>
                <div class="product-recomendation-section">
                    <div class="suggestions">
                        <h3>For You</h3>
                        <ul>
                            <h5>Filter By:</h5>
                            <li><a href="">Sport Shoes</a></li>
                            <li><a href="">Jackets</a></li>
                            <li><a href="">Official Shoes</a></li>
                            <li><a href="">Coats</a></li>
                            <li><a href="">Dresses</a></li>
                            <li><a href="">Jeans Trouser</a></li>
                            <li><a href="">Official</a></li>
                            <li><a href="">More </a></li>
                        </ul>
                    </div>
                    <div class="product-list" id="my-products">
                        product-list
                    </div>
                    <div class="trending-brands">
                        <h4>Popular Brands</h4>
                        <div class="suggestions">
                            <ul>
                                <li><a href=""><i class="bx bxl-adidas"></i> Adidas</a></li>
                                <li><a href=""><i class="bx bxl-adidas"></i> Nike</a></li>
                                <li><a href=""><i class="bx bxl-adidas"></i> Zara</a></li>
                                <li><a href=""><i class="bx bxl-adidas"></i> Kitenge</a></li>
                                <li><a href=""><i class="bx bxl-adidas"></i> More </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="testimonials">
                    <h2>Reviews & Testimonials</h2>
                </div>

                <?php
                require('templates/footer.html');
                ?>
                