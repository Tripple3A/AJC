<?php
session_start();
include '../settings/connection.php'; // Include the database connection

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = mysqli_real_escape_string($connection, $_POST['action']);

    if ($action === 'update_status') {
        $caseId = mysqli_real_escape_string($connection, $_POST['case_id']);
        $status = mysqli_real_escape_string($connection, $_POST['status']);

        // Fetch verdict status ID
        $statusQuery = "SELECT verdict_status_id FROM VerdictStatus WHERE verdict_status_description = '$status'";
        $result = mysqli_query($connection, $statusQuery);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            $verdict_status_id = $row['verdict_status_id'];

            // Update the case status
            $updateCaseQuery = "UPDATE Cases SET verdict_status_id = $verdict_status_id WHERE case_id = $caseId";
            if (mysqli_query($connection, $updateCaseQuery)) {
                // Update the Verdict table with the new verdict status
                $updateVerdictQuery = "UPDATE Verdict SET verdict_description = '$status', verdict_date = CURDATE()
                                       WHERE case_id = $caseId";
                if (mysqli_query($connection, $updateVerdictQuery)) {
                    echo "Success";
                } else {
                    echo "Error updating verdict: " . mysqli_error($connection);
                }
            } else {
                echo "Error updating case: " . mysqli_error($connection);
            }
        } else {
            echo "Error fetching verdict status: " . mysqli_error($connection);
        }
    } elseif ($action === 'delete_case') {
        $caseId = mysqli_real_escape_string($connection, $_POST['case_id']);
        
        // Delete associated verdict records
        $deleteVerdictQuery = "DELETE FROM Verdict WHERE case_id = $caseId";
        if (!mysqli_query($connection, $deleteVerdictQuery)) {
            echo "Error deleting verdict: " . mysqli_error($connection);
            exit; // Exit if there is an error deleting from the Verdict table
        }

        // Delete the case
        $deleteCaseQuery = "DELETE FROM Cases WHERE case_id = $caseId";
        if (mysqli_query($connection, $deleteCaseQuery)) {
            echo "Success";
        } else {
            echo "Error deleting case: " . mysqli_error($connection);
        }
    }
}

mysqli_close($connection);
?>
