<!DOCTYPE html>
<html>

<head>
    <title>Message Input</title>
</head>

<body>
    <a href="write.php"> Write Mode</a> &nbsp;&nbsp;
    <a href="read.php"> Read Mode</a>&nbsp;&nbsp;
    <a href="apend-mode.php"> Apend Mode</a>&nbsp;&nbsp;

    <h2>Enter your message (Write)</h2>
    <?php
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the message from the user
        $userMessage = $_POST['message'];

        // File path
        $filename = "files/write.txt";

        // Open file in append mode ('a' to preserve old content)
        $file = fopen($filename, "w");

        // Add a timestamp or newline to separate messages
        $messageWithTimestamp = "\n" . 'Date:' . date('Y-m-d H:i:s') . " - Mmessage: " . $userMessage . "\n";

        // Write the user's message to the file
        $write = fwrite($file, $messageWithTimestamp);

        // Check if the message was successfully written
        if ($write) {
            echo "Your message has been saved! <br>";
        } else {
            echo "Failed to save your message. <br>";
        }

        // Close the file
        fclose($file);
    } else {
        echo "Please submit the form to enter your message.";
    }
    ?>

    <form action="" method="POST">
        <textarea name="message" rows="5" cols="40" placeholder="Type your message here..."></textarea><br><br>
        <input type="submit" value="Submit">
    </form>

  
</body>

</html>


<!-- file_get_contents($filename):
This function reads the entire content of the specified file ($filename) and returns it as a string.
It retrieves all the content from the file, including any line breaks (\n).

nl2br():
This function converts all newline characters (\n) in the string to HTML <br> tags.
In HTML, line breaks (\n) do not show up by default, so using nl2br() ensures that line breaks are visible when the content is displayed on a web page. -->