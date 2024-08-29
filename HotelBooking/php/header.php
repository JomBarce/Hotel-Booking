<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="./css/header.css">
    <script type="text/javascript" src="./js/auth.js"></script>
</head>
<body>

    <div id="header">
        <div class="hcontainer">
            <div class="logo">
                <a href="index.php"><img src="./images/hotelLogo.png" alt="hotelLogo.png" style="margin-right:10px;"><h1>HOTEL BOOKING</h1></a>
            </div>
        </div>
        <div class="hcontainer">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="search_hotel.php">Hotels</a></li>
                <li><a href="bookings.php">Bookings</a></li>
                <li><a href="contact.php">Help</a></li>
            </ul>
        </div>
        <div class="hcontainer">
            <?php 
                 if(isset($_SESSION["user_email"])){
                    $name = $_SESSION["user_email"];
                    echo '<a href="profile_update.php"><button type="button" id="signInHeader">'.$name.'</button></a>';
                    echo '<a><button onclick="signoutClick(event)" id="signUpHeader">Sign Out</button></a>';
                }else{
                     echo '<a href="./signin.php"><button type="button" id="signInHeader">Sign In</button></a>';
                     echo '<a href="./signup.php"><button type="button" id="signUpHeader">Sign Up</button></a>';
                }
            ?>
        </div>
		<div id="navIcon" onclick="changeIcon(this)">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
		</div>
    </div>
	<div id="navMenu">
		<?php 
			if(isset($_SESSION["user_email"])){
				$name = $_SESSION["user_email"];
				echo '<a href="profile_update.php" id="signInHeader">'.$name.'</a>';
				echo '<a onclick="signoutClick(event)" id="signUpHeader">Sign Out</a>';
			}else{
					echo '<a href="./signin.php" id="signInHeader">Sign In</a>';
					echo '<a href="./signup.php" id="signUpHeader">Sign Up</a>';
			}
		?>
		<a href="index.php">Home</a>
		<a href="search_hotel.php">Hotels</a>
		<a href="bookings.php">Bookings</a>
		<a href="contact.php">Help</a>
	</div>

	<script>
		$(document).ready(function(){
			$("#navIcon").click(function(){
					$("#navMenu").slideToggle();
			});
		});
	</script>
	
</body>
</html>