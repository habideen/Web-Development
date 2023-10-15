<?php
// Database credentials
$host = 'localhost'; // Database server hostname
$dbname = 'your_database_name'; // Database name
$username = 'your_username'; // Database username
$password = 'your_password'; // Database password

// User login data from a form or input
$email = $_POST['email'];
$password = $_POST['password'];

// Create a connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Prepare and execute the SELECT query with prepared statement
$stmt = $connection->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    // Get the result and check if the user exists
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            echo "Login successful! Welcome, User ID: " . $row['id'];
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$connection->close();
?>