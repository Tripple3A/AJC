<?php
include '../settings/connection.php';

// Define the query to fetch report data
$query = "
    SELECT 
        ct.case_type_description AS category,
        COUNT(c.case_id) AS total_cases,
        SUM(CASE WHEN v.verdict_description = 'Pending' THEN 1 ELSE 0 END) AS pending_cases,
        SUM(CASE WHEN v.verdict_description = 'Under Investigation' THEN 1 ELSE 0 END) AS under_investigation_cases,
        SUM(CASE WHEN v.verdict_description = 'Closed' THEN 1 ELSE 0 END) AS closed_cases,
        SUM(CASE WHEN v.verdict_description = 'Resolved' THEN 1 ELSE 0 END) AS Completed_cases
    FROM 
        Cases AS c
    LEFT JOIN 
        Verdict AS v ON c.case_id = v.case_id
    LEFT JOIN 
        CaseType AS ct ON c.case_id = ct.case_type_id
    GROUP BY 
        ct.case_type_description
";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch all results as an associative array
    $reportData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // Output the data in JSON format
    echo json_encode($reportData);
} else {
    // Return an error message if the query fails
    echo json_encode(['error' => 'An error occurred while generating the report.', 'details' => mysqli_error($connection)]);
}

// Close the database connection
mysqli_close($connection);
?>
