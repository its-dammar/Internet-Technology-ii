<!DOCTYPE html>
<html>

<head>
    <title>Message Input</title>
</head>

<body>
    <a href="write.php"> Write Mode</a> &nbsp;&nbsp;
    <a href="read.php"> Read Mode</a>&nbsp;&nbsp;
    <a href="apend-mode.php"> Append Mode</a>&nbsp;&nbsp;

    <h2>Enter your message</h2>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the message from the user and trim any extra spaces
        $userMessage = trim($_POST['message']);

        // Ensure that the message is not empty before writing to the file
        if (!empty($userMessage)) {
            // File path
            $filename = "files/apendmode.txt";

            // Open file in append mode ('a' to preserve old content)
            $file = fopen($filename, "a");

            // Add a timestamp or newline to separate messages
            $messageWithTimestamp = "\n" . date('Y-m-d H:i:s') . " - User message: " . $userMessage . "\n";

            // Write the user's message to the file
            $write = fwrite($file, $messageWithTimestamp);

            // Check if the message was successfully written
            if ($write) {
                echo "Your message has been saved!";
            } else {
                echo "Failed to save your message.";
            }

            // Close the file
            fclose($file);
        } else {
            echo 'Please enter a valid message.';
        }
    } else {
        echo "Please submit the form to enter your message.";
    }
    ?>

    <form action="" method="POST">
        <textarea name="message" rows="5" cols="40" placeholder="Type your message here..."></textarea><br><br>
        <input type="submit" value="Submit">
    </form>

    <div>
        <div class="title">
            <h4>View the message</h4>
        </div>
        <?php
        // File path
        $filename = "files/apendmode.txt";

        // Check if the file exists before trying to read it
        if (file_exists($filename)) {
            // Display the content of the file
            echo "\n--- File Content ---\n";
            echo nl2br(file_get_contents($filename));
        } else {
            echo "No messages found.";
        }
        ?>
    </div>

</body>

</html>


<!-- 

file_get_contents($filename):
This function reads the entire content of the specified file ($filename) and returns it as a string.
It retrieves all the content from the file, including any line breaks (\n).

nl2br():
This function converts all newline characters (\n) in the string to HTML <br> tags.
In HTML, line breaks (\n) do not show up by default, so using nl2br() ensures that line breaks are visible when the content is displayed on a web page. 

The trim() function removes any unnecessary spaces before or after the message input, preventing blank messages containing only spaces.

-->
