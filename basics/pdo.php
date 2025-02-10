<?php
require 'vendor/autoload.php'; // Load MongoDB library (if using Composer)

use MongoDB\Client;

try {
    // Connect to MongoDB
    $mongoClient = new Client("mongodb://localhost:27017"); // Change this if needed
    $database = $mongoClient->php_raw; // Select database
    $collection = $database->users; // Select collection (table)

    // Insert a new user
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"] ?? '';
        $age = intval($_POST["age"] ?? 0);

        if (!empty($name) && $age > 0) {
            $insertResult = $collection->insertOne([
                "name" => $name,
                "age" => $age
            ]);

            echo "User inserted with ID: " . $insertResult->getInsertedId() . "<br>";
        } else {
            echo "Invalid data!";
        }
    }

    // Fetch all users
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $users = $collection->find();

        foreach ($users as $user) {
            echo "ID: " . $user["_id"] . " - Name: " . $user["name"] . " - Age: " . $user["age"] . "<br>";
        }
    }

} catch (Exception $e) {
    die("Error connecting to MongoDB: " . $e->getMessage());
}
?>
