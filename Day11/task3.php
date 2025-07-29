<?php

class Course {
    private $title;
    private $instructor;


    public function __construct($title, $instructor) {
        $this->title = $title;
        $this->instructor = $instructor;
    }


    public function describe() {
        echo "Course Title: " . $this->title . "<br>";
        echo "Instructor: " . $this->instructor . "<br>";
    }
}


$course1 = new Course("FullStack using PHP  ", "ENG/ Ahmed AbuBakr");
$course1->describe();

?>
