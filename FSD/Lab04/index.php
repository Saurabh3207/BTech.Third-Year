<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure the content takes up at least the full viewport height */
        }
        
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            flex-grow: 1; /* Allow the container to grow and push the footer down */
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #37b9f1;
        }
        
        .login-section {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .login-section h2 {
            text-align: center;
        }

        .login-form {
            background-color: #8739f9;
            margin-top: 20px;
            border-radius: 5px;
            width: 100%; 
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            padding: 20px;
        }

        .login-form label,
        .login-form input,
        .login-form button-container {
            display: block;
            margin: 10px 0;
        }

        .login-form button-container {
            display: flex;
            justify-content: space-between; /* Place buttons side by side */
        }

        .login-form button {
            flex: 1; 
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            background-color: #37b9f1;
        }

        .login-form button.signup {
            background-color: #4CAF50;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to MIT WORLD PEACE UNIVERSITY ERP</h1>
    </header>

    <div class="container">
        <div class="login-section">
            <h2>Student Login</h2>
            <div class="login-form">
                <!-- Student login form goes here -->
                <form method="post" action="student-login.php">

                    <label for="studentUsername">Username:</label>
                    <input type="text" id="studentUsername" name="studentUsername" required>
                    <label for="studentPassword">Password:</label>
                    <input type="password" id="studentPassword" name="studentPassword" required>
                    <div class="button-container">
                        <button type="submit">Login</button>
                        <a href="student-register.php"><button type="button" class="signup">Sign Up</button></a>
                    </div>
                </form>
            </div>
        </div>

        <div class="login-section">
            <h2>Faculty Login</h2>
            <div class="login-form">
                <!-- Faculty login form goes here -->
                <form method="post" action="faculty-login.php">
                    <label for="facultyUsername">Username:</label>
                    <input type="text" id="facultyUsername" name="facultyUsername" required>
                    <label for="facultyPassword">Password:</label>
                    <input type="password" id="facultyPassword" name="facultyPassword" required>
                    <div class="button-container">
                        <button type="submit">Login</button>
                        <a href="faculty-register.php"><button type="button" class="signup">Sign Up</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2023 Saurabh Jitendra Jadhav
    </footer>
</body>
</html>
