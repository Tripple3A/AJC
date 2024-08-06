<?php


include '../settings/core.php';
include '../settings/connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log(print_r($_POST, true));
    $meetingTitle = mysqli_real_escape_string($connection, $_POST['meetingTitle']);
    $studentName = mysqli_real_escape_string($connection, $_POST['studentName']);
    $studentEmail = mysqli_real_escape_string($connection, $_POST['studentEmail']);
    $roomNumber = mysqli_real_escape_string($connection, $_POST['roomNumber']);
    $meetingDate = mysqli_real_escape_string($connection, $_POST['meetingDate']);
    $meetingTime = mysqli_real_escape_string($connection, $_POST['meetingTime']);
    $inchargeNames = json_decode($_POST['inchargeNames'], true);
    $inchargeEmails = json_decode($_POST['inchargeEmails'], true);

   






    if (!$inchargeNames || !$inchargeEmails) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid incharge data.']);
        exit;
    }

    // Insert into Hearings table
    $sql = "INSERT INTO Hearings (meeting_title, student_name, student_email, room_number, meeting_date, meeting_time) VALUES ('$meetingTitle', '$studentName', '$studentEmail', '$roomNumber', '$meetingDate', '$meetingTime')";

    if (mysqli_query($connection, $sql)) {
        $hearingId = mysqli_insert_id($connection);

        // Insert persons in charge into PersonsInCharge table
        $success = true;
        for ($i = 0; $i < count($inchargeNames); $i++) {
            $name = mysqli_real_escape_string($connection, $inchargeNames[$i]);
            $email = mysqli_real_escape_string($connection, $inchargeEmails[$i]);
            $sql = "INSERT INTO PersonsInCharge (hearing_id, name, email) VALUES ('$hearingId', '$name', '$email')";
            if (!mysqli_query($connection, $sql)) {
                $success = false;
                break;
            }
        }

        if ($success) {
            echo json_encode(['status' => 'success', 'message' => 'Hearing scheduled successfully.']);
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
?>
