<?php
session_start();
include '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_SESSION['user_id'])) {
        $user_id = intval($_SESSION['user_id']);
    } else {
        echo json_encode(['error' => 'User not logged in.']);
        exit;
    }

    $policy_id = intval($_GET['policy_id']);

    $query = "SELECT * FROM Policy WHERE policy_id=$policy_id AND user_id=$user_id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $policy = mysqli_fetch_assoc($result);
        echo json_encode($policy);
    } else {
        $error = mysqli_error($connection);
        echo json_encode(['error' => 'An error occurred while fetching the policy details.', 'details' => $error]);
    }

    mysqli_close($connection);
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
