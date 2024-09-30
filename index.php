<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
echo "PCM";
 $a = 10;
$b= 20;
$b++;

// echo "<br>";
echo $a + $b;

$x= 20;
$y= 30;
$z= 40;

echo $x+=$y;
echo $x>$y;
echo $x!=$y;

echo $x>$y && $y<$z;



$isPremiumMember = true;
$totalPurchase = 6000;
if ($isPremiumMember || $totalPurchase > 5000) {
    echo "Eligible for discount"; // Output: Eligible for discount
} else {
    echo "Not eligible for discount";
}


?>

<?php
$age = 17;
$category = ($age < 13) ? "Child" : (($age <= 19) ? "Teen" : "Adult");
echo "Age Category: " . $category; // Output: Age Category: Teen
?>






</body>
</html>