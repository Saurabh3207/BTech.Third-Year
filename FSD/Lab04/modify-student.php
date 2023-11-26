<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $studentId = $_POST["id"];
    $newUsername = $_POST["new_username"];
    $newEmail = $_POST["new_email"];
    $newPhone = $_POST["new_phone"];
    $newCourse = $_POST["new_course"];
    $newRollNo = $_POST["new_rollno"];

    // Create a database connection (similar to your other pages)
    $servername = "localhost";
    $username = "root";
    $password = "@Saurabh9833@";
    $dbname = "registerform";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform the modification in the database
    $sql = "UPDATE users
            SET username = '$newUsername', email = '$newEmail', phone = '$newPhone', course = '$newCourse', rollno = '$newRollNo'
            WHERE id = $studentId";

    if ($conn->query($sql) === TRUE) {
        // Update the 'actions' column with a modification message
        $updateActionsSql = "UPDATE users SET actions = 'Modified' WHERE id = $studentId";
        $conn->query($updateActionsSql);

        echo "Student record modified successfully! Redirecting...";
        echo "<script>setTimeout(function(){ window.location.href = 'faculty-dashboard.php'; }, 2000);</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
