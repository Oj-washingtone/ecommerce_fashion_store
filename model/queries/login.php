<?php
require("config.php");

$raw_inputs = file_get_contents('php://input');
$_inputs = json_decode($raw_inputs);

$username = $_inputs->username;
$password = $_inputs->password;


$q = connect_to_db()->query(
    "SELECT user_id, password FROM customers WHERE email = '$username'"
);

if ($q) {

    if ($q->num_rows === 1) {
        $result = $q->fetch_array(MYSQLI_ASSOC);
        $returned_password = $result['password'];
        $user_id = $result['user_id'];
        if (password_verify($password, $returned_password)) {
            
            session_start();
            $_SESSION['customer'] = $user_id; 
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
}