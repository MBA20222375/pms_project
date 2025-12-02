<?php
include "../../core/validations.php";  
include "../../core/functions.php";  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id  = $_POST['id'] ?? null;
    $qty = $_POST['qty'] ?? null;

    if ($id !== null && $qty !== null) {
        updateCartQty($id, (int)$qty);
    }
}

header("Location: ../../cart.php");
exit;