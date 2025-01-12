<?php 
class Animal {
    public function makeSound() {
        echo "Some generic sound\n";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Bark\n";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow\n";
    }
}

$animals = [new Dog(), new Cat()];
foreach ($animals as $animal) {
    $animal->makeSound();
}
?>