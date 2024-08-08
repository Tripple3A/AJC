<?php
session_start();
include '../settings/connection.php'; // Include your connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['user_id'])) {
        $user_id = intval($_SESSION['user_id']);
    } else {
        echo json_encode(['error' => 'User not logged in.']);
        exit;
    }

    $policy_id = intval($_POST['policy_id']);
    $policy_title = mysqli_real_escape_string($connection, trim($_POST['policyTitle']));
    $policy_description = mysqli_real_escape_string($connection, trim($_POST['policyDescription']));

    if (empty($policy_title) || empty($policy_description)) {
        echo json_encode(['error' => 'Please fill in all fields.']);
        exit;
    }

    $query = "UPDATE Policy SET policy_title='$policy_title', policy_description='$policy_description', last_update=NOW() WHERE policy_id=$policy_id AND user_id=$user_id";

    if (mysqli_query($connection, $query)) {
        echo json_encode(['success' => 'Policy updated successfully.']);
    } else {
        $error = mysqli_error($connection);
        echo json_encode(['error' => 'An error occurred while updating the policy.', 'details' => $error]);
    }

    mysqli_close($connection);
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
