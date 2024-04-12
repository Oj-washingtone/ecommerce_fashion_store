<?php
require('config.php');

$raw_data = file_get_contents('php://input');
$_data = json_decode($raw_data);

$firstname = $_data->firstname;
$lastname = $_data->lastname;
$email = $_data->email;
$password = $_data->password;
$id = uniqid();


$password = password_hash($password, PASSWORD_DEFAULT);

$q = connect_to_db()->query(
    "INSERT INTO customers(user_id, first_name, last_name, email, password)
    VALUES('$id', '$firstname', '$lastname', '$email', '$password')"
);

if($q){
    echo 1;
}else{
    echo 0;
}