<?php
//check data from method post
include "../../core/validations.php";  
include "../../core/functions.php";  

if($_SERVER["REQUEST_METHOD"]=="POST"){
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$error= validateLogin ($email,$password);
if(!empty($error)){
 setMessages("danger",$error);
header("Location:../../login.php");
    exit;
}
if(loginUser($email,$password)){
   setMessages("success","login success");
  header("Location:../../index.php");
    exit;
}
setMessages("danger","faild login ");
header("Location:../../login.php");
    exit;
}