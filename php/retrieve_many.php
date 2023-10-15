<?php
// Database credentials
$host = 'localhost'; // Database server hostname
$dbname = 'your_database_name'; // Database name
$username = 'your_username'; // Database username
$password = 'your_password'; // Database password

// Create a connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Execute SELECT query
$sql = "SELECT id, name, email, age FROM users";
$result = $connection->query($sql);

// Check if the query was successful
if ($result === false) {
    echo "Error: " . $connection->error;
} else {
    // Fetch and process the data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Access data using column names
            echo "ID: " . $row['id'] . "<br>";
            echo "Name: " . $row['name'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "Age: " . $row['age'] . "<br>";
            echo "---------------------<br>";
        }
    } else {
        echo "No records found.";
    }
}

// Close the connection
$connection->close();
?>