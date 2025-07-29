<?php
abstract class Shape {
    abstract public function draw();
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a Circle<br>";
    }
}

class Rectangle extends Shape {
    public function draw() {
        echo "Drawing a Rectangle<br>";
    }
}


$shapes = [new Circle(), new Rectangle()];

foreach ($shapes as $shape) {
    $shape->draw();
}
?>
