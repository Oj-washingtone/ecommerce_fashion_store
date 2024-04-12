<?php

//login to the database
function connect_to_db(){
	$host_name = '127.0.0.1';
	$username  = 'root';
	$password  = '';
	$database  = 'famous';


	$connection = new mysqli($host_name, $username, $password, $database);
	if($connection->connect_error) die($connection->connect_error);

	return $connection;
}