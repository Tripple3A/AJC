<?php
include '../settings/core.php';

header('Content-Type: application/json');

// Replace with your actual database connection and query
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT case_id, report_id, verdict_status_id, user_id, report_date FROM cases"; 
$result = $conn->query($sql);

$cases = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cases[] = $row;
    }
}

$conn->close();

echo json_encode($cases);
?>
