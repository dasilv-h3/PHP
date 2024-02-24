<?php
session_start();

require_once "app/Database/Database.php";
require_once "app/Controller/AuthController.php";
require_once "app/Controller/HomeController.php";
require_once "app/Controller/ImageController.php";
require_once "app/Controller/ProfileController.php";

$database = new Database();
$dbConnection = $database->getConnection();

$path = $_SERVER['REQUEST_URI'] ?? '/';
$allowedUrls = ['/', '/login', '/register'];

if (!isset($_SESSION['user_id']) && !in_array($path, $allowedUrls)) {
    header("Location: /login");
    exit;
} elseif (isset($_SESSION['user_id']) && in_array($path, $allowedUrls)) {
    header("Location: /home");
}

switch ($_SERVER['REQUEST_URI']) {
    case "/register":
        $controller = new AuthController($dbConnection);
        $controller->registerUser();
        break;
    case "/login":
        $controller = new AuthController($dbConnection);
        $controller->loginUser();
        break;
    case "/logout":
        $controller = new AuthController($dbConnection);
        $controller->logoutUser();
        break;
    case '/home':
        $controller = new HomeController();
        $controller->home();
        break;
    case '/add_img':
        $controller = new ImageController($dbConnection);
        $controller->addImage();
        break;
    case '/list_img':
        $controller = new ImageController($dbConnection);
        $controller->getAllImagesUser();
        break;
    case '/profile':
        $controller = new ProfileController($dbConnection);
        $controller->getProfile();
    case '/modify_profile':
        $controller = new ProfileController($dbConnection);
        $controller->updateProfile();
        break;
    case '/delete_profile':
        $controller = new ProfileController($dbConnection);
        $controller->deleteProfile();
        break;
    default:
        $cssName = "base.css";
        $pageTitle = "Accueil";
        $content = file_get_contents("app/View/base.php");
        include_once "base.php";
        break;
}
