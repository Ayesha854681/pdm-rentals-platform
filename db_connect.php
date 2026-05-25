<?php
$host = "localhost";
$username = "root"; // default in XAMPP
$password = "";     // leave blank for root in XAMPP
$database = "cars";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "cars"; // change to your real DB name

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

