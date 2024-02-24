<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserById($id) {
        try {
            $query = "SELECT * FROM User WHERE id = :id";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
            return null;
        }
    }

    public function getUserByUsername($username) {
        try {
            $query = "SELECT * FROM User WHERE username = :username";
            
            $stmt = $this->db->prepare($query);
            
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
            return null;
        }
    }

    public function createUser($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO User (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        try {
            $success = $stmt->execute();
            return $success;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    public function updateUser($userId, $username, $email) {
        try {
            $query = "UPDATE User SET username = :username, email = :email WHERE id = :user_id";
            $stmt = $this->db->prepare($query);
            
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':user_id', $userId);
            
            $success = $stmt->execute();
            if ($success){
                $user = $this->getUserById($userId);
                return $user;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    public function deleteUser($userId) {
        try {

            $query = "DELETE FROM User WHERE id = :id";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id", $userId);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur dans la suppression  de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

}