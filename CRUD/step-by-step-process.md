1. install wampp or xampp server
2. run the xampp or wampp server
3. create a project inside the xampp/htdocs/your_project or wampp/www/your_project folder
xampp
    htdocs
        tms (which is your project)

wampp
    www
        tms (which is your project)

4. create a database : go to browser and run the localhost/phpmyadmin. 
username: root, 
password: "" and login . 
Then after go to left side of the DBMS and click on "New" enter database name "tms"
5. create a folder inside your project as a database and create a file named project.sql and write this code
tms
    database
        tms.sql

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

6. import your database
go to localhost/phpmyadmin
choose your datbase
and import your database (import option shown in navbar of DBMS(MSQL))

7. Go back your project and create following files and folders
tms
    config
        db.php
    
    users
        create.php
        index.php
        edit.php
        delete.php
        show.php
    
    database
        tms.sql
    
    index.php
    register.php
    dashboard.php

   1. config/db.php
   db.php
   <?php
   $servername = "localhost";
   $username = "root";
   $pass = "";
   $dbname = "tms";

   $conn = new mysqli($servername, $username, $pass, $dbname);

   // if ($connection) {
   //     echo "Database is connected";
   // } else {
   //     echo "database is not connected";
   // }
   ?>

   2. users/create.php
   <?php require '../config/db.php'; ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Title</title>
    </head>
    <body>
        <section class="py-5">
            <div class="container w-25 p-3 shadow">
                <div class="title">
                    <h4>Login From</h4>
                </div>
                <?php
                if (isset($_POST['save'])) {
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // form validation

                    if ($name !== "" && $phone !== "" && $email !== "" && $password !== "") {
                        $insert = "INSERT INTO users(name, phone, email, password) 
                        VALUES('$name', '$phone', '$email', '$password')";

                        $result = mysqli_query($conn, $insert);
                        if ($result) {
                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Data are submitted</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            echo header("Refresh:2; URL=index.php");
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Data are not submitted</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            echo header("Refresh:2; URL=index.php");
                        }
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>All fields are required</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                        echo header("Refresh:2; URL=index.php");
                    }
                }
                 $conn->close();
                ?>
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="input1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-control" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>

    </html>

    3. users/index.php
    <?php require '../config/db.php'; ?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Title</title>
    </head>

    <body>
        <section>
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = "SELECT *FROM users";
                        $select_result = mysqli_query($conn, $select);
                        $i=1;
                        while ($data = mysqli_fetch_array($select_result)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php  echo $data['name']; ?></td>
                                <td><?php  echo $data['phone']; ?></td>
                                <td><?php  echo $data['email']; ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm " href="edit.php?id=<?php echo $data['id']; ?>" role="button"> Edit</a>
                                    <a class="btn btn-info btn-sm " href="#" role="button"> View</a>
                                    <a class="btn btn-danger btn-sm " href="delete.php?id=<?php echo $data['id']; ?>" onclick="confirm('DO you want to delete this data??')" role="button"> Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>

    </html>

    4. users/edit.php
    <?php require 'config/db.php'; ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Title</title>
    </head>
    <body>
        <section class="py-5">
            <div class="container w-25 p-3 shadow">
                <div class="title">
                    <h4>Login From</h4>
                </div>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $select = "SELECT *FROM users WHERE id=$id";
                    $result = mysqli_query($conn, $select);
                    $data = mysqli_fetch_assoc($result);
                }

                if (isset($_POST['save'])) {
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];

                    // form validation

                    if ($name !== "" && $phone !== "" && $email !== "" ) {
                        $insert = "UPDATE users SET name='$name', phone='$phone', email='$email' WHERE id=$id ";

                        $result = mysqli_query($conn, $insert);
                        if ($result) {
                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Data are Updated</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            echo header("Refresh:2; URL=index.php");
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Data are not Updated</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            echo header("Refresh:2; URL=index.php");
                        }
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>All fields are required</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                        echo header("Refresh:2; URL=index.php");
                    }
                }

                ?>
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="input1" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-control" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Phone</label>
                        <input type="tel" name="phone" value="<?php echo $data['phone']; ?>" class="form-control" id="input1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>

    </html>

    5. users/delete.php
    <?php require '../config/db.php'; ?>
    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $select = "DELETE FROM users WHERE id=$id";
        $result = mysqli_query($conn, $select);
    
        header("Refresh:0; URL=index.php");
    }
    ?>

    