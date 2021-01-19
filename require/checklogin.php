<?php
session_start();
require "DB.php";

if(!isset($_SESSION['is_login'])){
    //means the user has not logged in or user's session has expired
    header('location:index.php?message=Login to continue');
}

$user_info = [];

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    //query database to get user's information
    $user = $database->query("select * from users where SN=$user_id");
    if($user->num_rows === 1){
        $user_info = $user->fetch_assoc();
    }
}


function getUser($user_id,$database){

    $user = $database->query("select * from users where SN=$user_id");

    return $user->fetch_assoc();
}