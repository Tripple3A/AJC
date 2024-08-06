<?php
// Include the database connection file
include '../settings/connection.php';

// Check if the POST request contains the necessary data
if (isset($_POST['action']) && $_POST['action'] == 'update_status' && isset($_POST['hearing_id']) && isset($_POST['status'])) {
    
    // Retrieve the data from the POST request
    $hearing_id = intval($_POST['hearing_id']);
    $status_description = mysqli_real_escape_string($connection, $_POST['status']);

    // Prepare and execute the query to update the hearing status
    $query = "UPDATE Hearings 
              JOIN HearingStatus ON Hearings.hearing_status_id = HearingStatus.status_id
              SET Hearings.hearing_status_id = (SELECT status_id FROM HearingStatus WHERE status_description = '$status_description')
              WHERE Hearings.hearing_id = $hearing_id";
    
    if (mysqli_query($connection, $query)) {
        // If the query was successful
        echo json_encode(['status' => 'success', 'message' => 'Hearing status updated successfully']);
    } else {
        // If there was an error with the query
        echo json_encode(['status' => 'error', 'message' => 'An error occurred while updating the hearing status']);
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    // If the POST request does not contain the necessary data
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
