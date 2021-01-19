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
            <h4>My Contact</h4>
            <ul class="list-group mt-3">
            <?php
            $conversations = $database->query("Select * from conversation where (user_id = $user_id OR recipient_id=$user_id)");
            if($conversations->num_rows > 0) {
                while ($messages = $conversations->fetch_assoc()) {
                    if ($user_id != $messages['user_id']) {
                        $user = getUser($messages['user_id'], $database);
                    } else {
                        $user = getUser($messages['recipient_id'], $database);
                    }
                    ?>
                    <li class="list-group-item"><?php echo $user['fullname'] ?></li>
                    <?php
                }
            }
            ?>
            </ul>
        </div>
    </div>
</div>
</div>


</body>
</html>
