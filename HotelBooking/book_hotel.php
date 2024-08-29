<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/hotelreserve.css">
    <script type="text/javascript" src="./js/auth.js"></script>
</head>
<body>

    <?php include ("./php/header.php"); ?>

    <?php
		$con = mysqli_connect("localhost", "root", "","hotel_booking_user");
		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$result = mysqli_query($con,"SELECT * FROM hotels");
        $filter = mysqli_query($con,"SELECT * FROM filter");
        $room =  mysqli_query($con,"SELECT * FROM rooms");
		$con->close();	
	?>

    <?php
		if (mysqli_num_rows($result)) {
	?>

    <div id="hotelresult">
        <?php
		    $i=0;
		    while($row = mysqli_fetch_array($result) ) {
                if( $row["id"] == $_SESSION['hotelid'] ){
	    ?>
        <div id="hotel">
            <div class="image">
                <?php $imageURL = './images/hotel/hotel/'.$row["mainphoto"]; ?>
                <img id="p_picture" src="<?php echo $imageURL; ?>" />
            </div>
            <div class="description">
                <b><?php echo $row["hname"]; ?></b>
                <h2 class="rating"><?php echo $row["review"]; echo " / 10"; ?></h2>
                <h2><?php echo $row["address"]; ?><?php echo ", " ?><?php echo $row["city"]; ?><?php echo ", " ?><?php echo $row["pcode"]; ?><?php echo ", " ?><?php echo $row["country"]; ?></h2>
                <h2><?php echo $row["city"]; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $row["pnumber"]; ?></h2>
                <h2><?php echo $row["class"]; echo " Star Hotel"; ?></h2>
            </div>
            <?php
	            while($frow = mysqli_fetch_array($filter)) {
                    if($row["id"] == $frow["hotelid"]){
                        $hotel_cancel = $frow["cancellation"];
	        ?>
            <div>
                <ul class="addinfo">
                    <?php 
                        if($frow["cancellation"] == 1){
                            echo '<li>Free Cancellation</li>';
                        }
                        if($frow["prepayment"] == 1){
                            echo'<li>No Prepayment</li>';
                        }
                        if($frow["creditcard"] == 1){
                            echo '<li>Pay Without Credit Card</li>';
                        }
                        if($frow["pool"] == 1){
                            echo '<li>Swimming Pool</li>';
                        }
                        if($frow["wifi"] == 1){
                            echo '<li>Free WiFi</li>';
                        }
                        if($frow["aircon"] == 1){
                            echo '<li>Air Conditioner</li>';
                        }
                        if($frow["spa"] == 1){
                            echo '<li>Spa and Wellness Center</li>';
                        }
                        if($frow["breakfast"] == 1){
                            echo '<li>Free Breakfast</li>';
                        }
                        if($frow["pet"] == 1){
                            echo '<li>Pet Friendly</li>';
                        }
                        if($frow["beach"] == 1){
                            echo '<li>Beach</li>';
                        }
                        if($frow["restaurant"] == 1){
                            echo '<li>Restaurant</li>';
                        }
                        if($frow["gym"] == 1){
                            echo '<li>Gym</li>';
                        }
                        if($frow["wheelchair"] == 1){
                            echo '<li>Wheelchair Accessible</li>';
                        }
                        if($frow["dfacilities"] == 1){
                            echo '<li>Facilities for Disabled Guest</li>';
                        } 
                    ?>
                </ul>
            </div>
            <div class="imagedisplay">
                <?php $imageURL = './images/hotel/hotel/'.$row["photo1"]; ?>
                <img id="picture" src="<?php echo $imageURL; ?>" />
                <?php $imageURL = './images/hotel/hotel/'.$row["photo2"]; ?>
                <img id="picture" src="<?php echo $imageURL; ?>" />
                <?php $imageURL = './images/hotel/hotel/'.$row["photo3"]; ?>
                <img id="picture" src="<?php echo $imageURL; ?>" />
                <?php $imageURL = './images/hotel/hotel/'.$row["photo4"]; ?>
                <img id="picture" src="<?php echo $imageURL; ?>" />
            </div>
            <?php
                        }
                    }
                }
	        ?>
        </div>
        <?php
	        $i++;
	        }
        ?>
    </div>

    <?php
	    } else {
            echo "No result found";
	    }
	?>

