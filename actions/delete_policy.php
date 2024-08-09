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

    $query = "DELETE FROM Policy WHERE policy_id=$policy_id AND user_id=$user_id";

    if (mysqli_query($connection, $query)) {
        $affected_rows = mysqli_affected_rows($connection);
        echo json_encode(['success' => 'Policy deleted successfully.',
            'affected_rows' => $affected_rows]);
    } else {
        $error = mysqli_error($connection);
        echo json_encode(['error' => 'An error occurred while deleting the policy.', 'details' => $error]);
    }

    mysqli_close($connection);
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
