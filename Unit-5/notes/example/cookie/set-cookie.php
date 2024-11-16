<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    if (!empty($username)) {
        // Set the username cookie that expires in 400 seconds
        setcookie("username", $username, time() + 15, "/");

        // Set another cookie to track the time when the cookie was set
        setcookie("set_time", time(), time() + 15, "/");

        // Notify user
        echo "Cookie is set! <br>";
    } else {
        echo "Enter username to set the cookie! <br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Set Cookie</title>
</head>
<body>
    <h2>Enter your name to set a cookie</h2>
    <form method="POST" action="">
        Name: <input type="text" name="username"><br><br>
        <input type="submit" value="Submit">
    </form>

    <br>
    <a href="welcome.php">Go to Welcome Page</a>
</body>
</html>
