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

$registrationSuccess = false; // Initialize the registration success variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $department = $_POST["department"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validate inputs
    if (empty($username) || empty($email) || empty($phone) || empty($department) || empty($password) || empty($confirmPassword)) {
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
        // Insert data into the faculty table (excluding confirmPassword)
        $sql = "INSERT INTO faculty (username, email, phone, department, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username, $email, $phone, $department, $hashedPassword);

        if ($stmt->execute()) {
            $registrationSuccess = true; // Set registration success to true
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Registration</title>
    <link rel="stylesheet" href="style1.css"> 
    
</head>
<body>
    <div id="success-popup" class="popup">
    <p>Registration successful!</p>
    </div>
    <div class="container">
        <h2>Faculty Registration</h2>
        <form id="facultyRegistrationForm" onsubmit="return validateForm()" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="phone">Phone number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button id="button" type="submit">Register</button>
        </form>
    </div>
    <script src="script.js"></script> 
    <script>
    <?php if (isset($registrationSuccess) && $registrationSuccess === true) : ?>
    // Registration was successful, show the success popup
    var successPopup = document.getElementById("success-popup");
    successPopup.style.display = "block";

    setTimeout(function() {
        window.location.href = "faculty-dashboard.php";
    }, 3000); 
    <?php endif; ?>
</script>

</body>
</html>
