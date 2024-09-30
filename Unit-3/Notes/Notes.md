### **Unit 3: Array and Function**

In this unit, we will explore arrays, which are fundamental data structures in PHP, and delve into PHP's built-in and user-defined functions. Understanding these concepts will help you efficiently manage data and create more dynamic and reusable code.

---

## **3.1 Working with Arrays**

An **array** is a data structure that allows you to store multiple values in a single variable. Arrays in PHP are categorized into three main types: Indexed Arrays, Associative Arrays, and Multi-dimensional Arrays.

---

### **3.1.1 Indexed Array**

#### **Definition:**
An **Indexed Array** stores values with numeric indexes that start from `0`. It’s useful when you have a list of items that you want to store sequentially.

#### **Example:**
```php
<?php
$colors = ["Red", "Green", "Blue"];
echo $colors[0]; // Output: Red
?>
```

#### **Important Points:**
- Values can be accessed using numeric indices.
- Ideal for storing lists where the position/order matters.

---

### **3.1.2 Associative Array**

#### **Definition:**
An **Associative Array** uses named keys (strings) to store values, making it easier to access data with meaningful keys rather than numeric indexes.

#### **Example:**
```php
<?php
$student = [
    "name" => "Alice",
    "age" => 21,
    "course" => "Computer Science"
];
echo $student["name"]; // Output: Alice
?>
```

#### **Important Points:**
- Values are accessed using string keys.
- Useful when data has a logical association with specific keys.

---

### **3.1.3 Difference Between Indexed and Associative Arrays**

| **Aspect**     | **Indexed Array**                              | **Associative Array**                          |
|----------------|------------------------------------------------|-----------------------------------------------|
| **Index Type** | Numeric (0, 1, 2, ...)                         | String keys ("name", "age", ...)              |
| **Usage**      | When you need sequential data                  | When data has meaningful keys                 |
| **Example**    | `$array = [1, 2, 3];`                          | `$array = ["key1" => "value1"];`              |

---

### **3.1.4 Multi-dimensional Array**

#### **Definition:**
A **Multi-dimensional Array** is an array that contains one or more arrays as its elements. It’s often used to represent complex data structures like matrices or tables.

#### **Example:**
```php
<?php
$students = [
    ["name" => "John", "age" => 20],
    ["name" => "Alice", "age" => 22]
];
echo $students[1]["name"]; // Output: Alice
?>
```

#### **Important Points:**
- Can have multiple levels (e.g., 2D, 3D arrays).
- Useful for representing structured data (e.g., rows and columns in a table).

---

## **3.2 PHP’s Built-in Functions**

PHP offers a wide range of built-in functions to handle different tasks efficiently. Here, we’ll explore some of the commonly used built-in functions:

---

### **3.2.1 String Functions**

String functions help manipulate text data in PHP.

#### **Example:**
```php
<?php
$text = "Hello World";
echo strlen($text); // Output: 11 (length of the string)
echo str_replace("World", "PHP", $text); // Output: Hello PHP
?>
```

---

### **3.2.2 Math Functions**

Math functions allow you to perform mathematical operations.

#### **Example:**
```php
<?php
echo abs(-10);    // Output: 10 (absolute value)
echo pow(2, 3);   // Output: 8 (2 raised to the power of 3)
?>
```

---

### **3.2.3 Date and Time Functions**

These functions are used to handle date and time operations.

#### **Example:**
```php
<?php
echo date("Y-m-d"); // Output: Current date in YYYY-MM-DD format
echo time();        // Output: Current Unix timestamp
?>
```

---

### **3.2.4 Array Functions**

Array functions help manipulate array data efficiently.

#### **Example:**
```php
<?php
$fruits = ["Apple", "Banana", "Orange"];
array_push($fruits, "Mango");
print_r($fruits); // Output: Array ( [0] => Apple [1] => Banana [2] => Orange [3] => Mango )
?>
```

---

## **3.3 User-Defined Functions**

You can create your own functions in PHP, known as user-defined functions. These functions allow you to encapsulate reusable blocks of code.

---

### **3.3.1 Passing Arguments and Return**

#### **Definition:**
- **Arguments:** Parameters passed to a function for processing.
- **Return:** The output a function sends back to the calling script.

#### **Example:**
```php
<?php
function addNumbers($a, $b) {
    return $a + $b;
}

$result = addNumbers(5, 10);
echo "The sum is: " . $result; // Output: The sum is: 15
?>
```

#### **Important Points:**
- Arguments allow functions to handle different data inputs.
- The `return` statement sends a result back to the code that called the function.

---

### **3.3.2 Variable Scoping**

#### **Definition:**
Variable scoping refers to the visibility or accessibility of variables in different parts of the program. There are three main scopes:
- **Local:** Defined within a function and not accessible outside.
- **Global:** Defined outside all functions and accessible anywhere.
- **Static:** Retains its value even after the function completes.

#### **Example:**
```php
<?php
$globalVar = 10; // Global scope

function testScope() {
    global $globalVar; // Accessing global variable
    static $counter = 0; // Static variable
    $localVar = 5; // Local variable
    $counter++;
    echo "Global: $globalVar, Local: $localVar, Counter: $counter <br>";
}

testScope();
testScope();
// Output: 
// Global: 10, Local: 5, Counter: 1 
// Global: 10, Local: 5, Counter: 2
?>
```

