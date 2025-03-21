<?php
require 'vendor/autoload.php';

class Database {
    private $mongoClient;
    private $db;

    public function __construct() {
        $mongoUri = "mongodb+srv://dcorehost2:RgYqIq2DgboYeXfv@cluster0.szg5u.mongodb.net/jobForm?retryWrites=true&w=majority&appName=Cluster0";

        try {
            $this->mongoClient = new MongoDB\Client($mongoUri);
            $this->db = $this->mongoClient->jobForm;
        } catch (Exception $e) {
            die("MongoDB Connection Failed: " . $e->getMessage());
        }
    }

    public function getDatabase() {
        return $this->db;
    }
}

$database = new Database();
?>
