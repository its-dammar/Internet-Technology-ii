<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded login credentials (in real-world, retrieve from database)
    $correctUsername = "admin";
    $correctPassword = "1234";

    // Check login credentials
    if ($username == $correctUsername && $password == $correctPassword) {
        // Store username in the session
        $_SESSION['username'] = $username;

        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
