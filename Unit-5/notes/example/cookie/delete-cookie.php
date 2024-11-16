<?php
// Delete the cookie by setting its expiration time to the past
setcookie("username", "", time() - 3600, "/");

// Notify user
echo "Cookie has been deleted!";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Cookie</title>
</head>
<body>
    <br>
    <a href="welcome.php">Go to Welcome Page</a>
</body>
</html>