<div id="heroImage">
        <div class="heroText">
        </div>
        <div class="search">
            <form id="searchForm" method="put" onsubmit="searchSubmit2(event)">
                <div class="scontainer">
                    <?php 
                        $location = $_SESSION['location'];
                        echo '<input name="location" class ="text" type="hidden" placeholder="Location" value="'.$location.'">';
                    ?>
                </div>
                <div class="scontainer">
                    <label>Check In</label>
                    <?php 
                        if($_SESSION['checkin'] == ""){
                            echo '<input name="checkin" class ="date" type="date">';
                        }else{
                            $checkin = $_SESSION['checkin'];
                            echo '<input name="checkin" class ="date" type="date" value="'.$checkin.'">';
                        }
                    ?>
                </div>
                <div class="scontainer">
                    <label>Check Out</label>
                    <?php 
                        if($_SESSION['checkin'] == ""){
                            echo '<input name="checkout" class ="date" type="date">';
                        }else{
                            $checkout = $_SESSION['checkout'];
                            echo '<input name="checkout" class ="date" type="date" value="'.$checkout.'">';
                        }
                    ?>
                </div>
                <div class="scontainer">
                    <label>Adult</label>
                    <?php 
                        if($_SESSION['adult'] == ""){
                            echo '<input type="number" id="adult" name="adult" min="1" max="10" value="1">';
                        }else{
                            $adult = $_SESSION['adult'];
                            echo '<input type="number" id="adult" name="adult" min="1" max="10" value="'.$adult.'">';
                        }
                    ?>
                </div>
                <div class="scontainer">
                    <label>Children</label>
                    <?php 
                        if($_SESSION['children'] == ""){
                            echo '<input type="number" id="child" name="children" min="0" max="10" value="0">';
                        }else{
                            $children = $_SESSION['children'];
                            echo '<input type="number" id="child" name="children" min="0" max="10" value="'.$children.'">';
                        }
                    ?>
                </div>
                <div class="scontainer">
                    <button type="submit" id="searchHotel">Search</button>
                </div>
            </form>
        </div>
    </div>

    <?php
		if (mysqli_num_rows($room)) {
	?>

    <?php
		$i=0;
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
        }else{
            $user_id = 0;
        }
        $hotel_id = $_SESSION['hotelid'];

		while($r_row = mysqli_fetch_array($room)) {
            if($r_row["hotelid"] == $_SESSION['hotelid']){
                if($r_row["accomodation"] >= $_SESSION['adult'] and $r_row["child"] >= $_SESSION['children']){
                    $room_id = $r_row["id"];
                    $room_price = $r_row["price"];
	?>

    <div id="rooms">
        <div class="room_image">
            <?php $imageURL = './images/hotel/room/'.$r_row["rphoto"]; ?>
            <img id="r_picture" src="<?php echo $imageURL; ?>" />
        </div>
        <div class="room_description">
            <b><?php echo $r_row["name"]; ?></b>

            <input type="submit" name="reserve" class="btn" method="put" value="Reserve" onclick="reserveSubmit(<?php echo $user_id ?>, <?php echo $hotel_id ?>, <?php echo $room_id ?>, <?php echo $room_price ?>, <?php echo $hotel_cancel ?>)">

            <h2><?php echo "Accomodates up to "; echo $r_row["accomodation"]; echo " Adult and "; ?><?php echo $r_row["child"]; echo " Child"; ?></h2>
            <h2><?php echo $r_row["nbed"]; ?>&nbsp;<?php echo $r_row["tbed"]; ?></h2>
            <h2 style="float:right; padding-top: 40px; font-size: 17px; padding-right: 150px;"><?php echo "PHP "; echo $r_row["price"]; ?> /day</h2><br>
        </div>
        <div class="roominformation">
            <ul class="room_info">
                <?php 
                    if($r_row["bathroom"] == 1){
                        echo '<li>Bathroom</li>';
                    }
                    if($r_row["kitchen"] == 1){
                        echo '<li>Kitchen</li>';
                    }
                    if($r_row["balcony"] == 1){
                        echo '<li>Balcony</li>';
                    }
                    if($r_row["view"] == 1){
                        echo '<li>Sea View</li>';
                    }else if($r_row["view"] == 2){
                        echo '<li>City View</li>';
                    }else if($r_row["view"] == 3){
                        echo '<li>Mountain View</li>';
                    }else if($r_row["view"] == 4){
                        echo '<li>Pool View</li>';
                    }else if($r_row["view"] == 5){
                        echo '<li>Landmark View</li>';
                    }else if($r_row["view"] == 6){
                        echo '<li>Garden View</li>';
                    }
                    if($r_row["service"] == 1){
                        echo '<li>Room Service</li>';
                    }
                    if($r_row["sound"] == 1){
                        echo '<li>Sound Proof</li>';
                    }
                ?>
            </ul>
        </div>
    </div>
    
    <?php   
                    $i++;
                }
            }
		}
        if($i == 0){
            echo '<center style="padding-top: 50px; padding-bottom: 157px; border-top: 1px solid; border-bottom: 1px solid;"><p>No Available Rooms.</p></center>';
        }
	?>

    <?php
	    } else {
            echo "No result found";
	    }
	?>

    <?php include ("./php/footer.php"); ?>

</body>
</html>