<?php
// Database connection
include 'db_connect.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

// Create upload directory if it doesn't exist
$targetDir = "uploads/";
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Handle file upload (correct input name used: id_proof)
$filename = basename($_FILES["id_proof"]["name"]);
$targetFile = $targetDir . $filename;

if (!move_uploaded_file($_FILES["id_proof"]["tmp_name"], $targetFile)) {
    die("❌ File upload failed. Please try again.");
}

// Collect form data from POST
$full_name       = $_POST['full_name'];
$email           = $_POST['email'];
$phone           = $_POST['phone'];
$address         = $_POST['address'];
$license         = $_POST['license'];
$payment_method  = $_POST['payment_method'];
$category        = $_POST['category'];
$car_name        = $_POST['car_name'];
$daily_price     = floatval($_POST['daily_price']);
$rental_days     = intval($_POST['rental_days']);
$total_cost      = floatval($_POST['total_cost']);

// SQL insert query
$sql = "INSERT INTO rentalbookings (
    full_name, email, phone, address, license, payment_method,
    category, car_name, daily_price, total_cost, rental_days, id_proof_path
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssiddss", 
    $full_name, $email, $phone, $address, $license, $payment_method,
    $category, $car_name, $daily_price, $total_cost, $rental_days, $targetFile
);

// Execute
if ($stmt->execute()) {
    header("Location: thankyou.html");
    exit();
} else {
    echo "❌ Database Error: " . $stmt->error;
}

// Optional Debugging: Uncomment below to see POST and FILES data
/*
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
*/
?>
