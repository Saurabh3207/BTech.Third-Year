<?php
$servername = "localhost";
$username = "root";
$password = "@Saurabh9833@";
$dbname = "registerform";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $studentId = $_GET["id"];

    // Perform the deletion
    $sql = "DELETE FROM users WHERE id = $studentId";
    if ($conn->query($sql) === TRUE) {
        // Update the 'actions' column with a deletion message
        $updateActionsSql = "UPDATE users SET actions = 'Deleted' WHERE id = $studentId";
        $conn->query($updateActionsSql);
    
        echo "Student record deleted successfully! Redirecting...";
        echo "<script>setTimeout(function(){ window.location.href = 'faculty-dashboard.php'; }, 2000);</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
