<?php
session_start();


if (empty($_SESSION['customer'])) {
    echo "login-user";
} else {
    require('config.php');
    $customer = $_SESSION['customer'];
    $data = file_get_contents('php://input');
    $data = json_decode($data);


    $product_id = $data->product_id;
    $size = $data->size;
    $quantity = $data->quantity;

    $q = connect_to_db()->query(
        "INSERT INTO shopping_cart(product_id, user_id, size, quantity)
        VALUES('$product_id', '$customer', '$size', '$quantity')"
    );

    if($q){
        echo "success";
    }else{
        echo "failed";
    }
}