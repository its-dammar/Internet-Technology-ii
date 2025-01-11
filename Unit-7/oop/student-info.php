<?php
// Define the Student class
class Student {
    // Properties
    private $name;
    private $age;
    private $grade;

    // Constructor to initialize the student information
    public function __construct($name, $age, $grade) {
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    // Method to display student details
    public function displayDetails() {
        echo "Student Name: {$this->name}<br><br>";
        echo "Age: {$this->age}<br><br>";
        echo "Grade: {$this->grade}<br><br>";
    }

    // Method to update the student's grade
    public function updateGrade($newGrade) {
        $this->grade = $newGrade;
        echo "{$this->name}'s grade has been updated to {$this->grade}.<br><br>";
    }
}

// Create objects of the Student class
$student1 = new Student("Chhaya", 16, "A");
$student2 = new Student("Aman", 17, "B");

// Display student details
$student1->displayDetails();
$student2->displayDetails();

// Update the grade of a student
$student2->updateGrade("A+");

// Display updated details
$student2->displayDetails();
?>
