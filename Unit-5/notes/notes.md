

### **Unit 5: File Handling, Sessions, and Error Handling in PHP**

---

#### **5.1 Reading from and Writing to Files**

- File handling refers to the process of reading from and writing to files on the server using PHP functions. Files are used for storing and retrieving data, making them essential for dynamic web applications.

**Functions for File Handling:**
- **`fopen()`**: Opens a file for reading or writing.
- **`fwrite()`**: Writes content to a file.
- **`fread()`**: Reads content from a file.
- **`fclose()`**: Closes an open file to release resources.

**File Modes:**
- **`r`**: Open for reading.
- **`w`**: Open for writing (truncates the file to zero length).
- **`a`**: Open for writing (writes at the end of the file).

**Example: Writing to a File:**
```php
$file = fopen("test12.txt", "w");  // Open file in write mode
fwrite($file, "Hello, World!");     // Write content to file
fclose($file);                      // Close the file
```

**Example: Reading from a File:**
```php
$file = fopen("test13.txt", "r");  // Open file in read mode
$content = fread($file, filesize("test13.txt"));  // Read file content
echo $content;                      // Output the content
fclose($file);                      // Close the file
```

**Use Cases:**
- Saving user data (logs, preferences, etc.).
- Reading configuration files.
- Storing reports or generated content.

---

#### **5.2 Understanding File Permissions and Security Considerations**

- File permissions define who can read, write, or execute a file on a server. In PHP, file permissions are crucial for controlling access to files and ensuring security.

**Types of Permissions:**
1. **Read (`r`)**: Allows the file to be read.
2. **Write (`w`)**: Allows the file to be modified.
3. **Execute (`x`)**: Allows the file to be executed as a script or program.

**Permission Values (Numeric Representation):**
- **0755**: Read, write, and execute for the owner; read and execute for others.
- **0644**: Read and write for the owner; read-only for others.

**Security Considerations:**
- **Sensitive Files**: Restrict access to files that contain sensitive information (e.g., configuration or user data).
- **Directory Permissions**: Ensure that directories have secure permissions to prevent unauthorized access or modification.

**Example: Setting Permissions with `chmod()`:**
```php
chmod("test11.txt", 0755);  // Set read, write, execute for owner, read for others
```

- Avoid giving write and execute permissions to public users.
- Regularly audit file permissions to ensure security.

---

#### **5.3 File Inclusion (`Include` and `Require`)**

- PHP allows you to include and reuse code from one file into another using the `include` and `require` statements. This helps in maintaining a modular code structure, where repetitive or shared code is placed in separate files.

**Difference Between `Include` and `Require`:**
- **`include`**: Includes the file, but if the file is not found, it generates a warning and continues the execution of the script.
- **`require`**: Includes the file, but if the file is not found, it generates a fatal error and stops the execution of the script.

**Example: Using `include`:**
```php
include 'header.php';  // Includes header.php; if missing, generates a warning
```

**Example: Using `require`:**
```php
require 'config.php';  // Requires config.php; if missing, stops execution with fatal error
```

**Use Cases:**
- Reusing common components like headers, footers, and menus.
- Loading configuration files (e.g., database configuration).


- Use `require` for critical files (e.g., configuration, security).
- Use `include` for optional content (e.g., page templates, widgets).

---

#### **5.4 Managing Sessions and Cookies**

**Sessions in PHP:**
- A session allows storing user-specific data on the server and accessing it across different pages. Sessions are used to track user activities, such as login status.
- **Starting a Session**: `session_start()` must be called at the beginning of the script to initialize a session.
- **Storing Session Data**: Data can be stored in the `$_SESSION` superglobal.

**Example: Session Handling:**
```php
session_start();  // Start the session
$_SESSION['username'] = "JohnDoe";  // Store session data
echo "User is " . $_SESSION['username'];  // Access session data
```

**Cookies in PHP:**
- A cookie is a small piece of data stored on the user’s computer, typically used to store user preferences or login information.
- **Creating a Cookie**: `setcookie()` is used to create a cookie.
- **Accessing a Cookie**: Cookies are accessed via the `$_COOKIE` superglobal.

**Example: Cookie Handling:**
```php
setcookie("username", "JohnDoe", time() + 3600);  // Cookie expires in 1 hour
echo "Username is " . $_COOKIE['username'];       // Access cookie data
```

**Difference Between Sessions and Cookies:**
- **Sessions**: Stored server-side, more secure, and automatically expire when the browser is closed.
- **Cookies**: Stored client-side, persist based on the expiration time set when creating the cookie.

---

#### **5.5 Implementing Session-Based Authentication and Authorization**

**Authentication:**
- Authentication is the process of verifying the identity of a user (e.g., through a login form).
- **Session-Based Authentication**: After a successful login, the user’s data (e.g., username) is stored in a session, which persists across different pages.

**Example: Basic Authentication Using Sessions:**
```php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");  // Redirect to login page if session is not set
    exit();
}
```

**Authorization:**
- Authorization ensures that a user has permission to access certain resources or perform certain actions based on their role.
  
**Example: Role-Based Authorization:**
```php
session_start();
if ($_SESSION['role'] !== 'admin') {
    echo "Access Denied!";
}
```


- Always validate session data to avoid session hijacking.
- Use secure cookie attributes (`HttpOnly`, `Secure`) to protect session cookies from being accessed by malicious scripts.

---

#### **Error Handling in PHP: `try-catch` Blocks and Exception Handling**

- Error handling allows you to manage errors gracefully in your code. PHP provides mechanisms like `try-catch` blocks and exception handling to catch and respond to errors without crashing the script.

**Using `try-catch` Blocks:**
- **`try` Block**: Contains the code that may throw an error.
- **`catch` Block**: Handles the error if it occurs.

**Example: Basic Error Handling:**
```php
try {
    $file = fopen("test1.txt", "r");
    if (!$file) {
        throw new Exception("File not found!");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

**Throwing and Catching Exceptions:**
- You can throw exceptions using the `throw` keyword and catch them in the `catch` block.

**Example: Custom Exception:**
```php
class FileException extends Exception {}
try {
    throw new FileException("Custom File Error.");
} catch (FileException $e) {
    echo $e->getMessage();
}
```

**Importance of Error Handling:**
- **Prevents Script Crashes**: Allows recovery from unexpected errors.
- **User-Friendly**: Displays meaningful error messages to users.
- **Debugging**: Helps in identifying and fixing bugs in the development phase.

---

Here’s a simple and easy-to-understand example of a `try-catch` block for handling file errors in PHP.

### **Example:**

```php
<?php
try {
    // Try to open a file
    $file = fopen("example.txt", "r");

    // Check if the file could not be opened
    if (!$file) {
        throw new Exception("File not found.");
    }

    // If the file opens, read the content
    $content = fread($file, filesize("test.txt"));
    fclose($file);
    echo $content;
} catch (Exception $e) {
    // Handle the error by displaying a message
    echo "Error: " . $e->getMessage();
}
?>
```

1. **`try` Block**: 
   - Attempts to open and read a file (`test.txt`).
   - If the file cannot be opened, it throws an exception.
2. **`catch` Block**: 
   - Catches the exception and displays the error message: `"File not found."`

### **Output:**
- If the file exists, it will display the content of the file.
- If the file does not exist or can't be opened, it will display:
  ```
  Error: File not found.
  ```

This example is short, easy to understand, and demonstrates how to use `try-catch` for basic file handling errors.

