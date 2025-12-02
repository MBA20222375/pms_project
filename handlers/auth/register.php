<?php
session_start();

include "../../core/validations.php";  
include "../../core/functions.php";  

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $error = validateRegister($name, $email, $password, $confirm_password);

    if(!empty($error)){
        setMessages("danger", $error);
        header("Location: ../../register.php");
        exit;
    }

    if(registeruser($name, $email, $password)){
        $_SESSION['user'] = [
            "name" => $name,
            "email" => $email,
        ];
        setMessages("success", "Register success ");
        header("Location: ../../index.php");
        exit;
    }

    setMessages("danger", "Failed Register");
    header("Location: ../../register.php");
    exit;
}