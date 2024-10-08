Basic Assignment and Arithmetic Operators
1. Salary Calculation: Suppose you have an employee's base salary of $baseSalary = 50000. If they receive a 10% bonus, 
write a PHP code snippet to calculate the total salary using an assignment operator.
   ans:
    ```
   <?php
    $baseSalary = 50000;
    $bonus = $baseSalary * 0.10; // 10% of the base salary
    $baseSalary += $bonus; // Adding the bonus to the base salary
    echo "Total Salary: " . $baseSalary; // Output: Total Salary: 55000
   ?>

2. Shopping Cart Total: A shopping cart contains items with prices stored in variables $item1 = 150, $item2 = 200, and $item3 = 300. 
Write a PHP code to calculate the total price using the addition assignment operator.
   ans:

   ```
   <?php 
    $item1 = 150;
    $item2 = 200;
    $item3 = 300;
    $totalPrice = 0;
    $totalPrice += $item1;
    $totalPrice += $item2;
    $totalPrice += $item3;
    echo "Total Price: " . $totalPrice; // Output: Total Price: 650

   ?>
   
3. Discount Calculation: Given an original price of a product $price = 1200 and a discount rate of 20%, calculate the discounted price using 
assignment operators.
ans:
 ```
<?php
    $price = 1200;
    $discountRate = 0.20; // 20% discount
    $discountAmount = $price * $discountRate;
    $price -= $discountAmount;
    echo "Discounted Price: " . $price; // Output: Discounted Price: 960
?>
Comparison Operators
4. Age Verification: You want to check if a user is eligible to vote (i.e., 18 years or older). Write a PHP code using comparison operators to 
verify eligibility.
ans:
 ```
<?php
    $age = 20;
    if ($age >= 18) {
        echo "Eligible to vote"; // Output: Eligible to vote
    } else {
        echo "Not eligible to vote";
    }
 ?>
   
5. Checking Stock Levels: Given a stock quantity $stock = 10 and an order quantity $orderQuantity = 15, use a comparison operator to determine 
if there is sufficient stock available.
ans:
 ```
<?php
    $stock = 10;
    $orderQuantity = 15;
    if ($stock >= $orderQuantity) {
        echo "Stock is sufficient";
    } else {
        echo "Insufficient stock"; // Output: Insufficient stock
    }

 ?>

Logical Operators
6. User Authentication: A user can access a system only if their username is "admin" and their password is "password123". 
Write a PHP script using logical operators to check if the user is authenticated.
ans:
 ```
<?php 
    $username = "admin";
    $password = "password123";
    if ($username === "admin" && $password === "password123") {
        echo "Access granted"; // Output: Access granted
    } else {
        echo "Access denied";
    }
?>

   
7. Discount Eligibility: A customer is eligible for a discount if they are either a premium member ($isPremiumMember = true) or if their total 
purchase exceeds 5000 ($totalPurchase > 5000). Write a PHP code snippet to check if the customer qualifies for a discount.
ans:
 ```
    $isPremiumMember = true;
    $totalPurchase = 5000;
    if ($isPremiumMember || $totalPurchase > 5000) {
        echo "Eligible for discount"; // Output: Eligible for discount
    } else {
        echo "Not eligible for discount";
    }

 Assignment Operators
10. Product Price Update: Suppose a store is running a campaign where prices of products are increased by 5% every month. 
Write a PHP code snippet to increase a product price stored in $productPrice = 200 using a assignment operator.
ans:
 ```
<?php
$productPrice = 200;
$productPrice += $productPrice * 0.05; // Increasing by 5%
echo "Updated Product Price: " . $productPrice; // Output: Updated Product Price: 210

 ?>
    
11. Cumulative Sum: Given a series of daily earnings, $day1 = 100, $day2 = 150, and $day3 = 200, write PHP code that uses assignment operators 
to calculate the cumulative earnings over three days.

 ```
<?php 
$day1 = 100;
$day2 = 150;
$day3 = 200;
$totalEarnings = 0;
$totalEarnings += $day1;
$totalEarnings += $day2;
$totalEarnings += $day3;
echo "Total Earnings: " . $totalEarnings; // Output: Total Earnings: 450

?>

Real-Time Calculation Scenarios
1.  Currency Conversion: Given an amount $amountInUSD = 1000 and the current conversion rate $conversionRate = 120 for USD to NPR, write PHP code 
to convert the amount using an assignment operator.
 ```
<?php
$amountInUSD = 1000;
$conversionRate = 120;
$amountInNPR = $amountInUSD * $conversionRate;
echo "Amount in NPR: " . $amountInNPR; // Output: Amount in NPR: 120000

 ?>
   
2.  Bank Account Transactions: You have a bank balance of $balance = 10000. If you deposit $deposit = 3000 and withdraw $withdraw = 1500, 
write a PHP script using assignment operators to calculate the final balance.
 ```
<?php

$balance = 10000;
$deposit = 3000;
$withdraw = 1500;
$balance += $deposit;
$balance -= $withdraw;
echo "Final Balance: " . $balance; // Output: Final Balance: 11500
 ?>

Control and Conditions
1.  Shipping Fee Calculation: Calculate the shipping fee based on the weight of a package: if the weight is greater than 5kg, the fee is 200; otherwise, 
it’s 100. Write a PHP script using the ternary operator to determine the fee.
 ```
<?php
$weight = 6; // in kg
$shippingFee = ($weight > 5) ? 200 : 100;
echo "Shipping Fee: " . $shippingFee; // Output: Shipping Fee: 200
 ?>
   
2.  Age Category Check: Given a variable $age, write a PHP script that categorizes the person as "Child," "Teen," or "Adult" using the ternary operator.
 ```
<?php
$age = 17;
$category = ($age < 13) ? "Child" : (($age <= 19) ? "Teen" : "Adult");
echo "Age Category: " . $category; // Output: Age Category: Teen
?>
