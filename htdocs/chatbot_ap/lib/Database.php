<?php
class Database {
    private static $instance = null;
    private $connection;

    // Private constructor to prevent instantiation
    private function __construct() {
        $host = 'localhost';      // Update with your DB host
        $dbname = 'chatbot_db';  // Update with your DB name
        $username = 'root';       // Update with your DB username
        $password = '';           // Update with your DB password

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection error: ' . $e->getMessage());
        }
    }

    // Static method to get the single instance of the class
    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->connection;
    }

    // Prevent cloning of the instance
    private function __clone() {}
}
