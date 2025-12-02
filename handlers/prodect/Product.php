<?php

include "../../core/validations.php";  
include "../../core/functions.php";  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $price = trim($_POST['Price']);
    $description = trim($_POST['Details']);

    $id = isset($_POST['id']) ? $_POST['id'] : null;

    $image = '';
    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){
        $imageName = time() . '_' . $_FILES['image']['name'];
        $targetDir = __DIR__ . '../../../public/upload/';

        if(!file_exists($targetDir)){
            mkdir($targetDir, 0777, true);
        }

        move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $imageName);
        $image = 'public/upload/' . $imageName;
    }

    if($id){  
        updateProduct($id, $name, $price, $description, $image);
        setMessages('success', 'Product updated successfully!');
    } else {
        
        createProduct($name, $price, $description, $image);
        setMessages('success', 'Product added successfully!');
    }

    header("Location: ../../index.php");
    exit;
}
