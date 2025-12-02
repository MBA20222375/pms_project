<?php
session_start();

include "../../core/validations.php";  
include "../../core/functions.php";  
$id = $_GET['id'];
$name = $_GET['name'];
$price = $_GET['price'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'quantity' => 1
    ];
} else {
    $_SESSION['cart'][$id]['quantity']++;
}

header("Location: ../../cart.php");
exit;
?>
