<?php
// Include database connection
include('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tasks</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Manage Tasks</h3>
                    <a class="btn btn-primary btn-sm" href="./create.php" role="button">Create Task</a>
                </div>
                <div class="card-body">
                    <?php
                    // Display messages for delete actions
                    if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        if ($msg == "delete") {
                            echo "<div class='alert alert-success' role='alert'>Task deleted successfully.</div>";
                        } elseif ($msg == "error") {
                            echo "<div class='alert alert-danger' role='alert'>Failed to delete task.</div>";
                        }
                        header("Refresh:2; url=index.php");
                    }
                    ?>

                    <!-- Display tasks table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch all tasks from the database
                            $query = "SELECT * FROM files ORDER BY id DESC";
                            $result = mysqli_query($conn, $query);
                            $i = 0;
                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo ++$i; ?></th>
                                    <td><?php echo $data['title']; ?></td>
                                    <td><?php echo $data['description']; ?></td>
                                    <td><img src="<?php echo '../uploads/' . $data['file_link']; ?>" width="100" height="100" alt="Task Image"></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                                        <a class="btn btn-info btn-sm" href="view.php?id=<?php echo $data['id']; ?>" role="button">View</a>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');" href="delete.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            // Close the database connection
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
