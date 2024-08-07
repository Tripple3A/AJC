<?php

// Fetch policies from the database
function getPolicies(){
    include '../settings/connection.php'; // Include the database connection
    $query = "SELECT policy_id, policy_title, policy_description FROM policy"; // Update this to match your actual table and columns
    $result = mysqli_query($connection, $query);
    $policies = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $policies[] = $row;
    }
    return $policies;
}
