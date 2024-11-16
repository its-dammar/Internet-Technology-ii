
<?php
// Include database connection
require 'config/db.php';

// Initialize message
$message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger'>Record not found.</div>";
        exit;
    }
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file = $_FILES['dataFile']['name'];
    $file_size = $_FILES['dataFile']['size'];

    // Validate inputs
    if (!empty($title) && !empty($description)) {
        if (empty($file)) {
            // Update only title and description
            $query = "UPDATE files SET title='$title', description='$description' WHERE id='$id'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $message = "<div class='alert alert-success'>Task updated successfully.</div>";
                echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
            } else {
                $message = "<div class='alert alert-danger'>Failed to update task.</div>";
            }
        } else {
            // Validate file size and type
            if ($file_size < 2 * 1024 * 1024) {
                $explode = explode('.', $file);
                $ext = strtolower(end($explode));
                $unique_name = str_replace(' ', '_', $file) . '_' . time() . '.' . $ext;
                $target_file = '../uploads/' . $unique_name;

                if (in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    // Remove old file
                    $old_file_path = '../uploads/' . $data['file_link'];
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }

                    // Move new file and update record
                    if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $target_file)) {
                        $query = "UPDATE files SET title='$title', description='$description', file_link='$unique_name', type='$ext' WHERE id='$id'";
                        $result = mysqli_query($conn, $query);
                        if ($result) {
                            $message = "<div class='alert alert-success'>Task and file updated successfully.</div>";
                            echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
                        } else {
                            $message = "<div class='alert alert-danger'>Failed to update task in database.</div>";
                        }
                    } else {
                        $message = "<div class='alert alert-danger'>Failed to upload new file.</div>";
                    }
                } else {
                    $message = "<div class='alert alert-warning'>Invalid file type. Only JPG, PNG, and JPEG are allowed.</div>";
                }
            } else {
                $message = "<div class='alert alert-warning'>File size must be less than 2MB.</div>";
            }
        }
    } else {
        $message = "<div class='alert alert-warning'>All fields are required.</div>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Task</title>
</head>
<body>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="py-2">
                <h3>Edit Task</h3>
                <a class="btn btn-primary btn-sm float-end" href="index.php" role="button">Manage Tasks</a>
            </div>
            <div class="col-lg-6">
                <!-- Display message -->
                <?php echo $message; ?>

                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($data['title']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($data['description']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="dataFile" class="form-label">Image</label>
                        <div class="mb-2">
                            <img src="<?php echo '../uploads/' . htmlspecialchars($data['file_link']); ?>" width="100" height="100" alt="Current File">
                        </div>
                        <input type="file" class="form-control" id="dataFile" name="dataFile" accept=".jpg,.png,.jpeg">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
