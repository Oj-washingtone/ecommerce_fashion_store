<?php
require_once('config.php');

$q = connect_to_db()->query(
    "SELECT * FROM products"
);

if ($q) {
    for ($i = 0; $i < $q->num_rows; $i++) {
        $data = $q->fetch_array(MYSQLI_ASSOC);

        $product_image = $data['image'];
        $product_name = $data['name'];
        $price = $data['price'];
        $category = $data['category'];
        $tag = $data['tag'];
        $id = $data['id'];
        ?>
        <div id="<?= $id ?>" class="product-card" onclick="viewProduct(this.id)">
            <div class="product-image">
                <img src="res/images/products/<?= $product_image ?>" alt="<?= $product_name ?>">
            </div>
            <div>
                <?= $product_name ?>
            </div>
            <div>
                <h4>KES: <?= $price ?> /=</h4>
            </div>

            <button class="add-to-cart-1"><i class="bx bxs-shopping-bag"></i> Add to cart</button>
            <!-- <?= $category ?>
            <?= $tag ?>
            <?= $id ?> -->
        </div>
        <?php
    }
}
?>