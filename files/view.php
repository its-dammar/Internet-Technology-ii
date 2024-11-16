<?php
// Include database connection
include('config/db.php');

// Check if the task ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the task details from the database
    $query = "SELECT * FROM files WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='alert alert-danger'>Task not found!</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-danger'>Invalid request!</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Task</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>View Task Details</h3>
                    <a class="btn btn-primary btn-sm float-end" href="index.php" role="button">Back to Manage Tasks</a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5>Title:</h5>
                        <p><?php echo $data['title']; ?></p>
                    </div>
                    <div class="mb-3">
                        <h5>Description:</h5>
                        <p><?php echo $data['description']; ?></p>
                    </div>
                    <div class="mb-3">
                        <h5>Image:</h5>
                        <?php if (!empty($data['file_link'])) { ?>
                            <img src="<?php echo '../uploads/' . $data['file_link']; ?>" width="300" alt="Task Image">
                        <?php } else { ?>
                            <p>No image uploaded.</p>
                        <?php } ?>
                    </div>
                    <div class="mt-4">
                        <a class="btn btn-primary" href="edit.php?id=<?php echo $data['id']; ?>">Edit Task</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?');" href="delete.php?id=<?php echo $data['id']; ?>">Delete Task</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
