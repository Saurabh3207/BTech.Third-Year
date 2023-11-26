<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "@Saurabh9833@";
$dbname = "registerform";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, email, phone, course, rollno, actions FROM users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='styled-table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Roll No</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["username"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["phone"] . "</td>
            <td>" . $row["course"] . "</td>
            <td>" . $row["rollno"] . "</td>
            <td>" . (isset($row["actions"]) ? $row["actions"] : 'None') . "</td> <!-- Display the actions column -->
            <td>
            <form action='student-delete.php' method='get'>
                <input type='hidden' name='id' value='" . $row["id"] . "'>
                <button class='action-button delete-button' type='submit' name='delete'>Delete</button>
            </form>
            <button class='action-button modify-button' onclick='openModifyForm(" . $row["id"] . ")'>Modify</button>
        </td>
        </tr>";

        // Hidden modal form for modification
        echo "<div id='modifyForm" . $row["id"] . "' class='modal' style='display: none;'>
                <form action='modify-student.php' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                    <label for='new_username'>New Username:</label>
                    <input type='text' name='new_username' id='new_username' value='" . $row["username"] . "'><br>

                    <label for='new_email'>New Email:</label>
                    <input type='email' name='new_email' id='new_email' value='" . $row["email"] . "'><br>

                    <label for='new_phone'>New Phone:</label>
                    <input type='text' name='new_phone' id='new_phone' value='" . $row["phone"] . "'><br>

                    <label for='new_course'>New Course:</label>
                    <input type='text' name='new_course' id='new_course' value='" . $row["course"] . "'><br>

                    <label for='new_rollno'>New Roll No:</label>
                    <input type='text' name='new_rollno' id='new_rollno' value='" . $row["rollno"] . "'><br>

                    <button type='submit' name='modify'>Modify</button>
                    <button type='button' onclick='closeModifyForm(" . $row["id"] . ")'>Cancel</button>
                </form>
            </div>";
    }

    echo "</tbody></table>";
} else {
    echo "No students found.";
}

// Close the database connection
$conn->close();
?>
<script>
    function openModifyForm(studentId) {
        var modal = document.getElementById('modifyForm' + studentId);
        modal.style.display = 'block';
    }

    function closeModifyForm(studentId) {
        var modal = document.getElementById('modifyForm' + studentId);
        modal.style.display = 'none';
    }
</script>
<style>
    /* CSS styles for the table and buttons */
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .styled-table th, .styled-table td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    .styled-table th {
        background-color: #f2f2f2;
    }

    .action-button {
        padding: 5px 10px;
        margin: 2px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .delete-button {
        background-color: #ff3333;
        color: #fff;
    }

    .modify-button {
        background-color: #3399ff;
        color: #fff;
    }

    .cancel-button {
        background-color: #666;
        color: #fff;
    }
</style>