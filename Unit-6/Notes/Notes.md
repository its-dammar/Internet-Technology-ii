
---

## **Unit 6: Working with Databases**

Databases are integral to any modern web application. They help efficiently store, retrieve, and manage data in a structured manner. PHP, a server-side scripting language, works seamlessly with databases like MySQL to build dynamic, data-driven applications.

---

### **6.1 Introduction to MySQL Database Management System**

#### **What is a Database?**
- A **database** is an organized collection of data that can be easily accessed, managed, and updated.
- It acts as the backbone of modern applications, storing data like user information, product catalogs, transaction records, etc.
- For example, an **e-commerce website database** might store:
  - Product details (name, price, description).
  - User details (username, email, password).
  - Order details (order ID, product ID, user ID).

#### **Database Management System (DBMS):**
A **DBMS** is software that provides tools to create, manage, and manipulate databases.  
- Examples: MySQL, PostgreSQL, Oracle Database, MongoDB.

#### **What is MySQL?**
- MySQL is an **open-source relational database management system (RDBMS)**.
- It organizes data into tables, rows, and columns, and uses **Structured Query Language (SQL)** to interact with the data.

#### **Key Characteristics of MySQL**
1. **Relational Database:** Data is stored in structured tables with relationships.
2. **Open-Source:** Freely available, with optional commercial support.
3. **Scalable and Reliable:** Handles large datasets and high user loads.
4. **Cross-Platform:** Runs on different operating systems like Windows, Linux, and macOS.
5. **Community and Support:** A large community provides support, resources, and updates.

#### **MySQL Architecture**
- **Client Layer:** Interfaces for users to send queries (e.g., PHPMyAdmin, MySQL Workbench).
- **SQL Layer:** Processes SQL queries and sends results.
- **Storage Engine Layer:** Responsible for storing and retrieving data (e.g., InnoDB, MyISAM).

#### **Why Use MySQL for PHP Applications?**
1. **Efficiency:** Optimized for web-based applications.
2. **Integration:** Seamless integration with PHP for dynamic data handling.
3. **Scalability:** Suitable for small to large-scale applications.
4. **Security:** Supports encrypted connections, access control, and user privileges.

---

### **6.2 Connecting PHP with MySQL Database**

To use MySQL with PHP, the first step is to establish a connection between your PHP script and the MySQL database.
#### **Why Connect PHP and MySQL?**
PHP applications need to interact with MySQL databases to:
1. Store data like user accounts, orders, and transactions.
2. Retrieve information dynamically (e.g., displaying products).
3. Perform complex operations like data filtering and aggregation.

 #### **Methods to Connect PHP with MySQL**
1. **MySQLi (MySQL Improved):**
   - Supports procedural and object-oriented styles.
   - Offers advanced features like prepared statements and transaction handling.
2. **PDO (PHP Data Objects):**
   - A database-independent solution supporting multiple database systems.
   - Focuses on secure and consistent database interaction.
    
#### **Steps to Connect PHP with MySQL:**

1. **Database Details Required:**
   - **Hostname:** The server address, typically `localhost`.
   - **Username:** The MySQL username, often `root` for local servers.
   - **Password:** The MySQL user’s password.
   - **Database Name:** The name of the database you want to use.
        - Hostname (e.g., `localhost`).
        - Username  (e.g., `root`).
        - Password (e.g ` `).
        - Database Name (e.g., `example_db`).

2. **Establishing Connection:**
   PHP offers two main extensions for connecting to MySQL:
   - **MySQLi (MySQL Improved):** Procedural and object-oriented interface.
   - **PDO (PHP Data Objects):** Supports multiple databases.

3. **Verifying the Connection:**
   Always check if the connection is successful and handle errors gracefully.

