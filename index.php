
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sample App | Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<form class="form-signin" method="post" action="loginprocess.php">


    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <?php
    if(isset($_GET['message'])) {
        ?>
        <span style="color:red; font-size: 14px" class="d-block"><?php echo $_GET['message']; ?></span>
        <?php
    }
    ?>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" name="email_address" id="inputEmail" class="form-control" placeholder="Email address"  autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a href="register.php" class="mt-2 d-block">Register here</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
