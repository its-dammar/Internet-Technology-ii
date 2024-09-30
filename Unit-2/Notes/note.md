### **Unit 2: Control Structures and Loop**

Control structures and loops are essential in programming for directing the flow of execution and handling repetitive tasks. This unit explains how to manage decision-making processes and repetitive operations using conditional statements and loops.

---

### **2.1 Conditional Statements**

Conditional statements are used to execute a block of code based on whether a certain condition is true or false.

#### **2.1.1 If, Else, Elseif**

- **If Statement**: Executes a block of code if a specified condition evaluates to `true`.
- **Else Statement**: Executes a block of code if the `if` condition is `false`.
- **Elseif Statement**: Used to specify a new condition if the previous `if` condition is `false`.

**Syntax**:
```php
if (condition) {
    // Code to execute if condition is true
} elseif (anotherCondition) {
    // Code to execute if anotherCondition is true
} else {
    // Code to execute if all conditions are false
}
```

**Example**:
```php
<?php
$age = 20;

if ($age < 18) {
    echo "You are a minor.";
} elseif ($age >= 18 && $age <= 60) {
    echo "You are an adult.";
} else {
    echo "You are a senior citizen.";
}
// Output: You are an adult.
?>
```

---

#### **2.1.2 Ternary Operator**

The **ternary operator** is a shorthand way of writing simple `if-else` statements. It uses the `? :` syntax and is useful for making quick decisions.

**Syntax**:
```php
(condition) ? value_if_true : value_if_false;
```

**Example**:
```php
<?php
$age = 20;
$message = ($age >= 18) ? "You are eligible to vote." : "You are not eligible to vote.";
echo $message; // Output: You are eligible to vote.
?>
```

---

#### **2.1.3 Switch Statement**

The **switch statement** is used to perform different actions based on the value of a variable. It is more efficient than multiple `elseif` statements when checking the same variable against different values.

**Syntax**:
```php
switch (variable) {
    case value1:
        // Code to execute if variable == value1
        break;
    case value2:
        // Code to execute if variable == value2
        break;
    default:
        // Code to execute if no match is found
}
```

**Example**:
```php
<?php
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "Start of the work week!";
        break;
    case "Friday":
        echo "Almost weekend!";
        break;
    default:
        echo "It's a regular day.";
}
// Output: Start of the work week!
?>
```

---

### **2.2 Using Loop for Repetitive Tasks**

Loops allow you to execute a block of code multiple times, making it easier to handle repetitive tasks efficiently.

#### **2.2.1 While, Do...While, For Loops**

- **While Loop**: Repeats a block of code as long as the condition is `true`.
  
**Syntax**:
```php
while (condition) {
    // Code to execute
}
```
**Example**:
```php
<?php
$count = 1;
while ($count <= 5) {
    echo "Count: $count<br>";
    $count++;
}
// Output: Count 1 to 5
?>
```

- **Do...While Loop**: Similar to the `while` loop but guarantees execution at least once because the condition is checked after the code executes.
  
**Syntax**:
```php
do {
    // Code to execute
} while (condition);
```
**Example**:
```php
<?php
$count = 1;
do {
    echo "Count: $count<br>";
    $count++;
} while ($count <= 5);
// Output: Count 1 to 5
?>
```

- **For Loop**: Useful when you know the exact number of iterations. It includes initialization, condition checking, and increment/decrement in one line.
  
**Syntax**:
```php
for (initialization; condition; increment) {
    // Code to execute
}
```
**Example**:
```php
<?php
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i<br>";
}
// Output: Number 1 to 5
?>
```

---

#### **2.2.2 Continue and Break**

- **Break Statement**: Immediately exits the loop when encountered, regardless of the condition.

**Example**:
```php
<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        break; // Loop exits when $i is 5
    }
    echo $i . " ";
}
// Output: 1 2 3 4
?>
```

- **Continue Statement**: Skips the current iteration of the loop and proceeds to the next iteration.

**Example**:
```php
<?php
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue; // Skips when $i is 3
    }
    echo $i . " ";
}
// Output: 1 2 4 5
?>
```

---

### **Differences Between Control Structures and Loops**

| **Aspect**            | **Conditional Statements**                               | **Loops**                                             |
|-----------------------|--------------------------------------------------------|------------------------------------------------------|
| **Purpose**           | Used for decision-making based on conditions            | Used for repetitive execution of code blocks         |
| **Types**             | `if`, `else`, `elseif`, `ternary`, `switch`             | `while`, `do...while`, `for`                         |
| **Execution**         | Executes code based on true/false conditions            | Executes repeatedly until a condition is no longer met |
| **Usage Example**     | Displaying different messages based on age              | Displaying numbers from 1 to 10                      |


### **Foreach Loop**

The **foreach loop** is a special type of loop in PHP that is specifically designed to iterate over arrays or collections. It allows you to loop through each element in an array, making it particularly useful for accessing and working with array data without the need for manual indexing.

#### **Syntax**
The `foreach` loop has two common forms:

1. **Basic Form** (only values):
   ```php
   foreach ($array as $value) {
       // Code to execute using $value
   }
   ```

2. **Key-Value Pair Form**:
   ```php
   foreach ($array as $key => $value) {
       // Code to execute using $key and $value
   }
   ```

#### **Explanation**
- `$array`: The array you want to loop through.
- `$key`: The current key/index of the array (optional).
- `$value`: The value of the current element.

---

#### **Example 1: Basic Usage (Iterating Over Values)**

```php
<?php
$fruits = ["Apple", "Banana", "Orange"];

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
// Output:
// Apple
// Banana
// Orange
?>
```

In this example, the loop iterates over each fruit in the `$fruits` array and prints them.

---

#### **Example 2: Key-Value Pair Usage**

```php
<?php
$person = [
    "name" => "John",
    "age" => 30,
    "email" => "john@example.com"
];

foreach ($person as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
// Output:
// name: John
// age: 30
// email: john@example.com
?>
```

In this example, the loop iterates over each key-value pair in the `$person` array, allowing you to access both the key (`$key`) and the corresponding value (`$value`).

---

### **When to Use the Foreach Loop**
- The `foreach` loop is ideal when working with arrays or objects.
- It simplifies code by eliminating the need to manually manage loop counters (indices).

### **Difference Between Foreach and Other Loops**

| **Aspect**    | **Foreach Loop**                                   | **For / While Loops**                                      |
|---------------|----------------------------------------------------|----------------------------------------------------------|
| **Use Case**  | Specifically for iterating over arrays or objects  | Can be used for any repetitive task with a condition     |
| **Syntax**    | Directly accesses array elements                   | Requires initialization, condition, and increment setup |
| **Complexity**| Simpler and more readable for array iteration      | More complex when iterating over arrays using indices    |

The `foreach` loop is the most efficient and straightforward way to iterate over arrays, making it a preferred choice when working with collections of data in PHP.