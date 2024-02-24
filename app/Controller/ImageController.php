<?php
require_once "app/Model/ImageModel.php";

class ImageController {
    private $db;
    private $imageModel;
    public function __construct($db) {
        $this->imageModel = new ImageModel($db);
    }
    public function addImage() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["submit"]) && isset($_FILES["image"])) {
                $fileTmpPath = $_FILES["image"]["tmp_name"];
                $fileName = $_FILES["image"]["name"];
                $fileSize = $_FILES["image"]["size"];
                $fileType = $_FILES["image"]["type"];
                $fileContent = file_get_contents($fileTmpPath);
                $user_id = $_SESSION['user_id'];
                
                $imageData = array(
                    'nom' => $fileName,
                    'taille' => $fileSize,
                    'type' => $fileType,
                    'bin' => $fileContent,
                    'user_id' => $user_id
                );
                
                $uploadImage = $this->imageModel->uploadImage($imageData);
                $_SESSION['success_message'] = "Image envoyée avec succès !";
            } else {
                $_SESSION['error_message'] = "Erreur dans l'envoi de l'image !";
            }
        }
        $cssName = "add_img.css";
        $pageTitle = "Ajouter une image";
        ob_start();
        require_once "app/View/Images/add_img.php";
        $content = ob_get_clean();
        require_once "base.php";
    }

    public function getAllImagesUser() {
        $user_id = $_SESSION['user_id'];
        $allImages = $this->imageModel->getAllImagesUser($user_id);
        $cssName = "list_img.css";
        ob_start();
        require_once "app/View/Images/list_img.php";
        $content = ob_get_clean();
        require_once "base.php";
    }
}