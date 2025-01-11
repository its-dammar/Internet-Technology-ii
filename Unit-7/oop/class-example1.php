<?php
class Product {
    public $name;
    public $price;
    public $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function calculateTotalPrice() {
        return $this->price * $this->quantity;
    }

    public function printDetails() {
        echo "Product Name: $this->name, Price: $this->price, Quantity: $this->quantity\n";
    }
}
?>
