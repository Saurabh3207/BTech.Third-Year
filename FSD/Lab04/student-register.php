<?php
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
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $course = $_POST["course"]; // New field
    $rollno = $_POST["rollno"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    
    // Validate inputs
    if (empty($username) || empty($email) || empty($phone) || empty($course) || empty($rollno) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
    } elseif (!preg_match("/^\d{10}$/", $phone)) {
        echo "Phone number must be numeric and have 10 digits.";
    } elseif ($password !== $confirmPassword) {
        echo "Password and Confirm Password do not match.";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[@#$&]).{7,}$/", $password)) {
        echo "Password must be at least 7 characters and include at least one capital letter, one digit, and one special character (@, #, $, or &).";
    } else {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert data into the users table
        $sql = "INSERT INTO users (username, email, phone, course, rollno, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $username, $email, $phone, $course, $rollno, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "Registration successful!";
            header("Location: index.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSD-03: Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <div class="container">
        <h2>Student Registration</h2>
        <h6>PA12-SaurabhJadhav</h6>
        <form id="registrationForm" onsubmit="return validateForm()" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="phone">Phone number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required>


            <label for="phone">Roll No:</label>
            <input type="text" id="rollno" name="rollno" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            
            <button id="button" type="submit">Register</button>
        </form>
    </div>
<script src="script.js"></script>
</body>
</html>
