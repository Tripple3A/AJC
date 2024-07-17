<?php
// Start a session
session_start();

// Function to check if the user is logged in
function checkLogin() {
    // Check if the user ID session exists
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the login_view page
        header("Location: ../login/Login_view.php");
        die();
    }
}

// Calling the checkLogin function to perform the login check
checkLogin();
?>