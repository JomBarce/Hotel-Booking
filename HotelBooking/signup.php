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
        <form id="signupForm" method="post" onsubmit="signupSubmit(event)">
            <h1 class="create">Create an account</h1>
            <div class="form-group">
                <p>First Name</p>
                <input type="text" class="form-control" name="first_name" id="first_name" required="required">
            </div>
            <div class="form-group">
                <p>Last Name</p>
                 <input type="text" class="form-control" name="last_name" id="last_name" required="required">
            </div>
            <div class="form-group">
                <p>Email Address</p>
                <input type="email" class="form-control" name="email" id="email" required="required">
            </div>
            <div class="form-group">
                <p>Password</p>
                <input type="password" class="form-control" name="password" id="password" required="required">
            </div>
            <div class="form-group">
                <p>Confirm Password</p>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" required="required">
            </div>
            <div class="form-group">
                <div class="hint-text">By signing up you accept the <a target="_blank" href="policy.php">Terms and Conditions</a> and <a target="_blank" href="policy.php#privacypolicy">Privacy Policy</a></div>
            </div>      
            <br>   
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" name="btnsignup" id="btnsignup" value="Sign Up"/>
            </div>
        </form>
    </div>

    <?php include ("./php/footer.php"); ?>

</body>
</html>