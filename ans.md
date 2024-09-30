### Basic Assignment and Arithmetic Operators*

#### Question 1: Salary Calculation
*Problem*: Given an employee's base salary of $baseSalary = 50000 and a 10% bonus, calculate the total salary.

php
$baseSalary = 50000;
$bonus = $baseSalary * 0.10; // 10% of the base salary
$baseSalary += $bonus; // Adding the bonus to the base salary
echo "Total Salary: " . $baseSalary; // Output: Total Salary: 55000


#### Question 2: Shopping Cart Total
Problem: Calculate the total price for items with prices $item1 = 150, $item2 = 200, and $item3 = 300.

php
$item1 = 150;
$item2 = 200;
$item3 = 300;
$totalPrice = 0;
$totalPrice += $item1;
$totalPrice += $item2;
$totalPrice += $item3;
echo "Total Price: " . $totalPrice; // Output: Total Price: 650


#### Question 3: Discount Calculation*
*Problem*: Calculate the discounted price of a product with an original price $price = 1200 and a 20% discount.

php
$price = 1200;
$discountRate = 0.20; // 20% discount
$discountAmount = $price * $discountRate;
$price -= $discountAmount;
echo "Discounted Price: " . $price; // Output: Discounted Price: 960


### *2. Comparison Operators*

#### Question 4: Age Verification*
*Problem*: Check if a user is eligible to vote (18 years or older).

php
$age = 20;
if ($age >= 18) {
    echo "Eligible to vote"; // Output: Eligible to vote
} else {
    echo "Not eligible to vote";
}


#### Question 5: Checking Stock Levels*
*Problem*: Determine if there is sufficient stock available given $stock = 10 and $orderQuantity = 15.

php
$stock = 10;
$orderQuantity = 15;
if ($stock >= $orderQuantity) {
    echo "Stock is sufficient";
} else {
    echo "Insufficient stock"; // Output: Insufficient stock
}


### *3. Logical Operators*

#### Question 6: User Authentication*
*Problem*: Check if a user can access the system if their username is "admin" and password is "password123".

php
$username = "admin";
$password = "password123";
if ($username === "admin" && $password === "password123") {
    echo "Access granted"; // Output: Access granted
} else {
    echo "Access denied";
}


#### Question 7: Discount Eligibility*
*Problem*: Check if a customer qualifies for a discount if they are either a premium member or their total purchase exceeds 5000.

php
$isPremiumMember = false;
$totalPurchase = 6000;
if ($isPremiumMember || $totalPurchase > 5000) {
    echo "Eligible for discount"; // Output: Eligible for discount
} else {
    echo "Not eligible for discount";
}


### *4. Bitwise Operators*

#### Question 8: Permission Handling*
*Problem*: Check user permissions where read is 4, write is 2, and execute is 1. Given $permission = 5, determine access.

php
$permission = 5; // Binary: 101
$read = 4;      // Binary: 100
$write = 2;     // Binary: 010
$execute = 1;   // Binary: 001

echo ($permission & $read) ? "Read access granted\n" : "Read access denied\n"; // Output: Read access granted
echo ($permission & $write) ? "Write access granted\n" : "Write access denied\n"; // Output: Write access denied
echo ($permission & $execute) ? "Execute access granted\n" : "Execute access denied\n"; // Output: Execute access granted


#### Question 9: Switching Lights On and Off*
*Problem*: Toggle light states given $lights = 9 (binary 1001).

php
$lights = 9; // Binary: 1001
$toggle = 2; // Binary: 0010
$lights ^= $toggle; // Toggling light at the position of 2
echo "Updated light state: " . $lights; // Output: Updated light state: 11


### *5. Compound Assignment Operators*

#### Question 10: Product Price Update*
*Problem*: Increase a product price $productPrice = 200 by 5% every month.

php
$productPrice = 200;
$productPrice += $productPrice * 0.05; // Increasing by 5%
echo "Updated Product Price: " . $productPrice; // Output: Updated Product Price: 210


#### Question 11: Cumulative Sum*
*Problem*: Calculate the cumulative earnings over three days.

php
$day1 = 100;
$day2 = 150;
$day3 = 200;
$totalEarnings = 0;
$totalEarnings += $day1;
$totalEarnings += $day2;
$totalEarnings += $day3;
echo "Total Earnings: " . $totalEarnings; // Output: Total Earnings: 450


### *6. Real-Time Calculation Scenarios*

#### Question 12: Currency Conversion*
*Problem*: Convert $amountInUSD = 1000 to NPR at $conversionRate = 120.

php
$amountInUSD = 1000;
$conversionRate = 120;
$amountInNPR = $amountInUSD * $conversionRate;
echo "Amount in NPR: " . $amountInNPR; // Output: Amount in NPR: 120000


#### Question 13: Bank Account Transactions*
*Problem*: Calculate the final bank balance after deposit and withdrawal.

php
$balance = 10000;
$deposit = 3000;
$withdraw = 1500;
$balance += $deposit;
$balance -= $withdraw;
echo "Final Balance: " . $balance; // Output: Final Balance: 11500


### *7. Control and Conditions*

#### Question 14: Shipping Fee Calculation*
*Problem*: Determine the shipping fee based on package weight using the ternary operator.

php
$weight = 6; // in kg
$shippingFee = ($weight > 5) ? 200 : 100;
echo "Shipping Fee: " . $shippingFee; // Output: Shipping Fee: 200


#### Question 15: Age Category Check*
*Problem*: Categorize a person as "Child," "Teen," or "Adult" using the ternary operator.

php
$age = 17;
$category = ($age < 13) ? "Child" : (($age <= 19) ? "Teen" : "Adult");
echo "Age Category: " . $category; // Output: Age Category: Teen

