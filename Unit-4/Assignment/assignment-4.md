
#### **1. Registration and Login System**

**Task:**
- Create a **Registration Form** using the `POST` method where users can register with their `username`, `email`, and `password`.
- Store the registered user data in a **MySQL database**.
- Develop a **Login Form** using the `POST` method, allowing users to log in using their `email` and `password`.
- Display a personalized **welcome message** upon successful login.

**Requirements:**
- Validate the email format and ensure all fields are filled out during registration.
- Hash passwords using `password_hash()` before storing them in the database.
- Check credentials securely using `password_verify()` during login.



#### **2. Contact Form with Email Functionality**

**Task:**
- Create a **Contact Us form** using the `POST` method where users can input their `name`, `email`, `subject`, and `message`.
- On submission, send an email containing the form data to a specified email address using PHP's `mail()` function.

**Requirements:**
- Validate that all fields are correctly filled out.
- Provide error messages for missing or incorrect input.
- Display a confirmation message once the email is sent successfully.





#### **3. Display Product List with Search Functionality**

**Task:**
- Create a **product listing page** that displays a list of products retrieved from a **MySQL database**.
- Implement a **search functionality** using the `GET` method to filter products by `name` or `category`.

**Requirements:**
- The search results should be displayed on the same page.
- Use `$_SERVER['PHP_SELF']` to handle form submission for the search filter.
- Ensure that search queries are sanitized to prevent SQL injection.




#### **4. Visitor Counter Using `$_SERVER`**

**Task:**
- Develop a **visitor counter** that tracks and displays the number of unique visits to a webpage.
- Store the visitor count in a **text file** and update it each time the page is accessed.

**Requirements:**
- Use `$_SERVER['REMOTE_ADDR']` to identify unique visitors.
- Increment the counter only for unique IP addresses.
- Display the total number of visitors on the page.




#### **5. File Upload and Display**

**Task:**
- Create a **file upload form** using the `POST` method where users can upload images.
- Save the uploaded files in a specific directory on the server.
- Display a **gallery** of all uploaded images on a separate page.

**Requirements:**
- Validate that only image files (`jpg`, `png`, `gif`) are uploaded.
- Limit the file size to a maximum of 2MB.
- Handle any errors that occur during the upload process (e.g., file too large, incorrect format).




#### **6. Build an Admin Panel to Manage Users**

**Task:**
- Create an **admin panel** where admins can view, edit, or delete registered users using `GET` and `POST` methods.
- Display all user records in a table with options to **edit** or **delete** each user.

**Requirements:**
- Implement `GET` to fetch user data for editing.
- Use `POST` to update or delete the user information.
- Ensure proper validation and error handling during edit operations.

---

