<?php
abstract class Employee {
    abstract public function calculateSalary();
}

class HourlyEmployee extends Employee {
    private $hours;
    private $rate;

    public function __construct($hours, $rate) {
        $this->hours = $hours;
        $this->rate = $rate;
    }

    public function calculateSalary() {
        return $this->hours * $this->rate;
    }
}


$employee = new HourlyEmployee(40, 50);
echo "Salary: " . $employee->calculateSalary();
?>
