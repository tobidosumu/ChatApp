<?php
require "require/checklogin.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Account</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include "include/header.php";
?>
<div class="container-fluid">
    <div class="row">
        <?php
        include "include/sidebar.php";
        ?>
        <div class="col-sm-12 col-lg-9 mt-3">
            <h4>Edit Profile</h4>
            <div class="row">
                <div class="col-sm-4">
                    <div class="row mt-3">
                        <div class="col-6 mt-2">Fullname :</div> <div class="col-6 mt-2"><?php  echo $user_info['fullname']  ?></div>
                        <div class="col-6 mt-2">Email Address :</div> <div class="col-6 mt-2"><?php  echo $user_info['email']  ?></div>
                        <div class="col-6 mt-2"">Username :</div> <div class="col-6 mt-2"><?php  echo $user_info['username']  ?></div>
                        <div class="col-12 mt-5">
                            <center><a href="editprofile.php" class="btn btn-sm btn-primary">Edit Profile</a></center>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


</body>
</html>
