<?php
session_start();

$_SESSION['customer'] = "";
session_destroy();

header("location: index.php");