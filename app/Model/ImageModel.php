<?php
class ImageModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllImagesUser($user_id) {
        try {
            $query = "SELECT * FROM Image WHERE user_id = :user_id";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($images) {
                return $images;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
            return null;
        }
    }

    public function uploadImage($imageData) {
        try {
            $query = "INSERT INTO Image (nom, taille, type, bin, user_id) VALUES (:nom, :taille, :type, :bin, :user_id)";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nom', $imageData['nom']);
            $stmt->bindParam(':taille', $imageData['taille']);
            $stmt->bindParam(':type', $imageData['type']);
            $stmt->bindParam(':bin', $imageData['bin']);
            $stmt->bindParam(':user_id', $imageData['user_id']);
            $success = $stmt->execute();
            
            return $success;
        } catch (PDOException $e) {
            echo "Erreur lors du téléchargement de l'image : " . $e->getMessage();
            return false;
        }
    }

}