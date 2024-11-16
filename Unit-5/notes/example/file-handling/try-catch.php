<?php
try {
    // Try to open a file
    $file = @fopen("files/read.txt", "r");

    // Check if the file could not be opened
    if (!$file) {
        throw new Exception("File not found.");
    }

    // If the file opens, read the content
    $content = @ fread($file, filesize("files/write.txt"));
    fclose($file);
    echo $content;
} catch (Exception $e) {
    // Handle the error by displaying a message
    echo "Error: " . $e->getMessage();
}
