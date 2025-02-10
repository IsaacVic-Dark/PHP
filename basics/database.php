<?php
$conn = new mysqli('localhost', 'root', '', 'php_raw');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Post data to database
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $age = $_POST["age"];

    $stm = $conn->prepare("INSERT INTO users (name, age) VALUES (Ethan, 13)");

    $stm->bind_param("sis", $name, $age, $nationality);

    if($stm->execute()){
        echo "New record created successfully";
    } else {
        echo "Error: " . $stm->error;
    }
    $stm->close();
}

// Fetch data from database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
        echo " - name: " . $row["name"] . " - age: " . $row["age"] . " - nationality: " . $row["nationality"] . "<br>"; 
    }
} else {
    echo "0 results";
}

$conn->close();
?>
