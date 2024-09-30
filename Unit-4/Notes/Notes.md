
### **Unit 4: Form Handling and Data Validation in PHP**

#### **4.1 Processing HTML Forms with PHP**

##### **Definition:**
Processing HTML forms with PHP involves capturing user inputs from web forms (text fields, radio buttons, checkboxes, etc.) and handling them using PHP scripts for further operations such as storing in a database, validating, or performing calculations.

##### **Explanation:**
- HTML forms allow users to enter data that gets sent to a server for processing. PHP can handle this data using the `$_GET` or `$_POST` superglobal arrays.
- When a form is submitted, PHP collects the values of the form fields and processes them.

##### **Important Points:**
- Forms must have an `action` attribute specifying the PHP script URL to handle the data and a `method` attribute (`GET` or `POST`) determining how the data is sent.
- Using `$_POST` keeps the data hidden, while `$_GET` displays it in the URL.

##### **Example:**
HTML Form:
```html
<form action="process.php" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" value="Submit">
</form>
```
PHP Script (`process.php`):
```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email;
}
?>
```

#### **4.2 Working with HTTP Request (GET, POST, SERVER)**

##### **Definition:**
Handling HTTP requests involves capturing and working with data sent via `GET`, `POST`, and `SERVER` superglobals.

##### **Explanation:**
- **GET Method**: Sends form data through the URL. Suitable for non-sensitive data.
- **POST Method**: Sends form data through the HTTP request body. Ideal for secure and large data submissions.
- **SERVER Superglobal**: Provides information about the server environment, such as the script name, request method, and server name.

##### **Important Points:**
- Use `$_GET` for retrieving data passed in the URL, e.g., `example.com?page=2`.
- Use `$_POST` for sensitive data or larger forms.
- `$_SERVER['REQUEST_METHOD']` determines the request method used (GET/POST).

##### **Example:**
```php
// Handling GET request
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $page = $_GET['page'];
    echo "Current page: " . $page;
}

// Handling POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    echo "Submitted data: " . $data;
}
```

#### **4.3 Preserving User Input**

##### **Definition:**
Preserving user input means retaining the entered values in form fields even after a page refresh or form submission, typically when there are validation errors.

##### **Explanation:**
- It’s common to repopulate form fields with the user's input when validation fails, so they don't have to re-enter all data.
- You can achieve this by setting the `value` attribute of form fields using PHP variables.

##### **Important Points:**
- Ensures a better user experience.
- Useful when validating forms to avoid losing input data.

##### **Example:**
```html
<form action="process.php" method="post">
    Name: <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"><br>
    <input type="submit" value="Submit">
</form>
```

#### **4.4 Validating and Sanitizing User’s Input**

##### **Definition:**
Validation ensures user input meets required criteria (e.g., non-empty, email format), while sanitization removes potentially harmful data to prevent security risks.

##### **Explanation:**
- **Validation** checks whether the input follows the desired format or rules.
- **Sanitization** removes or encodes unwanted characters to prevent XSS (Cross-Site Scripting) and SQL injection attacks.

##### **Important Points:**
- Use `filter_var()` to validate and sanitize data.
- Always sanitize data before storing it or displaying it on a webpage.

##### **Example:**
```php
$email = $_POST['email'];
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email address.";
} else {
    echo "Invalid email address.";
}

// Sanitizing input
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
echo "Sanitized Name: " . $name;
```

#### **4.5 Dealing with Checkbox, Radio Button, and List**

##### **Definition:**
Handling user selections from checkboxes, radio buttons, and lists involves capturing these selections and processing them using PHP.

##### **Explanation:**
- **Checkboxes**: Allow multiple selections. Use an array (`[]`) for the name attribute to capture all values.
- **Radio Buttons**: Allow a single selection. Use the same name for all options.
- **Lists (Select Dropdown)**: Can be single or multiple selections.

##### **Important Points:**
- Use `isset()` to check if a checkbox is selected.
- Use `$_POST` to retrieve selected values.

##### **Example:**
```html
<!-- Checkboxes -->
<input type="checkbox" name="hobbies[]" value="Reading">Reading
<input type="checkbox" name="hobbies[]" value="Traveling">Traveling

<!-- Radio Buttons -->
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female

<!-- Dropdown List -->
<select name="country">
    <option value="Nepal">Nepal</option>
    <option value="India">India</option>
</select>
```
PHP Code:
```php
if (isset($_POST['hobbies'])) {
    foreach ($_POST['hobbies'] as $hobby) {
        echo $hobby . "<br>";
    }
}
```

#### **4.6 File Upload**

##### **Definition:**
File upload is the process of allowing users to upload files (images, PDFs, etc.) to a server using a form.

##### **Explanation:**
- A form must have the `enctype="multipart/form-data"` attribute to upload files.
- Use `$_FILES` to handle uploaded files, checking their properties like `name`, `size`, `type`, and `tmp_name`.

##### **Important Points:**
- Always validate the file type and size before uploading.
- Move uploaded files using `move_uploaded_file()`.

