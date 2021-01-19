<?php
require "require/checklogin.php";
?>
<?php
if(isset($_POST['updateprofile'])){
require "require/Validation.php";
$errors = [];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];


Validation::valid_email($email,"email",$errors);
Validation::required($username,"username",$errors);
Validation::length_between($username,4,30,"username",$errors);
Validation::required($fullname,"fullname",$errors);

if(count($errors) == 0){
    //no validation error occurred
    $user_id = $user_info['SN'];
    $update = $database->query("UPDATE users SET username='$username',fullname='$fullname',email='$email' where SN=$user_id");

    $user_info = getUser($user_id,$database);
}


}
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
                <form action="" method="post">
                    <?php
                    if(isset($update)) {
                        ?>
                        <div class="alert alert-success">
                                Your Profile has been updated successfully
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" value="<?php echo $user_info['fullname'] ?>" class="form-control" name="fullname" placeholder="Fullname"/>
                        <?php
                        if(isset($errors['fullname'])) {
                            ?>
                            <span class="d-block" style="color:red;font-size: 10px;"><?php echo $errors['fullname'];  ?></span>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" value="<?php echo $user_info['username'] ?>" class="form-control" name="username" placeholder="Username"/>
                        <?php
                        if(isset($errors['username'])) {
                            ?>
                            <span class="d-block" style="color:red;font-size: 10px;"><?php echo $errors['username'];  ?></span>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" value="<?php echo $user_info['email'] ?>" name="email" placeholder="Email Address"/>
                        <?php
                        if(isset($errors['email'])) {
                            ?>
                            <span class="d-block" style="color:red;font-size: 10px;"><?php echo $errors['email'];  ?></span>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col-12 mt-5">
                        <center><button type="submit" name="updateprofile" value="Update profile" class="btn btn-sm btn-primary">Update Profile</button></center>
                    </div>
                </form>
        </div>
    </div>
</div>
</body>
</html>
