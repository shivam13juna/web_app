<?php 
require_once "pdo.php";
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

session_unset();
session_destroy();



?>
