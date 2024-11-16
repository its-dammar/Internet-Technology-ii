<!DOCTYPE html>
<html>

<head>
    <title>Message Input</title>
</head>

<body>
    <a href="write.php"> Write Mode</a> &nbsp;&nbsp;
    <a href="read.php"> Read Mode</a>&nbsp;&nbsp;
    <a href="apend-mode.php"> Apend Mode</a>&nbsp;&nbsp;

    <div>
        <div class="title">
            <h4>View All Messages</h4>
        </div>
        <?php

        $filename = "files/write.txt";
        // Check if the file exists before reading
        if (file_exists($filename)) {
            // Open file in read mode ('r')
            $file = fopen($filename, "r");

            // Read the contents of the file
            $fileContent = fread($file, filesize($filename));

            // Close the file
            fclose($file);

            // Display the file content safely
            echo nl2br(htmlspecialchars($fileContent)); // Convert newlines to <br> and escape HTML
        } else {
            echo "No messages found.";
        }
        ?>
    </div>
</body>

</html>