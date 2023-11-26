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
    $facultyUsername = $_POST["facultyUsername"];
    $facultyPassword = $_POST["facultyPassword"];

    // Validate inputs (add any additional validation as needed)
    if (empty($facultyUsername) || empty($facultyPassword)) {
        echo "Both username and password are required.";
    } else {
        // Check if the provided username exists in the "faculty" table
        $sql = "SELECT * FROM faculty WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $facultyUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Verify the password
            if (password_verify($facultyPassword, $row["password"])) {
                // Password is correct, faculty member is logged in
                $_SESSION["faculty_username"] = $facultyUsername; // Set the session variable
                header("Location: faculty-dashboard.php"); // Redirect to the dashboard
                exit;
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }

        $stmt->close();
    }
    
    // Close the database connection
    $conn->close();
}
?>
