<?php
session_start(); // Start the session

// Check if the student is logged in (session variable is set)
if (isset($_SESSION["student_username"])) {
    $studentUsername = $_SESSION["student_username"]; // Retrieve the student's username from the session
} else {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
            color:#333;
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
            background-color: #fff;
            color:#333;
            text-align: center;
            padding: 10px 0;
        }
        .welcome{
            margin-left: 58%;
        }
        #timetable-img{
            margin-left:10%;
        }
        #notices-section {
            display: none;
        }
        .notice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            margin-top: 20px;
        }

        .notice-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .notice-content {
            font-size: 16px;
            line-height: 1.6;
            color: #666;
        }

        .notice-date {
            font-size: 14px;
            color: #999;
            margin-top: 10px;
        }

        .notice-footer {
            margin-top: 20px;
            text-align: right;
        }

        .notice-footer a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <header>
        <img src="logo.jpg" alt="College Logo">
        <div class="welcome">
         Welcome, <?php echo $studentUsername; ?>
        </div>
        <div>
            <form action="logout.php" method="post">
            <button type="submit" class="logout">Logout</button>
        </form>
        </div>
    </header>

    <div class="container">
        <div class="sidebar">
            <ul>
           
                <li id="timetable-menu">Timetable</li>
                <li id="notices-menu">Notices</li>
                <li id="course-details-menu">Course Details</li>
                <li id="payment-status-menu">Payment Status</li>
            </ul>
        </div>

    <div class="main-content">
      
        <div id="timetable-section">
            <img id="timetable-img" src="tt.png" alt="time-table">
        </div>
        <div id="notices-section">
         <div class="notice-container">
             <div class="notice-title">
                Important Notice for Students
             </div>
                <div class="notice-content">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac orci a metus hendrerit posuere non ut libero. Fusce aliquet id tellus non tristique.</p>
                     <p>Nulla facilisi. Pellentesque vel metus non metus lacinia varius. Suspendisse potenti. Vestibulum id nunc non nisi tempus tincidunt.</p>
                </div>  
                     <div class="notice-date">Published on: October 15, 2023</div>
                    <div class="notice-footer">
                    <a href="#">Read More</a>
                 </div>
            </div>
            <div class="notice-container">
             <div class="notice-title">
                Important Notice for Students
             </div>
                <div class="notice-content">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac orci a metus hendrerit posuere non ut libero. Fusce aliquet id tellus non tristique.</p>
                     <p>Nulla facilisi. Pellentesque vel metus non metus lacinia varius. Suspendisse potenti. Vestibulum id nunc non nisi tempus tincidunt.</p>
                </div>  
                     <div class="notice-date">Published on: October 15, 2023</div>
                    <div class="notice-footer">
                    <a href="#">Read More</a>
                 </div>
            </div>
        </div>
    
        </div>
        <div id="course-details-section">
        <!-- Course details content goes here -->
        </div>
        <div id="payment-status-section">
        <!-- Payment status content goes here -->
        </div>
        </div>
    </div>
 
    <footer>
        &copy; 2023 Your College Name
    </footer>

    
    <script>
        // Function to hide all sections
        function hideAllSections() {
            timetableSection.style.display = "none";
            noticesSection.style.display = "none";
            courseDetailsSection.style.display = "none";
            paymentStatusSection.style.display = "none";
        }

        // Get references to the sidebar menu items and content sections
        const timetableMenu = document.getElementById("timetable-menu");
        const noticesMenu = document.getElementById("notices-menu");
        const courseDetailsMenu = document.getElementById("course-details-menu");
        const paymentStatusMenu = document.getElementById("payment-status-menu");

        const timetableSection = document.getElementById("timetable-section");
        const noticesSection = document.getElementById("notices-section");
        const courseDetailsSection = document.getElementById("course-details-section");
        const paymentStatusSection = document.getElementById("payment-status-section");

        // Add event listeners to the sidebar menu items
        timetableMenu.addEventListener("click", () => {
            hideAllSections();
            timetableSection.style.display = "block";
        });

        noticesMenu.addEventListener("click", () => {
            hideAllSections();
            noticesSection.style.display = "block";
        });

        courseDetailsMenu.addEventListener("click", () => {
            hideAllSections();
            courseDetailsSection.style.display = "block";
        });

        paymentStatusMenu.addEventListener("click", () => {
            hideAllSections();
            paymentStatusSection.style.display = "block";
        });

        // Initially, only show the timetable section
        timetableSection.style.display = "block";
    </script>
</body>
</html>
