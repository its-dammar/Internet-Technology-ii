
<?php
// Include the database connection file
require 'config/db.php';

// Initialize a message variable
$message = '';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $filename = $_FILES['dataFile']['name'];
    $filesize = $_FILES['dataFile']['size'];

    // Split the file name to get the extension
    $explode = explode('.', $filename);
    $firstname = strtolower($explode[0]);
    $ext = strtolower(end($explode)); // Get the file extension
    $rep = str_replace(' ', '', $filename);

    // Generate a unique file name
    $finalfilename = $firstname . '_' . time() . '.' . $ext;

    // Validate the file size (limit to 2MB) and file type (jpg, png, pdf)
    if ($filesize < 2 * 1024 * 1024) { // 2MB size limit
        if (in_array($ext, ['jpg', 'png', 'pdf'])) { // Allowed extensions
            $uploadPath = '../uploads/' . $finalfilename;
            if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $uploadPath)) {
                // Insert data into the database
                $query = "INSERT INTO files (title, description, file_link, type) 
                          VALUES ('$title', '$description', '$finalfilename', '$ext')";

                $result = mysqli_query($conn, $query); // Connect to the database
                if ($result) {
                    $message = "<div class='alert alert-success'>File has been successfully uploaded.</div>";
                } else {
                    $message = "<div class='alert alert-danger'>Database error. File upload failed.</div>";
                }
            } else {
                $message = "<div class='alert alert-danger'>Failed to upload file.</div>";
            }
        } else {
            $message = "<div class='alert alert-danger'>Invalid file type. Only JPG, PNG, and PDF files are allowed.</div>";
        }
    } else {
        $message = "<div class='alert alert-danger'>File size must be less than 2MB.</div>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>File Upload</title>
</head>
<body>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="py-2">
                <h3>Create Task</h3>
                <a class="btn btn-primary btn-sm float-end" href="index.php" role="button">Manage Tasks</a>
            </div>
            <div class="col-lg-6">
                <!-- Display message -->
                <?php echo $message; ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">File</label>
                        <input type="file" accept=".jpg,.png,.pdf" class="form-control" id="image" name="dataFile" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Add File</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>


