### **Assignment 2 Solutions**

Below are the PHP solutions for each of the tasks given in the assignment.

---

#### **1. Write a PHP program to remove duplicate values from an array.**

**Solution:**
```
<?php
$array = [1, 2, 3, 2, 4, 5, 3, 6, 4];
$uniqueArray = array_unique($array);

echo "Array without duplicates: ";
print_r($uniqueArray);
// Output: Array without duplicates: Array ( [0] => 1 [1] => 2 [2] => 3 [4] => 4 [5] => 5 [7] => 6 )
?>
```

---

#### **2. Find the Largest Number in an Array.**

**Solution:**
```
<?php
$numbers = [10, 25, 47, 36, 89, 56];
$largest = max($numbers);

echo "The largest number in the array is: " . $largest;
// Output: The largest number in the array is: 89
?>
```

---

#### **3. Create a pyramid pattern using nested loops.**

**Solution:**
```
<?php
$rows = 5;

for ($i = 1; $i <= $rows; $i++) {
    // Print spaces
    for ($j = $rows; $j > $i; $j--) {
        echo "&nbsp;&nbsp;";
    }
    // Print stars
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "* ";
    }
    echo "<br>";
}
/*
Output:
        * 
      * * * 
    * * * * * 
  * * * * * * * 
* * * * * * * * *
*/
?>
```

---

#### **4. Create a PHP script to separate even and odd numbers from a given array.**

**Solution:**
```
<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenNumbers = [];
$oddNumbers = [];

foreach ($numbers as $number) {
    if ($number % 2 == 0) {
        $evenNumbers[] = $number;
    } else {
        $oddNumbers[] = $number;
    }
}

echo "Even Numbers: ";
print_r($evenNumbers);
// Output: Even Numbers: Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 [4] => 10 )

echo "<br>Odd Numbers: ";
print_r($oddNumbers);
// Output: Odd Numbers: Array ( [0] => 1 [1] => 3 [2] => 5 [3] => 7 [4] => 9 )
?>
```

---

#### **5. Find the sum of all even numbers between 1 and 100.**

**Solution:**
```
<?php
$sum = 0;

for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        $sum += $i;
    }
}

echo "The sum of all even numbers between 1 and 100 is: " . $sum;
// Output: The sum of all even numbers between 1 and 100 is: 2550
?>
```

These solutions demonstrate fundamental PHP concepts such as array manipulation, loops, conditional statements, and the use of built-in functions.