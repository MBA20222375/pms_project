<?php

/* ----------------- ------------------ */

function validateRequired($inputName, $value)
{
    return (empty($value)) ? "$inputName is required" : null;
}

function validateMinString($string)
{
    return (strlen($string) < 4) ? "Name must be at least 4 characters" : null;
}

function validateEmail($email)
{
    return (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Invalid email" : null;
}

function validatePassword($password)
{
    if (strlen($password) < 6) {
        return "Password must be at least 6 characters";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        return "Password must contain at least one uppercase letter";
    }
    if (!preg_match("/[a-z]/", $password)) {
        return "Password must contain at least one lowercase letter";
    }
    if (!preg_match("/[0-9]/", $password)) {
        return "Password must contain at least one number";
    }
    return null;
}

function validatePasswordMatch($password, $confirm_password)
{
    return ($password === $confirm_password) ? null : "Passwords do not match";
}

function validateEmailUnique($email)
{
    $usersFile = realpath(__DIR__ . "/../data/users.json");
    $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

    foreach ($users as $user) {
        if ($email === $user['email']) {
            return "Email already exists";
        }
    }
    return null;
}

/* ------------------ REGISTER VALIDATION ------------------ */

function validateRegister($name, $email, $password, $confirm_password)
{
    $fields = [
        "name"    => $name,
        "email"   => $email,
        "password" => $password,
        "confirm_password" => $confirm_password
    ];

    foreach ($fields as $input_name => $value) {
        if ($error = validateRequired($input_name, $value)) {
            return $error;
        }
    }

    if ($error = validateMinString($name)) return $error;
    if ($error = validateEmail($email)) return $error;
    if ($error = validateEmailUnique($email)) return $error;
    if ($error = validatePassword($password)) return $error;
    if ($error = validatePasswordMatch($password, $confirm_password)) return $error;

    return null;
}

/* ------------------ LOGIN VALIDATION ------------------ */

function validateLogin($email, $password)
{
    if ($error = validateRequired("email", $email)) return $error;
    if ($error = validateRequired("password", $password)) return $error;
    if ($error = validateEmail($email)) return $error;

    return null;
}

/* ------------------ CONTACT FORM VALIDATION ------------------ */

function validateContact($name, $email, $message)
{
    $fields = [
        "name" => $name,
        "email" => $email,
        "message" => $message
    ];

    foreach ($fields as $input_name => $value) {
        if ($error = validateRequired($input_name, $value)) return $error;
    }

    if ($error = validateMinString($name)) return $error;
    if ($error = validateEmail($email)) return $error;

    return null;
}

/* -----------------------------------------------------------
    PRODUCT VALIDATION 
-------------------------------------------------------------*/

function validateImage($image)
{
    if (!isset($image) || $image['error'] !== UPLOAD_ERR_OK) {
        return "Image is required";
    }

    $allowed = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
    if (!in_array($image['type'], $allowed)) {
        return "Invalid image type (Allowed: JPG, PNG, WEBP)";
    }

    if ($image['size'] > 2 * 1024 * 1024) { 
        return "Image size must be less than 2MB";
    }

    return null;
}

function validatecreatprodect($name, $Price, $Details, $image){
    if(empty($name) || empty($Price) || empty($Details)){
        return "All fields are required";
    }

    if(strlen($name) < 4){
        return "Name must be at least 4 characters";
    }

    if(!isset($image) || $image['error'] !== UPLOAD_ERR_OK){
        return "Image is required";
    }

    $allowed = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
    if(!in_array($image['type'], $allowed)){
        return "Invalid image type";
    }

    if($image['size'] > 2*1024*1024){ 
        return "Image size must be less than 2MB";
    }

    return null;  
}

    function validateCreateProductForm($name, $price, $details, $image) {
    if ($error = validateRequired("name", $name)) return $error;
    if ($error = validateRequired("price", $price)) return $error;
    if ($error = validateRequired("details", $details)) return $error;
    if ($error = validateMinString($name)) return $error;
    if ($error = validateImage($image)) return $error;
    return null;
}

    return null;  



    /*---------------------------------------------------
                        CHECKOUT 
    -----------------------------------------------------*/

    function validateCheckout($name, $email, $address, $number, $notes) {
    $fields = [
        "name" => $name,
        "email" => $email,
        "address" => $address,
        "number" => $number,
        "notes" => $notes,
    ];

    foreach ($fields as $field => $value) {
        if ($error = validateRequired($field, $value)) {
            return $error;
        }
    }

    if ($error = validateMinString($name)) return $error;
    if ($error = validateEmail($email)) return $error;
    return null;
}
//------------------------------------------------------------
 if (function_exists('validateCheckout')) {
        $error = validateCheckout($name, $email, $address, $number, $notes);
    } else {
        $error = '';
        if(empty($name) || empty($email) || empty($address) || empty($number)) {
            $error = "Please fill all required fields.";
        }
    }
?>
