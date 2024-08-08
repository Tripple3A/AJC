<?php

// Fetch policies from the database
function getPolicies(){
    include '../settings/connection.php'; // Include the database connection
    $query = "SELECT policy_id, policy_description, last_update, policy_title, user_id FROM policy"; 
    $result = mysqli_query($connection, $query);
    $policies = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $policies[] = $row;
    }
    return $policies;
}
