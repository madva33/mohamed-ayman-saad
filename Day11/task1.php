<?php
class Book{
    public $title;
    public function read(){
        echo " Ahmed read $this->title now";
    }
}
$book = new  Book();
$book->title = "Harry Potter";
$book->read();

?>
