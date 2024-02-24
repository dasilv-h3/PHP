<?php
include_once "app/Model/UserModel.php";

class AuthController {
    private $db;
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function registerUser() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            $userCreated = $this->userModel->createUser($username, $email, $password);
            if ($userCreated) {
                $_SESSION['success_message'] = "Utilisateur créé avec succès !";
                header("Location: /login");
                exit;
            } else {
                $_SESSION['error_message'] = "Un utilisateur avec cet username existe déjà.";
            }
        }
        $cssName = "register.css";
        $pageTitle = "Register";
        ob_start();
        require_once "app/View/auth/register.php";
        $content = ob_get_clean();
        require_once "base.php";
    }

    public function loginUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            

            $user = $this->userModel->getUserByUsername($username);

            if (empty($username) || empty($password)) {
                $_SESSION['warning_message'] = "Veuillez remplir tous les champs.";
                header("Location: /login");
                exit;
            }
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION['success_message'] = "Utilisateur connecté avec succès !";
                header("Location: /home");
                exit;
            } else {
                $_SESSION['error_message'] = "Nom d'utilisateur ou mot de passe incorrect.";
                header("Location: /login");
                exit;
            }
        }
        $cssName = "login.css";
        $pageTitle = "Login";
        ob_start();
        require_once "app/View/auth/login.php";
        $content = ob_get_clean();
        require_once "base.php";
    }
    
    public function logoutUser(){
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    }
}