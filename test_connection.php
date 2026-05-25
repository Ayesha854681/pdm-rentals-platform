<?php
$servername = "localhost";       // Or 127.0.0.1
$username = "root";              // Default for XAMPP
$password = "";                  // Default is empty in XAMPP
$database = "cars";              // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Connected successfully to MySQL!";
}
?>

