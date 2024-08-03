<?php
// Include the database connection file
include '../settings/connection.php';

// Define the query to join with Reports and VerdictStatus tables
$query = "
    SELECT 
        c.case_id,
        r.report_description AS case_description,
        c.report_date,
        vs.verdict_status_description AS status
    FROM 
        Cases c
    JOIN 
        Reports r ON c.report_id = r.report_id
    JOIN 
        VerdictStatus vs ON c.verdict_status_id = vs.verdict_status_id
";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch all results as an associative array
    $cases = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the query execution error
    echo 'Failed to execute the query: ' . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
