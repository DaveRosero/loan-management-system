<?php
require_once "conn.php";
require_once "../model/register.php";
require_once "../controller/BaseController.php";
require_once "../controller/RegisterController.php";

$conn = database();
$model = new Register($conn);
$controller = new RegisterController($model);
$controller->handleRequest();
?>