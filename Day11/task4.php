<?php
class Vehicle {
    public $Type;
    public $model;
    public $fuelType;
    public $modelyear;
 

    public function __construct($Type, $model ,$fuelType ,$modelyear) {
        $this->Type = $Type;
        $this->model = $model;
        $this->fuelType = $fuelType;
        $this->modelyear = $modelyear;

    }


    public function info() {
        echo "Type: $this->Type<br>";
        echo "Model: $this->model<br>";
        echo "fuelType: $this->fuelType<br>";
        echo "modelyear: $this->modelyear<br>";
    }
}

class Car extends Vehicle {
   

    public function __construct($Type, $model, $fuelType , $modelyear) {
        parent::__construct($Type, $model , $fuelType ,$modelyear);
    }

}


$car = new Car("Toyota", "Corolla", " Gasoline 95" , "2018");
$car->info();
?>
