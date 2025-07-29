<?php

class Employee {
    public $name;        
    protected $salary;   
    private $bonus;       

    public function __construct($name, $salary, $bonus) {
        $this->name = $name;
        $this->salary = $salary;
        $this->bonus = $bonus;
    }


    public function printDetails() {
        echo "Name: " . $this->name . "<br>";
        echo "Salary: " . $this->salary . "<br>";
        echo "Bonus: " . $this->bonus . "<br>";
    }
}


$emp = new Employee("Mohamed", 5000, 1000);
$emp->printDetails();

?>
