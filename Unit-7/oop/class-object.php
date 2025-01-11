<?php
// Define the Product class
class Product {
    // Properties
    private $name;
    private $price;
    private $quantity;

    // Constructor to initialize the product
    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    // Method to calculate the total value of the product in stock
    public function calculateTotalValue() {
        return $this->price * $this->quantity;
    }

    // Method to display product details
    public function displayProductDetails() {
        echo "Product Name: {$this->name}\n <br> <br>";
        echo "Price: {$this->price}\n <br> <br>";
        echo "Quantity: {$this->quantity}\n <br><br>";
        echo "Total Value: " . $this->calculateTotalValue() . "\n\n <br><br>";
    }

    // Method to update the product's quantity
    public function updateQuantity($newQuantity) {
        $this->quantity = $newQuantity;
    }
}

// Create instances of the Product class (objects)
$product1 = new Product("Laptop", 800, 10);
$product2 = new Product("Smartphone", 500, 25);

// Display product details
$product1->displayProductDetails();
$product2->displayProductDetails();

// Update quantity of a product and display updated details
$product1->updateQuantity(15);
echo "After updating quantity:\n <br><br><br>";
$product1->displayProductDetails();
?>
