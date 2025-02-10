<!-- What is the difference between protected, protected, and protected access modifiers? -->

<?php
class Car{
    protected $name;
    protected $color;
    protected $model;

    function __construct($name, $color, $model){
        $this->name = $name;
        $this->color = $color;
        $this->model = $model;
    }

    function drive(){
        printf ("I am driving a %s %s %s", $this->color, $this->name, $this->model);
    }

}
$myCar = new Car("Toyota", "Red", "Corolla");
$myCar->drive();
?>