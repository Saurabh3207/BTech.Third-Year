<?php
session_start(); // Start the session

if (isset($_SESSION["student_username"])) {
    // If logged in, destroy the session to log the student out
    session_destroy();
}

// Redirect the student to the login page after logout
header("Location: index.php");
exit;
?>
