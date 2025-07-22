<?php

function calculateTotal($price, $quantity) {
    return $price * $quantity;
}

$calculateTax = fn($total) => $total + 45;

$logger = function($message) {
    echo "" . $message . "<br>";
};


$price = 100;
$quantity = 3;

$total = calculateTotal($price, $quantity);
$logger("Total without tax: $total");

$tax = $calculateTax($total);
$logger("Total after Tax (15%): $tax");


?>
