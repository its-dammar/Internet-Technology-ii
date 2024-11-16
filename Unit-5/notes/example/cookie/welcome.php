<?php
// Check if the 'username' cookie is set and not expired
if (isset($_COOKIE['username'])) {
    // Retrieve the cookie expiration time (10 seconds from when the cookie was set)
    $cookieSetTime = $_COOKIE['set_time']; // Store the set time in a separate cookie
    $cookieExpirationTime = $cookieSetTime + 15; // 10 seconds expiration
    
    // Calculate time remaining for the cookie
    $timeLeft = $cookieExpirationTime - time();

    // If time is left, display it
    if ($timeLeft > 0) {
        echo "Welcome back, " . $_COOKIE['username'] . "!<br>";
        echo "Time remaining for the cookie: <span id='countdown'>" . $timeLeft . "</span> seconds.<br>";
    } else {
        // If the cookie is expired, redirect to set-cookie page
        header("Location: set-cookie.php");
        exit;
    }
} else {
    // If the cookie is not set, redirect to the set-cookie page
    header("Location: set-cookie.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <script>
        // JavaScript countdown timer
        var timeLeft = <?php echo $timeLeft; ?>;
        var countdownElement = document.getElementById('countdown');

        // Update the countdown every second
        var timer = setInterval(function() {
            if (timeLeft <= 0) {
                clearInterval(timer);
                // Redirect to the set-cookie page when time is up
                window.location.href = "set-cookie.php";
            } else {
                timeLeft--;
                countdownElement.innerHTML = timeLeft;
            }
        }, 1000);
    </script>
</head>
<body>
    <br>
    <a href="set-cookie.php">Set Cookie</a> | 
    <a href="delete-cookie.php">Delete Cookie</a>
</body>
</html>
