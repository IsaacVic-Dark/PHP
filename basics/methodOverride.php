<!-- Method overriding allows a child class to overide a parent class -->
<?php
class ParentClass {
    public function greet() {
        echo "Hello from Parent Class!";
    }
}

class ChildClass extends ParentClass {
    public function greet() {
        echo "Hello from Child Class!";
    }
}

$obj = new ParentClass();
$obj->greet();  
?>
