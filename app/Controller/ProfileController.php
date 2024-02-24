<?php
require_once "app/Model/UserModel.php";

class ProfileController {
    private $db;
    private $userModel;
    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function getProfile() {
        $user_id = $_SESSION['user_id'];
        $userProfile = $this->userModel->getUserById($user_id);
        $cssName = "profile.css";
        ob_start();
        require_once "app/View/Profile/profile.php";
        $content = ob_get_clean();
        require_once "base.php";
    }

    public function updateProfile() {
        $userId = $_SESSION['user_id'];
        $user = $this->userModel->getUserById($userId);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];

            $user = $this->userModel->updateUser($userId, $username, $email);
            $_SESSION['success_message'] = "Utilisateur modifié avec succès !";
        }
        $cssName = "modify_profile.css";
        ob_start();
        require_once "app/View/Profile/modify_profile.php";
        $content = ob_get_clean();
        require_once "base.php";
    }

    public function deleteProfile() {
    $userId = $_SESSION['user_id'];

    $isDeleted = $this->userModel->deleteUser($userId);

    if ($isDeleted) {
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
    }
}