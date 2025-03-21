<?php
class Database {
    private $connection;

    public function __construct() {
        $host = 'localhost'; // Your MySQL server address
        $db = 'jobForm'; // Your database name
        $user = 'your_username'; // Your MySQL username
        $pass = 'your_password'; // Your MySQL password

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

$database = new Database();
?>
