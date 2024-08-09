<?php

// Fetch policies from the database
function getPolicies(){
    include '../settings/connection.php'; // Include the database connection
    $query = "SELECT policy_id, policy_description, last_update, policy_title, user_id FROM Policy"; 
    $result = mysqli_query($connection, $query);
    $policies = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $policies[] = $row;
        }
    }
    return $policies;
}