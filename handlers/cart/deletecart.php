<?php

include "../../core/validations.php";
include "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id !== null) {
        removeFromCart($id);
    }
}

header("Location: ../../cart.php");
exit;
?>