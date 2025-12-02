<?php
session_start();

include "../../core/validations.php";
include "../../core/functions.php";


if (isset($_POST['id']) && !empty($_POST['id'])) {

    $id = $_POST['id'];

    if (Deleteproducts($id)) {

        setMessages("success", "Product deleted successfully");
        header("Location: ../../index.php");
        exit;

    } else {

        setMessages("danger", "Failed to delete product");
        header("Location: ../../index.php");
        exit;

    }

} else {

    setMessages("danger", "Invalid Request");
    header("Location: ../../index.php");
    exit;

}
?>
