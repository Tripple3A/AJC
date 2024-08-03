<?php
session_start();
include '../settings/connection.php'; // Include the database connection

$errors = array();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $caseTitle = mysqli_real_escape_string($connection, $_POST['caseTitle']);
    $caseType = mysqli_real_escape_string($connection, $_POST['caseType']);
    $caseDetails = mysqli_real_escape_string($connection, $_POST['caseDetails']);
    $userId = $_SESSION['user_id']; // Assuming user_id is stored in session

    // Validate required fields
    if (empty($caseTitle)) {
        $errors['casetitle'] = "Case title is required";
    } 
    if (empty($caseType)) {
        $errors['casetype'] = "Case type is required";
    }
    if (empty($caseDetails)) {
        $errors['casedetails'] = "Case details are required";
    }

    // Check if there are any errors
    if (!empty($errors)) {
        echo json_encode($errors);
        exit();
    }

    // Handle file upload
    $evidencePath = null;
    if (isset($_FILES['evidence']) && $_FILES['evidence']['error'] == 0) {
        $evidenceDir = '../uploads/evidence/';
        if (!is_dir($evidenceDir)) {
            mkdir($evidenceDir, 0777, true);
        }
        $evidencePath = $evidenceDir . basename($_FILES['evidence']['name']);
        if (!move_uploaded_file($_FILES['evidence']['tmp_name'], $evidencePath)) {
            echo json_encode(array('evidence' => 'Failed to upload evidence.'));
            exit();
        }
    }

    // Insert report into the Reports table
    

    $dateReported = date('Y-m-d');
    $insertReportQuery = "INSERT INTO Reports (report_description, date_reported, title, user_id, evidence)
                          VALUES ('$caseDetails', '$dateReported', '$caseTitle', $userId, '$evidencePath')";

    if (mysqli_query($connection, $insertReportQuery)) {
        $reportId = mysqli_insert_id($connection);

        // Insert case into the Cases table
        $reportDate = date('Y-m-d');
        $insertCaseQuery = "INSERT INTO Cases (report_id, verdict_status_id, user_id, report_date)
                            VALUES ($reportId, 1, $userId, '$reportDate')";




        if (!mysqli_query($connection, $insertCaseQuery)) {
            echo json_encode(array('db' => 'Failed to insert report: ' . mysqli_error($connection)));
            exit();
        }

        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('db' => 'Failed to insert report: ' . mysqli_error($connection)));
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
