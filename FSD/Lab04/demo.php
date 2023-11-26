<?php
session_start(); // Start the session

// Check if the faculty member is logged in (session variable is set)
if (isset($_SESSION["faculty_username"])) {
    $facultyUsername = $_SESSION["faculty_username"]; // Retrieve the faculty member's username from the session
} else {
    // If not logged in, redirect to the faculty landing page
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
    <style>
       body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
        header {
            background-color: #fff;
            color: #333;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header img {
            max-height: 50px;
        }

        .welcome {
            font-size: 18px;
            margin-right: 10px;
        }

        .logout {
            background-color: #f00;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-left:10%;
        }

       
        .container {
            flex: 1;
            display: flex;
         }


        .sidebar {
            background-color: #8739f9;
            color: #fff;
            width: 250px;
            padding: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        
        .sidebar ul li {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .sidebar ul li:hover {
            background-color: #5a3cd0;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #37b9f1;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .welcome {
            margin-left: auto;
        }
        
        
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    
        <header>
            
            <div class="welcome">
                Welcome, <?php echo $facultyUsername; ?>
            </div>
            <form action="faculty-dashboard.php" method="post">
                <button type="submit" class="logout" name="logout">Logout</button>
             </form>
        </header>

        <div class="container">
            <div class="sidebar">
             <ul>
                <li id="timetable-menu">Timetable</li>
                <li id="courses-menu">Courses</li>
                <li id="attendance-menu">Attendance</li>
                <li id="view-students">View Students</li>
                <li id="add-students">Add Students</li>
                </ul>
            </div>

            <div class="main-content">
                <div id="timetable-section">
                  <img id="timetable-img" src="tt.png" alt="time-table">
                </div>
                <div id="courses-section" class="hidden">
                 <h1>development is still in progress</h1>
                </div>
                <div id="attendance-section" class="hidden">
                    <!-- Attendance content goes here -->
                </div>
                <div id="view-students-section" class="hidden">
                <?php
                    include("view-student.php");
                ?>
                </div>
                <div id="add-students-section" class="hidden" class="hidden" style="overflow: auto; max-height: 100%;">
                <?php
                    include("add-student.php");
                ?>
                </div>
            </div>
        </div>
  
        <footer>
            &copy; @ Author: Saurabh Jadhav 2023
        </footer>
    
    
    <script>
         
const timetableMenuItem = document.getElementById('timetable-menu');
const coursesMenuItem = document.getElementById('courses-menu');
const attendanceMenuItem = document.getElementById('attendance-menu');
const viewStudentsMenuItem = document.getElementById('view-students');
const addStudentsMenuItem = document.getElementById('add-students');


// Get references to the content sections
const timetableSection = document.getElementById('timetable-section');
const coursesSection = document.getElementById('courses-section');
const attendanceSection = document.getElementById('attendance-section');
const viewStudentsSection = document.getElementById('view-students-section');
const addStudentsSection = document.getElementById('add-students-section');

// Function to show content in the main-content area
function showContent(section) {
    // Hide all sections
    timetableSection.style.display = 'none';
    coursesSection.style.display = 'none';
    attendanceSection.style.display = 'none';
    viewStudentsSection.style.display = 'none';
    addStudentsSection.style.display = 'none';


    // Show the selected section
    section.style.display = 'block';
}

// Add click event listeners to the menu items
timetableMenuItem.addEventListener('click', () => {
    showContent(timetableSection);
});

coursesMenuItem.addEventListener('click', () => {
    showContent(coursesSection);
});

attendanceMenuItem.addEventListener('click', () => {
    showContent(attendanceSection);
});

viewStudentsMenuItem.addEventListener('click', () => {
    showContent(viewStudentsSection);
});

addStudentsMenuItem.addEventListener('click', () => {
    showContent(addStudentsSection);
});


</script>
</body>
</html>