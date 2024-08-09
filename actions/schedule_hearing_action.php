<?php

include '../settings/core.php';
include '../settings/connection.php';
include '../actions/email_send.php'; // Make sure this path is correct
header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    // Read the raw POST data
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!$data) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON input.']);
        exit;
    }

    // Sanitize and extract the data
    $meetingTitle = mysqli_real_escape_string($connection, $data['meetingTitle']);
    $studentName = mysqli_real_escape_string($connection, $data['studentName']);
    $studentEmail = mysqli_real_escape_string($connection, $data['studentEmail']);
    $roomNumber = mysqli_real_escape_string($connection, $data['roomNumber']);
    $meetingDate = mysqli_real_escape_string($connection, $data['meetingDate']);
    $meetingTime = mysqli_real_escape_string($connection, $data['meetingTime']);
    $inchargeNames = $data['inchargeNames'];
    $inchargeEmails = $data['inchargeEmails'];

    error_log("Meeting Title: $meetingTitle");
    error_log("Student Name: $studentName");
    error_log("Student Email: $studentEmail");
    error_log("Room Number: $roomNumber");
    error_log("Meeting Date: $meetingDate");
    error_log("Meeting Time: $meetingTime");
    error_log("Incharge Names: " . implode(", ", $inchargeNames));
    error_log("Incharge Emails: " . implode(", ", $inchargeEmails));

    if (!$inchargeNames || !$inchargeEmails || count($inchargeNames) !== count($inchargeEmails)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid incharge data.']);
        exit;
    }

    // Insert into Hearings table
    $sql = "INSERT INTO Hearings (meeting_title, student_name, student_email, room_number, meeting_date, meeting_time) VALUES ('$meetingTitle', '$studentName', '$studentEmail', '$roomNumber', '$meetingDate', '$meetingTime')";

    if (mysqli_query($connection, $sql)) {
        $hearingId = mysqli_insert_id($connection);




        // Insert persons in charge into PersonsInCharge table
        $success = true;
        $errorMessage = ''; // Variable to store the error message
        for ($i = 0; $i < count($inchargeNames); $i++) {
            $name = mysqli_real_escape_string($connection, $inchargeNames[$i]);
            $email = mysqli_real_escape_string($connection, $inchargeEmails[$i]);
            $sql = "INSERT INTO PersonsInCharge (hearing_id, personname, email) VALUES ('$hearingId', '$name', '$email')";
            if (!mysqli_query($connection, $sql)) {
                $errorMessage = mysqli_error($connection);
                $success = false;
                break;
            }
        }

        if ($success) {
            // Prepare email content
             $subject = "Hearing Scheduled: $meetingTitle";
             $body = "<p>Dear $studentName,</p>
                      <p>Your hearing has been scheduled as follows:</p>
                      <p><strong>Meeting Title:</strong> $meetingTitle</p>
                     <p><strong>Room Number:</strong> $roomNumber</p>
                      <p><strong>Date:</strong> $meetingDate</p>
                      <p><strong>Time:</strong> $meetingTime</p>
                      <p>Best regards,<br>Ashesi Judicial Council Team</p>";

             // Send email to student
             if (send_email_to($studentEmail, $subject, $body)) {
                echo json_encode(['status' => 'success', 'message' => 'Hearing scheduled successfully and email sent to student.']);
             } else {
                 echo json_encode(['status' => 'success', 'message' => 'Hearing scheduled successfully, but failed to send email to student.', 'sql_error' => $errorMessage, $studentName, $roomNumber, $meetingDate, $meetingTime, $studentEmail]);
             }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add persons in charge.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to schedule hearing.']);
    }

    mysqli_close($connection);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