##### **Example:**
```html
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file: <input type="file" name="fileToUpload"><br>
    <input type="submit" value="Upload File">
</form>
```
PHP Script (`upload.php`):
```php
if (isset($_FILES['fileToUpload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
```

#### **4.7 Send Email**

##### **Definition:**
Sending emails with PHP involves using the `mail()` function to send email notifications from a web application.

##### **Explanation:**
- The `mail()` function requires parameters such as the recipient's email, subject, message, and headers.
- It is useful for sending contact form responses, confirmation emails, etc.

##### **Important Points:**
- Ensure your server is configured correctly to send emails.
- Use proper headers for email formatting.

##### **Example:**
```php
$to = "example@example.com";
$subject = "Test Email";
$message = "This is a test email sent from PHP.";
$headers = "From: sender@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
```

Here's the comparison between `GET`, `POST`, and `$_SERVER` in a table format:

| **Criteria**        | **GET**                              | **POST**                            | **$_SERVER**                                |
|---------------------|--------------------------------------|-------------------------------------|--------------------------------------------|
| **Purpose**         | Retrieve data                        | Send data                           | Store server/environment info              |
| **Data Transmission** | Via URL                            | Via HTTP request body               | N/A (holds server information)             |
| **Visibility**      | Data is visible in the URL           | Data is hidden                      | Not related to visibility                  |
| **Data Length Limit**| Limited (~2048 characters)          | No specific limit                   | N/A (stores predefined data)               |
| **Use Cases**       | Fetching data, bookmarking pages     | Submitting forms, file uploads      | Accessing server details and request info  |
| **Security**        | Less secure (data is exposed)        | More secure (data is hidden)        | Depends on server environment security     |
| **Browser Caching** | Cached by browsers                   | Not cached                          | Not applicable                             |
| **Bookmarking**     | Can be bookmarked                    | Cannot be bookmarked                | Not related to bookmarking                 |
| **Data Type Handling** | Text data only                    | Text, binary data, file uploads     | Stores data as strings or arrays           |
| **Form Submission** | Suitable for simple data retrieval   | Preferred for complex/sensitive data| Used to determine request methods (GET/POST)|

This table clearly outlines the differences among `GET`, `POST`, and `$_SERVER` in PHP.


Here is a detailed comparison of `GET`, `POST`, and `$_SERVER` in 10 key points:

### **1. Purpose:**
- **GET:** Used to retrieve data from the server by appending parameters to the URL.
- **POST:** Used to send data to the server, typically for form submissions or updates.
- **$_SERVER:** A superglobal array in PHP that holds information about the server environment, request headers, and paths.

### **2. Data Transmission:**
- **GET:** Data is sent via the URL in the query string (e.g., `example.com/page.php?name=John`).
- **POST:** Data is sent through the HTTP request body, making it hidden from the URL.
- **$_SERVER:** Doesn't send or receive data but stores server and execution environment information (e.g., `REQUEST_METHOD`, `SERVER_NAME`).

### **3. Visibility:**
- **GET:** Data is visible in the URL, making it less secure and limited to small data.
- **POST:** Data is hidden from the URL, making it more suitable for sensitive information.
- **$_SERVER:** Not related to data visibility; it simply holds server-related data.

### **4. Data Length Limit:**
- **GET:** Limited by URL length (approximately 2048 characters).
- **POST:** No size limit set by the HTTP protocol, but limits may exist based on server configuration.
- **$_SERVER:** No limit; contains predefined server-related data.

### **5. Use Cases:**
- **GET:** Ideal for fetching data, bookmarking pages, and navigation.
- **POST:** Suitable for submitting forms, uploading files, and sending confidential information.
- **$_SERVER:** Used for accessing server-specific details, such as the request method, client IP, or server name.

### **6. Security:**
- **GET:** Less secure since data is exposed in the URL.
- **POST:** More secure for sensitive data as it’s not visible in the URL.
- **$_SERVER:** Doesn't deal with direct data transfer but should be protected from unauthorized access.

### **7. Browser Caching:**
- **GET:** Cached by browsers, allowing page reloads without resubmitting data.
- **POST:** Not cached by browsers, so data is resubmitted upon reload.
- **$_SERVER:** Not cached, as it provides real-time server information.

### **8. Bookmarking:**
- **GET:** URLs can be bookmarked along with query string data.
- **POST:** Cannot be bookmarked since data isn’t included in the URL.
- **$_SERVER:** Irrelevant to bookmarking, as it doesn't contain page data.

### **9. Data Type Handling:**
- **GET:** Handles only text data. Binary data (e.g., files) isn’t suitable.
- **POST:** Can handle text, binary data, and file uploads.
- **$_SERVER:** Stores data as strings or arrays related to server info.

### **10. Form Submission:**
- **GET:** Suitable for simple data retrieval, where data should be part of the URL.
- **POST:** Preferred for complex data submissions, file uploads, or sensitive information.
- **$_SERVER:** Provides details like `$_SERVER['REQUEST_METHOD']` to check whether the form was submitted via GET or POST.