#### **Connection Using MySQLi:**
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
```
#### **MySQLi vs PDO**
| **Feature**      | **MySQLi**                  | **PDO**                     |
|-------------------|-----------------------------|-----------------------------|
| Database Support  | MySQL only                 | Multiple databases (MySQL, PostgreSQL, etc.) |
| API Style         | Procedural and Object-Oriented | Object-Oriented only       |
| Prepared Statements | Supported                 | Supported                   |

---

### **6.3 Performing CRUD Operations**

CRUD stands for **Create, Read, Update, and Delete**, representing the four basic operations to manipulate database records.

#### **1. Create (Insert Data):**
- Adds new records to the database.
- Example: Adding a new user.

**SQL Query:**
```sql
INSERT INTO users (name, email, password) VALUES ('John Doe', 'john@example.com', '12345');
```

**PHP Code:**
```php
$sql = "INSERT INTO users (name, email, password) VALUES ('John Doe', 'john@example.com', '12345')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}
```

---

#### **2. Read (Retrieve Data):**
- Fetches data from the database.
- Example: Displaying a list of users.

**SQL Query:**
```sql
SELECT * FROM users;
```

**PHP Code:**
```php
$sql = "SELECT id, name, email FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "No records found";
}
```

---

#### **3. Update (Modify Data):**
- Updates an existing record in the database.
- Example: Changing a user’s email address.

**SQL Query:**
```sql
UPDATE users SET email = 'newemail@example.com' WHERE id = 1;
```

**PHP Code:**
```php
$sql = "UPDATE users SET email='newemail@example.com' WHERE id=1";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
```

---

#### **4. Delete (Remove Data):**
- Deletes records from the database.
- Example: Removing a user.

**SQL Query:**
```sql
DELETE FROM users WHERE id = 1;
```

**PHP Code:**
```php
$sql = "DELETE FROM users WHERE id=1";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
```

---

### **6.4 Executing SQL Queries Using PHP**

PHP executes SQL queries dynamically to interact with MySQL databases.

#### **Steps:**
1. Write the SQL query as a string.
2. Pass the query to the `mysqli_query()` function.
3. Process the results if the query retrieves data.

#### **Best Practices:**
- Use **prepared statements** to prevent SQL injection.
- Validate all user inputs before executing queries.

---

### **6.5 User Registration and Login**

#### **Registration Process:**
1. Collect user input via an HTML form.
2. Validate and sanitize data.
3. Hash the password using functions like `password_hash()`.
4. Insert the user data into the database.

#### **Login Process:**
1. Verify the user’s credentials by comparing the entered password with the stored hash using `password_verify()`.
2. Start a session if authentication is successful.

---

### **6.6 Error Handling and Transaction Management**

### **Error Handling in PHP with Databases**

Error handling is a crucial part of any PHP application that interacts with databases. It ensures that issues such as connection failures, invalid SQL queries, or unexpected conditions are managed gracefully without crashing the application. Proper error handling helps developers debug and maintain robust, user-friendly applications.

---

### **Types of Errors in Database Operations**

1. **Connection Errors:**
   - Occur when PHP fails to establish a connection with the MySQL database.
   - Example: Incorrect database credentials, server down, or unreachable host.

2. **Query Execution Errors:**
   - Occur when an SQL query fails due to syntax errors, constraint violations, or invalid table/column references.

3. **Validation Errors:**
   - Result from invalid or incomplete user inputs used in queries.
   - Example: Missing required fields, incorrect data types.

4. **Transaction Errors:**
   - Occur during multi-step operations, leading to incomplete or inconsistent states in the database.

---
### **Error Handling Techniques in PHP**

#### **1. Using `mysqli_connect_error()` for Connection Errors**

The `mysqli_connect_error()` function provides detailed information about connection failures.

**Example:**
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example_db";

// Attempt connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully!";
```

---

#### **2. Using `mysqli_error()` for Query Errors**

The `mysqli_error()` function retrieves the error message for the most recent MySQL operation.

**Example:**
```php
$sql = "SELECT * FROM non_existing_table";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error executing query: " . mysqli_error($conn);
}
```

---

#### **3. Handling Errors with `try-catch` Blocks**

For applications using **PDO** or other advanced techniques, `try-catch` blocks can handle exceptions elegantly.


**Common Database Errors:**
1. **Connection Errors:** Failure to connect to the database.
2. **Query Errors:** Invalid SQL syntax or constraints violations.

**Error Handling in PHP:**
```php
$sql = "INVALID QUERY";
if (!mysqli_query($conn, $sql)) {
    echo "Error: " . mysqli_error($conn);
}
```

---


#### **Transaction Management**
Transactions are used to ensure data consistency, especially during multi-step operations (e.g., transferring funds between accounts).

##### **ACID Properties:**
1. **Atomicity:** All steps must succeed or none.
2. **Consistency:** Database remains in a valid state.
3. **Isolation:** Transactions do not interfere with each other.
4. **Durability:** Changes are permanent once committed.

##### **Transaction Workflow in PHP:**
1. Begin a transaction using `mysqli_begin_transaction()`.
2. Execute SQL queries.
3. Commit the transaction if all steps succeed.
4. Roll back the transaction in case of failure.

#### **Example Use Case:**
A bank transfer where funds are deducted from one account and added to another must either fully complete or not happen at all to avoid data inconsistency.

**Steps:**
1. **Begin Transaction:**
   ```php
   mysqli_begin_transaction($conn);
   ```

2. **Execute Queries:**
   Perform multiple database operations.

3. **Commit or Rollback:**
   - **Commit:** Finalize the changes.
     ```php
     mysqli_commit($conn);
     ```
   - **Rollback:** Undo the changes if an error occurs.
     ```php
     mysqli_rollback($conn);
     ```

---

### **Error Handling in Transactions**

In multi-step operations, errors in one step can leave the database in an inconsistent state. Transaction management helps ensure that all operations succeed or none are applied.

**Example of Error Handling in Transactions:**
```php
mysqli_begin_transaction($conn);

try {
    // Step 1: Deduct from Account A
    $sql1 = "UPDATE accounts SET balance = balance - 1000 WHERE id = 1";
    if (!mysqli_query($conn, $sql1)) {
        throw new Exception("Error in Step 1: " . mysqli_error($conn));
    }

    // Step 2: Add to Account B
    $sql2 = "UPDATE accounts SET balance = balance + 1000 WHERE id = 2";
    if (!mysqli_query($conn, $sql2)) {
        throw new Exception("Error in Step 2: " . mysqli_error($conn));
    }

    // Commit transaction
    mysqli_commit($conn);
    echo "Transaction completed successfully!";
} catch (Exception $e) {
    // Rollback transaction on error
    mysqli_rollback($conn);
    echo "Transaction failed: " . $e->getMessage();
}
```

---

#### **Security in Database Management**
- **SQL Injection Prevention:** Use prepared statements.
- **Secure Password Storage:** Use hashing algorithms like Bcrypt or Argon2.
- **Data Validation:** Ensure input fields match expected formats.

#### **Best Practices in Database Design**
1. Normalize tables to reduce redundancy.
2. Use proper data types for columns.
3. Establish relationships with primary and foreign keys.

#### **PHP and MySQL Integration Scenarios**
- E-commerce applications (e.g., product management, user accounts).
- Content management systems (e.g., blogs, news websites).
- Custom web applications requiring dynamic data interaction.

---