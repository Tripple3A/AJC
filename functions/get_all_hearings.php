<?php
// Include the database connection file
include '../settings/connection.php';

// Define the query to join Hearings and PersonsInCharge tables
$query = "
    SELECT 
        h.hearing_id AS hearing_id,
        h.meeting_title AS title,
        p.name AS person_in_charge,
        p.email AS person_in_charge_email,
        h.student_name,
        h.student_email,
        h.room_number AS conference_room_number,
        h.meeting_date AS date,
        h.meeting_time AS time
    FROM 
        Hearings h
    JOIN 
        PersonsInCharge p ON h.hearing_id = p.hearing_id
";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch all results as an associative array
    $hearings = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the query execution error
    echo 'Failed to execute the query: ' . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
