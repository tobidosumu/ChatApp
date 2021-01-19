<?php
session_start();
if(isset($_POST['email_address'])) {
    require 'require/DB.php';

    $database = new DB('localhost', 'root', '', 'sample_app');

    $email = $_POST['email_address'];
    $password = $_POST['password'];

    $user = $database->query("select * from users where email='$email'");

    if ($user->num_rows === 0) {
        header('location:index.php?message=Invalid Email and Password Combination');
    } else if ($user->num_rows === 1) {
        $user_info = $user->fetch_assoc();

        //compare password with the password the user typed
        if(password_verify($password,$user_info['password']) == true){
            //password is okay
            $_SESSION['email'] = $user_info['email'];
            $_SESSION['user_id'] = $user_info['SN'];
            $_SESSION['is_login'] = true;
            header("location:homepage.php");
        }else{
            //password is not okay
            //send user back to login page
            header('location:index.php?message=Invalid Password');
        }


    } else {
        header('location:index.php?message=Unknown error occurred, Please try again!..');
    }
}else{
    header('location:index.php?message=Login to continue!..');
}

