To complete the setup of your "TMS" (Task Management System) PHP project, here's a comprehensive guide covering database configuration, CRUD functionality, and file structure for managing users. Here’s a step-by-step breakdown:

---

### 1. Install and Set Up XAMPP or WAMP

1. **Download and Install:** Download [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](http://www.wampserver.com/) for your operating system.
2. **Start Server:**
   - Open the XAMPP or WAMP control panel.
   - Start Apache and MySQL.

---

### 2. Create Project Directory

1. **Navigate to Project Folder:**
   - For XAMPP: Place your project folder in `C:/xampp/htdocs/`.
   - For WAMP: Place your project folder in `C:/wamp/www/`.

2. **Create a Folder Named `tms`:** This will be your project directory structure.
   ```
   xampp
   └── htdocs
       └── tms
   ```
   ```
   wampp
   └── www
       └── tms
   ```

---

### 3. Database Setup

1. **Create a Database:**
   - Open a browser and go to `http://localhost/phpmyadmin`.
   - Log in (Default username: `root`, password: leave empty).
   - Click on "New" in the left menu, and create a database named `tms`.

2. **Create a SQL File for Database Schema:**
   - Inside your project folder, create a directory named `database`.
   - Create a file called `tms.sql` and add the following code:
     ```sql
     DROP TABLE IF EXISTS `users`;
     CREATE TABLE `users` (
       `id` int NOT NULL AUTO_INCREMENT,
       `name` varchar(50) NOT NULL,
       `phone` varchar(15) NOT NULL,
       `email` varchar(50) NOT NULL,
       `password` varchar(255) NOT NULL,
       `status` int NOT NULL DEFAULT '1',
       `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
       `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
       PRIMARY KEY (`id`)
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
     ```

3. **Import SQL File:**
   - In `phpMyAdmin`, select the `tms` database.
   - Go to the `Import` tab, select your `tms.sql` file, and import it.

---

### 4. Project Structure and Configuration Files

In the `tms` folder, create the following directory structure:
```
tms
├── config
│   └── db.php
├── users
│   ├── create.php
│   ├── index.php
│   ├── edit.php
│   ├── delete.php
│   └── show.php
├── database
│   └── tms.sql
├── index.php
├── register.php
└── dashboard.php
```

---

### 5. Configure Database Connection - `config/db.php`

Create `db.php` inside the `config` folder:
```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

---

### 6. User Management Pages

#### `users/create.php`

This page handles the creation of new user records.
```php
<?php require '../config/db.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create User</title>
</head>
<body>
    <section class="py-5">
        <div class="container w-25 p-3 shadow">
            <div class="title">
                <h4>Create User</h4>
            </div>
            <?php
            if (isset($_POST['save'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (!empty($name) && !empty($phone) && !empty($email) && !empty($password)) {
                    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                    $insert = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$passwordHash')";

                    if (mysqli_query($conn, $insert)) {
                        echo "<div class='alert alert-success'>User created successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Failed to create user.</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning'>All fields are required.</div>";
                }
            }
            $conn->close();
            ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>
```

#### `users/index.php`

This page displays all users in a table format with options to view, edit, or delete each user.
```php
<?php require '../config/db.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User List</title>
</head>
<body>
    <section class="py-5">
        <div class="container">
            <h4>User List</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM users");
                    while ($user = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$user['id']}</td>
                                <td>{$user['name']}</td>
                                <td>{$user['phone']}</td>
                                <td>{$user['email']}</td>
                                <td>
                                    <a href='edit.php?id={$user['id']}' class='btn btn-warning'>Edit</a>
                                    <a href='delete.php?id={$user['id']}' class='btn btn-danger' onclick='return confirm(\"Delete user?\");'>Delete</a>
                                </td>
                              </tr>";
                    }
                     $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
```
---

### 7. Additional Files

#### `users/edit.php` – Edit User Details

The `edit.php` file allows users to update their existing details. This page retrieves the user's current data based on the `id` parameter and updates it in the database when submitted.

1. **Create `edit.php` File** in the `users` folder.
2. **Add the Following Code** to fetch and update user information:

   ```php
   <?php
   require '../config/db.php';

   // Check if ID is provided in URL
   if (isset($_GET['id'])) {
       $id = $_GET['id'];

       // Fetch user data based on ID
       $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
       $user = mysqli_fetch_assoc($result);

       if (!$user) {
           echo "User not found!";
           exit;
       }
   }

   // Handle form submission for updating user data
   if (isset($_POST['update'])) {
       $name = $_POST['name'];
       $phone = $_POST['phone'];
       $email = $_POST['email'];

       if (!empty($name) && !empty($phone) && !empty($email)) {
           $update = "UPDATE users SET name='$name', phone='$phone', email='$email' WHERE id=$id";
           if (mysqli_query($conn, $update)) {
               echo "<div class='alert alert-success'>User updated successfully.</div>";
           } else {
               echo "<div class='alert alert-danger'>Failed to update user.</div>";
           }
       } else {
           echo "<div class='alert alert-warning'>All fields are required.</div>";
       }
   }
    $conn->close();
   ?>
   <!doctype html>
   <html lang="en">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
       <title>Edit User</title>
   </head>
   <body>
       <section class="py-5">
           <div class="container w-25 p-3 shadow">
               <h4>Edit User</h4>
               <form action="" method="POST">
                   <div class="mb-3">
                       <label for="name" class="form-label">Name</label>
                       <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control" id="name">
                   </div>
                   <div class="mb-3">
                       <label for="phone" class="form-label">Phone</label>
                       <input type="text" name="phone" value="<?php echo $user['phone']; ?>" class="form-control" id="phone">
                   </div>
                   <div class="mb-3">
                       <label for="email" class="form-label">Email</label>
                       <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control" id="email">
                   </div>
                   <button type="submit" name="update" class="btn btn-primary">Update</button>
               </form>
           </div>
       </section>
   </body>
   </html>
   ```

#### `users/delete.php` – Delete User

The `delete.php` file deletes a user from the database based on their `id`. Before deletion, it's good to confirm the user action.

1. **Create `delete.php` File** in the `users` folder.
2. **Add the Following Code** to delete user information:

   ```php
   <?php
   require '../config/db.php';

   if (isset($_GET['id'])) {
       $id = $_GET['id'];
       
       // Execute delete query
       $delete = "DELETE FROM users WHERE id=$id";
       if (mysqli_query($conn, $delete)) {
           echo "<div class='alert alert-success'>User deleted successfully.</div>";
           header("Location: index.php"); // Redirect to user list page
       } else {
           echo "<div class='alert alert-danger'>Failed to delete user.</div>";
       }
   } else {
       echo "Invalid user ID!";
   }
    $conn->close();
   ?>
   ```

   - **Redirect to User List:** After deletion, the user is redirected back to `users/index.php` to view the remaining users.

#### `index.php` – Main Page for Registration and Login

This is the main entry page of the application where users can register or log in. Depending on your application, it may also have links to the user dashboard.

1. **Create `index.php` in Root Folder**:
   - If you’d like the main page to include registration and login forms, here’s a simple structure for both.

   ```php
   <?php require 'config/db.php'; ?>
   <!doctype html>
   <html lang="en">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
       <title>Task Management System</title>
   </head>
   <body>
       <section class="py-5">
           <div class="container">
               <h1>Welcome to Task Management System</h1>
               <p><a href="register.php">Register</a> | <a href="dashboard.php">Login to Dashboard</a></p>
           </div>
       </section>
   </body>
   </html>
   ```

#### `register.php` – User Registration

The `register.php` file allows new users to create an account. Here’s a simple registration form where users can sign up.

1. **Create `register.php` File** in the root directory.
2. **Add the Following Code** for registration form and processing:

   ```php
   <?php require 'config/db.php'; ?>
   <!doctype html>
   <html lang="en">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
       <title>Register</title>
   </head>
   <body>
       <section class="py-5">
           <div class="container w-50 p-3 shadow">
               <h4>User Registration</h4>
               <?php
               if (isset($_POST['register'])) {
                   $name = $_POST['name'];
                   $email = $_POST['email'];
                   $password = $_POST['password'];

                   if (!empty($name) && !empty($email) && !empty($password)) {
                       $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                       $insert = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$passwordHash')";
                       
                       if (mysqli_query($conn, $insert)) {
                           echo "<div class='alert alert-success'>Registration successful.</div>";
                       } else {
                           echo "<div class='alert alert-danger'>Failed to register.</div>";
                       }
                   } else {
                       echo "<div class='alert alert-warning'>All fields are required.</div>";
                   }
               }
                $conn->close();
               ?>
               <form action="" method="POST">
                   <div class="mb-3">
                       <label for="name" class="form-label">Name</label>
                       <input type="text" name="name" class="form-control" id="name">
                   </div>
                   <div class="mb-3">
                       <label for="email" class="form-label">Email</label>
                       <input type="email" name="email" class="form-control" id="email">
                   </div>
                   <div class="mb-3">
                       <label for="password" class="form-label">Password</label>
                       <input type="password" name="password" class="form-control" id="password">
                   </div>
                   <button type="submit" name="register" class="btn btn-primary">Register</button>
               </form>
           </div>
       </section>
   </body>
   </html>
   ```

#### `dashboard.php` – User Dashboard

The `dashboard.php` file serves as the main page for logged-in users, displaying information specific to their account or tasks.

1. **Create `dashboard.php` in the Root Folder**:
   - This page would check if a user is logged in, and if so, displays the user dashboard.

   ```php
 <?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to login if not logged in
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Dashboard</title>
</head>
<body>
    <section class="py-5">
        <div class="container">
            <h1>Welcome to your Dashboard</h1>
            <p>Manage your tasks and profile here.</p>
            <a href="tasks/index.php" class="btn btn-primary">View Tasks</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </section>
</body>
</html>

   ```


### 8. Run Your Application

1. Start your XAMPP or WAMP server.
2. Open your browser and go to `http://localhost/tms/users/index.php` to view the user management system.

This setup provides a base CRUD (Create, Read, Update, Delete) structure for your PHP project. Each feature can be enhanced with additional security and user experience improvements.