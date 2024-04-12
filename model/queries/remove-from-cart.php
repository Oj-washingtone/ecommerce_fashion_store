<?php
session_start();
require('config.php');

if(!empty($_SESSION['customer'])){
    $id = $_GET['ls'];
    $customer = $_SESSION['customer'];

    $q = connect_to_db()->query(
        "DELETE FROM shopping_cart WHERE product_id = '$id' AND user_id ='$customer'"
    );

    if($q){
        header("location: ../../cart.php");
    }else{
        echo "Invalid request";
    }
}

