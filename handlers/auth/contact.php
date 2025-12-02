<?php

include "../../core/validations.php";  
include "../../core/functions.php"; 



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    $error = validateContact($name, $email, $message);

    if(!empty($error)){
        setMessages("danger", $error);
        header("Location: ../../contact.php");
        exit;
    }
    if(saveContact($name, $email, $message)){
        $_SESSION['name'] = [
            "name" => $name,
            "email" => $email,
            "message"=>$message,

        ];
        setMessages("success", "   success message sent");
        header("Location: ../../index.php");
        exit;
    }

    setMessages("danger", "Failed message sent");
    header("Location: ../../contact.php");
    exit;
}