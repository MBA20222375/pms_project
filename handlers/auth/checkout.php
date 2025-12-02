<?php
session_start();


include __DIR__ . '/../../core/functions.php';
include __DIR__ . '/../../core/validations.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $address = trim($_POST['Address'] ?? '');
    $number  = trim($_POST['number'] ?? '');
    $notes   = trim($_POST['Notes'] ?? '');

   

    if (!empty($error)) {
        if(function_exists('setMessages')) {
            setMessages("danger", $error);
        }
        header("Location: ../../checkout.php");
        exit;
    }

    if (Checkout(uniqid(), $name, $email, $number, $notes)) {
        $_SESSION['checkout'] = [
            "name"    => $name,
            "email"   => $email,
            "address" => $address,
            "number"  => $number,
            "notes"   => $notes
        ];

        if(function_exists('setMessages')) {
            setMessages("success", "Your order was successfully sent!");
        }
        header("Location: ../../index.php");
        exit;
    } else {
        if(function_exists('setMessages')) {
            setMessages("danger", "Failed to send your order.");
        }
        header("Location: ../../checkout.php");
        exit;
    }
}
