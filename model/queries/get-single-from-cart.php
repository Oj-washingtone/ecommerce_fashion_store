<?php
session_start();
if(!empty($_SESSION['customer'])){
    $customer = $_SESSION['customer'];
    require('config.php');

    $data = file_get_contents('php://input');
    $data = json_decode($data);

    $product_id = $data->product_id;

    $q = connect_to_db()->query(
        "SELECT * FROM shopping_cart WHERE product_id = '$product_id' AND user_id = '$customer'"
    );

    if($q->num_rows > 0){
        echo 1;
    }else{
        echo 0;
    }
}