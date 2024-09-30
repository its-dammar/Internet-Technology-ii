Create a Contact Us form using the POST method where users can input their name, email, subject, and message.
On submission, send an email containing the form data to a specified email address using PHP's mail() function.
Requirements:

Validate that all fields are correctly filled out.
Provide error messages for missing or incorrect input.
Display a confirmation message once the email is sent successfully.

### **Step 1: Creating the HTML Form**

```html
<!-- contact_form.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <!-- Display success or error messages -->
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo "<p style='color: green;'>Your message has been sent successfully!</p>";
    }
    if (isset($_GET['error'])) {
        echo "<p style='color: red;'>Error: " . htmlspecialchars($_GET['error']) . "</p>";
    }
    ?>
    
    <form action="process_contact.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject" required><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>
        
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
```

### **Step 2: Handling the Form Submission**

```php
<!-- process_contact.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Validate fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        header("Location: contact_form.html?error=All fields are required.");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact_form.html?error=Invalid email format.");
        exit();
    }

    // Prepare the email
    $to = "youremail@example.com"; // Replace with your email address
    $email_subject = "Contact Form Submission: " . $subject;
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: contact_form.html?success=true");
        exit();
    } else {
        header("Location: contact_form.html?error=Failed to send email.");
        exit();
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: contact_form.html");
    exit();
}
?>
```

### **Explanation of the Solution**

1. **Form Creation (`contact_form.html`):**
   - A simple HTML form captures user input for `name`, `email`, `subject`, and `message`.
   - `POST` method is used to send data securely.

2. **Form Submission Handling (`process_contact.php`):**
   - Checks if the form submission method is `POST`.
   - **Validation**:
     - Ensures all fields are filled out.
     - Validates the email format using `filter_var()`.
   - **Email Sending**:
     - The `mail()` function sends the email to a specified recipient.
   - Redirects back to the form with appropriate success or error messages using `header()`.

### **Important Points**

- **Security**: Ensure error messages are sanitized using `htmlspecialchars()` to prevent XSS attacks.
- **Field Validation**: Essential to prevent empty or invalid data from being processed.
- **Success/Error Messages**: Users receive feedback on their submission status.

