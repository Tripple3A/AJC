<?php

// Starting a session
session_start();



// Unset the sessions created during login
unset($_SESSION['user_id']);
unset($_SESSION['role_id']);

// Destroy the session
session_destroy();

// Redirect to the login_view page

header("Location: ../login/Login_view.php");
exit; // Ensure that no further code is executed after the redirect
?>


?>