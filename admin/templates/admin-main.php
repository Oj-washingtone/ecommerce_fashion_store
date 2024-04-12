<main>
    <div class="side-bar">
        <button class="add-products"><i class="bx bx-plus"></i> Add products</button>
    </div>
    <div class="main">
        <div id="add-product-form">
            <h4>App product</h4>
            <form method="post" action="model/add-product.php" name="add-product" enctype="multipart/form-data">
                <div class="add-product">
                    <div id="img-preview">
                        <i class="bx bx-image" id="temp-image"></i>
                        <img src="" id="product-image">
                    </div>
                    <input class="add-product-inputs" type="file" name="product_image" hidden id="get-image"
                        onchange="previewImage(this)">
                    <div class="input-details">
                        <input class="add-product-inputs" type="text" name="product_name" required
                            placeholder="Product Name">
                        <input class="add-product-inputs" type="number" required name="price" id="add-product-price"
                            min="0" placeholder="Price in KES">
                        <input class="add-product-inputs" type="number" required name="quantity"
                            id="add-product-quantity" min="0" placeholder="Quantity">
                        <input class="add-product-inputs" type="text" required name="category" id="add-product-tag"
                            placeholder="Enter category">
                        <textarea class="add-product-inputs" name="product-description" id="product-description" placeholder="Add product description" ></textarea>

                        <select class="add-product-inputs" required name="product_tag" id="add-product-tag">
                            <option selected disabled hidden>Tag product</option>
                            <option value="Men Fashion">Men Fashion</option>
                            <option value="Women Fashion">Women Fashion</option>
                            <option value="Children Fashion">Children Fashion</option>
                            <option value="Unisex Fashion">Unisex Fashion</option>
                            <option value="Traditional Fashion">Traditional Fashion</option>
                            <option value="Beauty">Beauty</option>
                            <option value="Accessories">Accessories</option>
                        </select>
                        <input name="save-product" type="submit" class="add-product-action" id="save-product">
                        <!-- <button name="save-product" type="submit" class="add-product-action" id="save-product">Save</button> -->
                        <button class="add-product-action" id="clear-product-form">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<script>
    document.getElementById('img-preview').onclick = () => {
        document.getElementById('get-image').click();
    }

    function previewImage(e) {
        if (e.files[0]) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('temp-image').style.display = "none";
                    let img = document.querySelector('#product-image');
                    img.setAttribute('src', e.target.result);
                    img.style.display = "block"
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    }
</script>
<script type="module" src="res/js/add-product.js"></script>