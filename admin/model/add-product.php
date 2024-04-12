<?php
require_once('config.php');
require('upload_file.php');

define("BASE_DIR", "/");
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/famous");

//product images folder
define("PRODUCT_IMAGES_DIR", ROOT_PATH . "/res/images/products/");

$name = $_POST['product_name'];
$category = $_POST['category'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$tag = $_POST['product_tag'];
$description = $_POST['product-description'];


$target_dir = PRODUCT_IMAGES_DIR;

$allowed_image_types = array('png', 'jpg', 'jpeg');

if (!empty($_POST)) {

    $file_upload = validate_and_upload_files('product_image', $target_dir);
    if($file_upload == true){
        $file_name = $file_upload['name'];
        $q = connect_to_db()->query("
            INSERT INTO products(image, name, price, quantity, category, tag, description)
            VALUES('$file_name', '$name', '$price', '$quantity', '$category', '$tag', '$description');
        ");

        if($q){
            // redirect
            header('location: ../admin.php');
        }
    }
}
?>