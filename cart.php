<?php
session_start();
require('templates/header.php');

if (!empty($_SESSION['customer'])) {
    $customer = $_SESSION['customer'];

    require("model/queries/config.php");

    $q = connect_to_db()->query(
        "SELECT * FROM shopping_cart WHERE user_id = '$customer'"
    );
}else{
    header("location: login-signup-module/login.html");
}
?>
<div class="container">
    <div class="order">
        <div class="order-sections cart-head">
            <h4>Shopping Cart</h4>
            <p id="cart-head-instruction">Check your items and select your <br> prefered shipping method for better experience</p>

            <div class="my-cart">
                <?php
                if ($q) {
                    $grand_total = 0;
                    for ($i = 0; $i < $q->num_rows; $i++) {
                        $shopping_cart = $q->fetch_array(MYSQLI_ASSOC);

                        $product_id = $shopping_cart['product_id'];

                        // get other product details
                        $q2 = connect_to_db()->query(
                            "SELECT image, name, category, price, description FROM products WHERE id='$product_id'"
                        );
                        if ($q2) {
                            $details = $q2->fetch_array(MYSQLI_ASSOC);

                            $image = $details['image'];
                            $name = $details['name'];
                            $category = $details['category'];
                            $price = $details['price'];
                            $description = $details['description'];
                        }


                        $size = $shopping_cart['size'];
                        $quantity = $shopping_cart['quantity'];

                        $total_price = ($price * $quantity);

                        $grand_total = $grand_total + $total_price;

                        ?>
                        <div class="cart-content">
                            <div class="cart_product_image">
                                <img src="res/images/products/<?= $image ?>" alt="">
                            </div>
                            <div class="cart_product_details">
                                <div style="display: flex;">
                                    <div style="width: calc(100% - 100px);">
                                        <h5>
                                            <?= $name ?>
                                        </h5>
                                        <h6><?= $category ?> > Quantity 
                                            <?= $quantity ?> > Size <?= $size ?>
                                        </h6>
                                    </div>
                                    <div style="width: 100px; text-align: right; color: gray; ">
                                        <h5>@ Kes. <?=$total_price?>/=</h5>
                                    </div>
                                </div>
                                <div class="cart_prod_description">
                                    <p><?= $description ?></p>
                                </div>
                                <a href="product-single.php?ls=<?=$product_id?>">View</a>
                                <!-- <input type="text" class="product-id" value="<?=$product_id?>" hidden> -->
                                <button id="remove-from-cart"><a href="model/queries/remove-from-cart.php?ls=<?=$product_id?>" style="color: red; text-decoration: none;">Remove</a></button>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <h3 style="margin-top: 20px;">Total: Kes. <?=$grand_total?>/=</h3>
            </div>

            <h4>Available Shipping Method</h4>
        </div>
        <div class="checkout">
            <h4>Checkout Product</h4>
            <p>Complete order and payment details to place your order</p>

            <form action="">
                <h5>Shipping Address:</h5>
                <div id="shipping-address">
                    <div style="border-bottom: 1px solid #f2f3f5; padding: 5px;">
                        <input type="text" required class="inputs" name="dropoff-address" placeholder="Drop off address...">
                    </div>
                    <div style="display: flex;">
                        <div style="border-right: 1px solid #f2f3f5; width: calc(100% /2); padding: 5px;">
                            <input type="text" name="county" required class="inputs" placeholder="County">
                        </div>
                        <div style="width: calc(100% /2); padding: 5px;">
                            <input type="text" name="postal-address" required class="inputs" placeholder="Postal address">
                        </div>
                    </div>
                </div>

                <h5>Payment Details:</h5>
                <div id="payment-method">
                    <p style="margin-top: 20px;"><input type="radio" name="payment-method" checked> Mpesa</p>
                    
                    <div class="mpesa-payment">
                        <div>
                            KES.
                        </div>
                        <input type="text" name="amount" required placeholder="Enter Phone Number" readonly value="<?=$grand_total?>" style="cursor: not-allowed;">/=
                    </div>
                    <div class="mpesa-payment">
                        <div>
                            <i class="bx bxs-phone"></i>
                        </div>
                        <input type="text" name="payment-phone" required placeholder="Enter Phone Number">
                    </div>
                </div>

                <p>Your personal data will be used to
                     process your order, support your experience 
                    throughout this website, and for other purposes described in our 
                    <a href="" style="text-decoration: none;; color: rgb(26,115,232);">privacy policy.</a></p>

                <p><input type="checkbox" name="agerr-to-terms" required>
                I have read and agree to the <a href="" style="text-decoration: none;; color: rgb(26,115,232);">terms and conditions</a> of Service<span style="color: red;">*</span>
                </p>
                
                <button class="make-payment">Complete Order</button>
            </form>
        </div>
    </div>
</div>
<?php
require('templates/footer.html');
?>