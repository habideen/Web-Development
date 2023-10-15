<?php
// Start the session
session_start();

// Store data in the session
$_SESSION['username'] = 'john_doe';
$_SESSION['user_id'] = 123;

// Access the session data
echo "Welcome, " . $_SESSION['username'] . "! Your user ID is: " . $_SESSION['user_id'];





// Check if a specific session variable exists and retrieve its value
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  echo "Welcome back, " . $username . "!";
} else {
  echo "You are not logged in.";
}


?>