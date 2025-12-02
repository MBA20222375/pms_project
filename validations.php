<?php
function validateRequired($inputname,$value){

return (empty($value))? "$inputname  is required ": null;
}
//هنا بعمل بفكر اعمل function ديمنك  اسمهvalidateRequired بتاخد value لو فاضي رجع ان ال  faild Required لو مش فاضي رجعnull      
function validateMinstring($string){
return (strlen($string)<4)?"name must be at lesst 4 Characters ":null;
}
//لو هو اقل من 4 حروف مينفعش لازي يكون 4 طب لو 4 رجع null
function validateEmail($email){
return !filter_var($email,FILTER_VALIDATE_EMAIL)? "Invalid  Email" : null;
}
//!filter_var($email,FILTER_VALIDATE_EMAIL) هنا لو ايميل صحيح هترجع TRUE  
//طب لوTRUE المفروض ترجع NULL 
// هنا انا نفيت لو هو ب TRUE هيدني FALES
function validatePassword($Password){
    if(strlen($Password)<6) {
     return"Password must be 6 Characters ";

    }
    if((preg_match("/[A-Z]/",$Password))){
        return " Password must countion uppercase";
    }
    if((preg_match("/[a-z]/",$Password))){
        return " Password must countion lowcase";
    }
        if((preg_match("/[0-9]/",$Password))){
        return " Password must countion number";
    }
    return null;
}
//هنا بقوله لو داخل الباسورد اقل من 6 قوله لازم يكون 6 طب لو داخل 6 رجع null 
function validatePasswordmatch ($Password,$confirm_password) {
     return $Password===$confirm_password ?null :" Password and confirm Password dont match ";
}
function validateRegister($name,$email,$Password,$confirm_password){
    $filds=[
    "name"=>$name,
     "email"=>$email,
     "Password"=>$Password,
    "confirm_password"=> $confirm_password,
    ];
    foreach($filds as $input_name =>$value){
        if($error=validateRequired($input_name,$value)){
            return $error ;
        }
    }
   
    if($error=validateMinstring($name)){
            return $error ;
        }
         if($error=validateEmail($email)){
            return $error ;
        }
           if($error=validatePassword($Password)){
            return $error ;
        }
             if($error=validatePasswordmatch($Password,$confirm_password)){
            return $error ;
        }
}