<?php
// Database credentials
$host = 'localhost'; // Database server hostname
$dbname = 'your_database_name'; // Database name
$username = 'your_username'; // Database username
$password = 'your_password'; // Database password

// Data from form or other source
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];

// Create a connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Prepare and execute the insert query
$stmt = $connection->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $name, $email, $age);

if ($stmt->execute()) {
    echo "New user inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$connection->close();
?>