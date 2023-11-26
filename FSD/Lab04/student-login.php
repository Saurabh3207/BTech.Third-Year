<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "@Saurabh9833@";
$database = "registerform";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentUsername = $_POST["studentUsername"];
    $studentPassword = $_POST["studentPassword"];

    // Validate inputs (add any additional validation as needed)
    if (empty($studentUsername) || empty($studentPassword)) {
        echo "Both username and password are required.";
    } else {
        // Check if the provided username exists in the database
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $studentUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Verify the password
            if (password_verify($studentPassword, $row["password"])) {
                // Password is correct, student is logged in
                $_SESSION["student_username"] = $studentUsername; // Set the session variable
                header("Location: student-dashboard.php"); // Redirect to the dashboard
                exit;
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }

        $stmt->close();
    }
}

$conn->close();
?>