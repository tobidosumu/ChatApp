<?php
session_start();
require "require/Validation.php";

if(isset($_POST['submit_data'])){

    //check if the is valid
    $email = $_POST['email'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    $errors = [];


    Validation::valid_email($email,"email",$errors);
    Validation::required($username,"username",$errors);
    Validation::length_between($username,6,30,"username",$errors);
    Validation::required($fullname,"fullname",$errors);
    Validation::required($password,"password",$errors);
    Validation::length_between($password,6,32,"password",$errors);


    if(count($errors) > 0){
        // we have an error
        $_SESSION['errors'] = $errors;
        $_SESSION['formdata'] = $_POST;
        header('location:register.php');
    }else{
        //save data inside database
        require 'require/DB.php';

        $password = password_hash($password,PASSWORD_DEFAULT);

        $query_string = "INSERT INTO users set `username`='$username',`fullname`='$fullname',`email`='$email',`password`='$password'";

        $query = $database->query($query_string);

        if($query){ // $query == true
            //registration was successfull
            //header the user to registration successfull page
            header('location:registration_success.php');
        }else{
            $_SESSION['errors'] = $errors;
            $_SESSION['formdata'] = $_POST;
            header('location:register.php?message=Unknown error, please try again..');
        }

    }

}else{
    header('location:register.php?message=Please complete the registration to continue');
}


/*
 *
 *
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Please enter a valid email address";
    }
    // this check for valid email address

    if(empty($username)){
        $errors['username'] = "Please input your username";
    }
    // this check for if the username is blank

    if(!(strlen($username) > 4  && strlen($username) < 30)){
        $errors['username'] = "username must be between 4 and 30 characters length";
    }

    if(empty($fullname)){
        $errors['fullname'] = "Fullname is required!.";
    }

    if(empty($password)){
        $errors['password'] = "Please input your password";
    }

    if(!(strlen($password) > 6  && strlen($password) < 36)){
        $errors['password'] = "password must be between 6 and 36 characters length";
    }
 *
 *
 */

?>