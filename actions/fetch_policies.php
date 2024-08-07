<?php
include '../settings/connection.php'; // Include the database connection

// Fetch policies from the database
$query = "SELECT id, title, description FROM policies"; // Update this to match your actual table and columns
$result = mysqli_query($connection, $query);

$policies = [];

while ($row = mysqli_fetch_assoc($result)) {
    $policies[] = $row;
}

// Return policies as JSON
header('Content-Type: application/json');
echo json_encode($policies);

// Close the database connection
mysqli_close($connection);
?>
