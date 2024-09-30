
Q.N. 1: You need to create an array to store product details, such as product_name, price, quantity_in_stock. 
Write a function to check if a specific product is in stock.
```
<?php
$products = [
    ["product_name" => "Laptop", "price" => 75000, "quantity_in_stock" => 10],
    ["product_name" => "Mouse", "price" => 1500, "quantity_in_stock" => 50],
    ["product_name" => "Keyboard", "price" => 2500, "quantity_in_stock" => 0],
    ["product_name" => "Monitor", "price" => 20000, "quantity_in_stock" => 5]
];

// Function to check if a product is in stock
function isProductInStock($products, $productName) {
    foreach ($products as $product) {
        if ($product['product_name'] === $productName) {
            return $product['quantity_in_stock'] > 0 ? "In Stock" : "Out of Stock";
        }
    }
    return "Product not found";
}

// Example usage
echo "Laptop status: " . isProductInStock($products, $products[0]["product_name"]) . "<br>";
echo "Keyboard status: " . isProductInStock($products, $products[2]["product_name"]) . "<br>";

echo "<hr>"; // Divider
?>
```
---


Create an array with your expenses categorized by items like rent, groceries, utilities, and entertainment. Write a function to calculate the total monthly expense.

```
$expenses = [
    ["category" => "Rent", "amount" => 30000],
    ["category" => "Groceries", "amount" => 15000],
    ["category" => "Utilities", "amount" => 5000],
    ["category" => "Entertainment", "amount" => 3000]
];

// Function to calculate the total monthly expense
function calculateTotalExpenses($expenses) {
    $total = 0;
    foreach ($expenses as $expense) {
        $total += $expense['amount'];
    }
    return $total;
}

// Display the total monthly expense
echo "Total Monthly Expense: NPR " . calculateTotalExpenses($expenses);
echo "<hr>"; // Divider
?>
```
---

Q.N. 3: Create an array to store students' names and their marks. Write a function to
find and display the student with the highest marks.

```
<?php
$students = [
    ["name" => "Alice", "marks" => 85],
    ["name" => "Bob", "marks" => 78],
    ["name" => "Charlie", "marks" => 92],
    ["name" => "Diana", "marks" => 88]
];

// Function to find the student with the highest marks
function findTopStudent($students) {
    $topStudent = $students[0];
    foreach ($students as $student) {
        if ($student['marks'] > $topStudent['marks']) {
            $topStudent = $student;
        }
    }
    return $topStudent;
}

// Display the top student
$topStudent = findTopStudent($students);
echo "Top Student: " . $topStudent['name'] . " with " . $topStudent['marks'] . " marks";
echo "<hr>"; // Divider

?>
```
---

Q.N. 4: Create an array storing employee names and their hourly wages. Write a
function to calculate the monthly salary of each employee, assuming they work 160
hours per month.

```
<?php
$employees = [
    ["name" => "John", "hourly_wage" => 500],
    ["name" => "Jane", "hourly_wage" => 600],
    ["name" => "Paul", "hourly_wage" => 550],
    ["name" => "Anna", "hourly_wage" => 700]
];

// Function to calculate monthly salary
function calculateMonthlySalary($employees, $hoursWorked) {
    $salaries = [];
    foreach ($employees as $employee) {
        $monthlySalary = $employee['hourly_wage'] * $hoursWorked;
        $salaries[] = ["name" => $employee['name'], "monthly_salary" => $monthlySalary];
    }
    return $salaries;
}

// Display monthly salaries
$monthlySalaries = calculateMonthlySalary($employees, 160);
echo "<h3>Employee Monthly Salaries:</h3>";
foreach ($monthlySalaries as $salary) {
    echo "Employee: {$salary['name']}, Monthly Salary: NPR {$salary['monthly_salary']}<br>";
}
echo "<hr>"; // Divider
/>
```
---

Q.N. 5: Suppose you have an online shopping cart, and you want to calculate the total
amount for the products in the cart, apply a discount (10%) if the total amount
exceeds a certain threshold (e.g. 500), and calculate tax(e.g., 13% VAT).

```
<?php
$carts = [
    ["name" => "Laptop", "price" => 800, "quantity" => 1],
    ["name" => "Headphones", "price" => 50, "quantity" => 2],
    ["name" => "Mouse", "price" => 25, "quantity" => 1],
    ["name" => "Keyboard", "price" => 75, "quantity" => 1]
];

// Function to calculate total price
function calculateTotal($carts) {
    $total = 0; // Initialize total price
    foreach ($carts as $item) {
        $itemTotal = $item['price'] * $item['quantity'];
        $total += $itemTotal; // Add to the overall total
    }
    return $total; // Return total price
}

// Calculate the total amount
$totalAmount = calculateTotal($carts);
echo "Total before discount: NPR " . $totalAmount . "<br>";

// Function to apply a discount if total is above a threshold
function applyDiscount($total) {
    if ($total > 500) {
        $discount = $total * 0.10; // 10% discount
        $total -= $discount; // Subtract the discount from total
        echo "Discount applied: NPR " . $discount . "<br>";
    }
    return $total;
}

// Apply discount if applicable
$totalAmount = applyDiscount($totalAmount);
echo "Total after discount: NPR " . $totalAmount . "<br>";

// Function to calculate tax (e.g., 13% VAT)
function calculateTax($total) {
    $taxRate = 0.13; // Tax rate (13%)
    $tax = $total * $taxRate; // Calculate tax amount
    return $tax;
}

// Calculate tax on the total amount
$taxAmount = calculateTax($totalAmount);
echo "Tax amount (13%): NPR " . $taxAmount . "<br>";

// Calculate final amount
$finalAmount = $totalAmount + $taxAmount;
echo "Final amount to be paid: NPR " . $finalAmount;
?>
```
---