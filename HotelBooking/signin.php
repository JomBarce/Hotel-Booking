<?php
    if(isset($_SESSION["user_email"])){
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/signin.css">
    <script type="text/javascript" src="./js/auth.js"></script>
</head>
<body>

    <?php include ("./php/header.php"); ?>

    <div class="signup-form">
        <form id="signinForm" method="get" onsubmit="signinSubmit(event)">
            <img src="./images/hotelLogo.png" alt="hotelLogo.png">
            <h1 class="name">HOTEL BOOKING</h1>
            <br>
            <div class="form-group">
                <h2>Sign In</h2>
            </div>
            <div class="form-group">
                <p>Email Address</p>
                <input type="email" class="form-control" name="email" id="email" required="required">
            </div>
            <div class="form-group">
                <p>Password</p>
                <input type="password" class="form-control" name="password" id="password" required="required">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="btnsignin" class="btn btn-primary btn-lg" value="Sign In"/>
            </div>
            <div class="form-group">
                </p><div class="hint-text">Don't have an account? <a href="signup.php">Sign Up</a></div>
            </div>
        </form>
    </div>

    <?php include ("./php/footer.php"); ?>

</body>
</html>