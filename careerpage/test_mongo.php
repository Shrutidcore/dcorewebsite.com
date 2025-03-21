<?php
require 'config/database.php';

try {
    $collection = $dbInstance->getCollection("jobForm");
    $testData = ["test" => "MongoDB connection successful", "timestamp" => time()];
    
    $result = $collection->insertOne($testData);

    echo json_encode([
        "success" => true,
        "message" => "MongoDB connected successfully!",
        "inserted_id" => (string) $result->getInsertedId()
    ]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "MongoDB Connection Failed: " . $e->getMessage()]);
}
?>
