<?php

session_start();
ob_start();
//session_destroy();

defined ("DB_HOST")? null: define ("DB_HOST", "localhost");
defined ("DB_USER")? null: define ("DB_USER", "lee");
defined ("DB_PASS")? null: define ("DB_PASS", "");
defined ("DB_NAME")? null: define ("DB_NAME", "digibooks");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
require_once("functions.php");
?>
