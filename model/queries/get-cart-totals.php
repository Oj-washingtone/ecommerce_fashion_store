<?php
session_start();

if (!empty($_SESSION['customer'])) {
    require('config.php');

    $customer = $_SESSION['customer'];

    $q = connect_to_db()->query(
        "SELECT * FROM shopping_cart WHERE user_id = '$customer'"
    );

    if ($q) {
        echo $q->num_rows;
    } else {
        echo "Invalid request";
    }
}