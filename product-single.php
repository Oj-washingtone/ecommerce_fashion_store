<?php
session_start();
require('templates/header.php');
require("model/queries/config.php");

if(!empty($_SESSION['customer'])){
    $customer = $_SESSION['customer'];
}

$product_id = $_GET['ls'];
$q = connect_to_db()->query(
    "SELECT * FROM products WHERE id='$product_id'"
);

if ($q->num_rows == 1) {
    $product_details = $q->fetch_array(MYSQLI_ASSOC);
    $image = $product_details['image'];
    $name = $product_details['name'];
    $price = $product_details['price'];
    $category = $product_details['category'];
    $tag = $product_details['tag'];
    $description = $product_details['description'];

    $sizes = explode(',', $product_details['sizes']);
}

?>
<!-- <div class="container"> -->
<div class="container">
    <div class="product-item-section">
        <div class="details">
            <div class="selected-product-image">
                <img src="res/images/products/<?= $image ?>" alt="<?= $name ?>">
            </div>
            <div class="single-product-description">
                <h2>
                    <?= $name ?>
                </h2>
                <p style="color: #ff512f;"><i class="bx bx-chevron-right"></i> <?= $category ?></p>
                <h5>KES: <?= $price ?>/=</h5>

                <div class="single-product-actions">
                    <input type="text" value="<?= $product_id ?>" hidden id="s-product-id">
                    <select name="size" id="s-product-size">
                        <option selected disabled hidden>Size</option>
                        <?php
                        foreach ($sizes as $key => $size) {
                            ?>
                            <option value="<?= $size ?>">
                                <?= $size ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                    <label for="quntity">Quantity:</label>
                    <div class="quantity">
                        <button id="reduce-quantity"><i class="bx bx-minus"></i></button>
                        <input type="text" name="quantity" value="1" id="single-prod-page-qty">
                        <button id="add-quantity"><i class="bx bx-plus"></i></button>
                    </div>
                    <button class="single-pro-page-add-cart-btn" id="add-cart-2">Add to cart <i
                            class="bx bxs-shopping-bag"></i></button>
                </div>
                <div>
                    <h5>Description:</h5>
                    <p>
                        <?= $description ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('templates/footer.html');
?>