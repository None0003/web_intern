<?php
require_once "app/controllers/AuthController.php";

$authController = new AuthController();

$request = $_SERVER["REQUEST_URI"];

switch ($request) {
    case '/register':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $authController->register();
        } else {
            require 'app/views/register.php';
        }
        break;

    case '/login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $authController->login();
        } else {
            require 'app/views/login.php';
        }
        break;

    case '/dashboard':
        require 'app/views/dashboard.php';
        break;

    case '/logout':
        $authController->logout();
        break;

    default:
        echo "404 - Không tìm thấy trang!";
        break;
}
?>