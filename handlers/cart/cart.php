<?php


include "../../core/validations.php";  
include "../../core/functions.php";  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id    = $_POST['id'] ?? null;
    $name  = $_POST['name'] ?? 'No Name';
    $price = $_POST['price'] ?? 0;

    if ($id && $name && $price) {
        addToCart($id, $name, $price);
    }
}

header("Location: ../../cart.php");
exit;