<?php
session_start();
include '../settings/connection.php'; // Include your connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the user ID from the session
    if (isset($_SESSION['user_id'])) {
        $user_id = intval($_SESSION['user_id']);
    } else {
        // Handle the case where the user is not logged in
        echo json_encode(['error' => 'User not logged in.']);
        exit;
    }

    // Validate and sanitize input
    $policy_title = mysqli_real_escape_string($connection, trim($_POST['policyTitle']));
    $policy_description = mysqli_real_escape_string($connection, trim($_POST['policyDescription']));

    if (empty($policy_title) || empty($policy_description)) {
        echo json_encode(['error' => 'Please fill in all fields.']);
        exit;
    }

    // Prepare the SQL query
    $query = "INSERT INTO Policy (policy_description, last_update,policy_title,user_id) 
              VALUES ('$policy_description', NOW(),'$policy_title', $user_id)";

    // Execute the query
    if (mysqli_query($connection, $query)) {
        echo json_encode(['success' => 'Policy added successfully.']);
    } else {
        $error = mysqli_error($connection);
        echo json_encode(['error' => 'An error occurred while adding the policy.', 'details' => $error]);
    }

    // Close the connection
    mysqli_close($connection);
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
