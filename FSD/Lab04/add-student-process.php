<?php

$servername = "localhost";
$username = "root";
$password = "your MYSQL password here if not set then keep it blank";
$dbname = "registerform";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $course = $_POST["course"];
    $rollno = $_POST["rollno"];

    $sql = "INSERT INTO users (username, email, phone, password, course, rollno) 
            VALUES ('$username', '$email', '$phone', '$password', '$course', '$rollno')";

    if ($conn->query($sql) === TRUE) {
        echo "Student record added successfully! Redirecting...";
        echo "<script>setTimeout(function(){ window.location.href = 'faculty-dashboard.php'; }, 2000);</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
