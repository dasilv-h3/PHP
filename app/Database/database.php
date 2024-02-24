<?php

include_once "env_parser.php";
class Database {
    private PDO $connection;

    public function getConnection() {
        $envFilePath = '.env';
        $array_env = parseEnv($envFilePath);
        
        $dbName = $array_env['DB_NAME'];
        $dbUsername = $array_env['DB_USER'];
        $dbPassword = $array_env['DB_PASSWORD'];

        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=$dbName", $dbUsername, $dbPassword);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
        return $this->connection;
    }
}