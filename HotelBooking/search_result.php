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
    <link rel="stylesheet" type="text/css" href="./css/searchresult.css">
    <script type="text/javascript" src="./js/auth.js"></script>
    <script type="text/javascript">
        window.addEventListener( "pageshow", function ( event ) {
            var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && 
                              window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                window.location.reload();
            }
        });
    </script>
</head>
<body>

    <?php include ("./php/header.php"); ?>
<main>
    <?php
		$con = mysqli_connect("localhost", "root", "","hotel_booking_user");
		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$result = mysqli_query($con,"SELECT * FROM hotels");
        $filter = mysqli_query($con,"SELECT * FROM filter");
		$con->close();	
	?>

    <?php
		if (mysqli_num_rows($result)) {
	?>

    <div id="heroImage">
        <div class="heroText">
        </div>
        <form id="searchForm" method="put" onsubmit="searchSubmit(event)">
            <div class="search">
                <div class="scontainer">
                    <?php 
                        if(isset($_SESSION['location'])){
                            $location = $_SESSION['location'];
                            echo '<input name="location" class ="text" type="text" placeholder="Location" value="'.$location.'">';
                        }else{
                            echo '<input name="location" class ="text" type="text" placeholder="Location">';
                        }
                    ?>
                </div>
                <div class="scontainer">
                    <label>Check In</label>
                    <?php 
                        if(isset($_SESSION['checkin'])){
                            $checkin = $_SESSION['checkin'];
                            echo '<input name="checkin" class ="date" type="date" value="'.$checkin.'">';
                        }else{
                            echo '<input name="checkin" class ="date" type="date">';
                        }
                    ?>
                </div>
                <div class="scontainer">
                    <label>Check Out</label>
                    <?php 
                        if(isset($_SESSION['checkin'])){
                            $checkout = $_SESSION['checkout'];
                            echo '<input name="checkout" class ="date" type="date" value="'.$checkout.'">';
                        }else{
                            echo '<input name="checkout" class ="date" type="date">';
                        }
                    ?>
                </div>
                <div class="scontainer">
                    <label>Adult</label>
                    <?php 
                        if(isset($_SESSION['adult'])){
                            $adult = $_SESSION['adult'];
                            echo '<input type="number" id="adult" name="adult" min="1" max="10" value="'.$adult.'">';
                        }else{
                            echo '<input type="number" id="adult" name="adult" min="1" max="10" value="1">';
                        }
                    ?>
                </div>
                <div class="scontainer">
                    <label>Children</label>
                    <?php 
                        if(isset($_SESSION['children'])){
                            $children = $_SESSION['children'];
                            echo '<input type="number" id="child" name="children" min="0" max="10" value="'.$children.'">';
                        }else{
                            echo '<input type="number" id="child" name="children" min="0" max="10" value="0">';
                        }
                    ?>
                </div>
                <div class="scontainer">
                    <button type="submit" id="searchHotel">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div id="left">
        <form id="filterForm" method="put" onsubmit="filterSubmit(event)">
            <div class="filters">
                <label class="label" for="filtersubmit">Filter</label>
                <input type="submit" name="filtersubmit" value="Apply" class="btn">
            </div>
            <hr><br>
            <div class="filters">
                <div class="dropdown">
                    <div>
                        <label class="droplabel">Price</label>
                        <?php 
                            if(isset($_SESSION['price'])){
                                $price = $_SESSION['price'];
                                echo '<input type="number" id="price" class="price" name="price" min="500" max="20000" value="'.$price.'" step="500">';
                            }else{
                                echo '<input type="number" id="price" class="price" name="price" min="500" max="20000" value="1000" step="500">';
                            }
                        ?>
                    </div><br><br>
                    
                    <div>
                        <label class="droplabel">Ratings</label>
                        <?php 
                            if(isset($_SESSION['ratings'])){
                                $ratings = $_SESSION['ratings'];
                                echo '<input type="number" id="ratings" class="rating" name="ratings" min="1" max="10" value="'.$ratings.'">';
                            }else{
                                echo '<input type="number" id="ratings" class="rating" name="ratings" min="1" max="10" value="1">';
                            }
                        ?>
                    </div><br><br>

                    <div>
                        <label class="droplabel">Hotel Class</label>
                        <?php 
                            if(isset($_SESSION['star'])){
                                $star = $_SESSION['star'];
                                echo '<input type="number" id="star" class="selection" name="star" min="1" max="5" value="'.$star.'">';
                            }else{
                                echo '<input type="number" id="star" class="selection" name="star" min="1" max="5" value="1">';
                            }
                        ?>
                    </div>

                </div>
                <div class="checkbox">
					<div>
                    <label>Free Cancellation</label>
                    <?php 
                        if(isset($_SESSION['cancel'])){
                            if($_SESSION['cancel'] != ""){
                                echo '<span><input type="checkbox" id="cancel" name="cancel" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="cancel" name="cancel" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="cancel" name="cancel" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>No prepayment</label>
                    <?php 
                        if(isset($_SESSION['prepayment'])){
                            if($_SESSION['prepayment'] != ""){
                                echo '<span><input type="checkbox" id="prepayment" name="prepayment" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="prepayment" name="prepayment" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="prepayment" name="prepayment" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Book Without Credit Card</label>
                    <?php 
                        if(isset($_SESSION['creditcard'])){
                            if($_SESSION['creditcard'] != ""){
                                echo '<span><input type="checkbox" id="creditcard" name="creditcard" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="creditcard" name="creditcard" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="creditcard" name="creditcard" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Swimming Pool</label>
                    <?php 
                        if(isset($_SESSION['pool'])){
                            if($_SESSION['pool'] != ""){
                                echo '<span><input type="checkbox" id="pool" name="pool" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="pool" name="pool" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="pool" name="pool" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Free WiFi</label>
                    <?php 
                        if(isset($_SESSION['wifi'])){
                            if($_SESSION['wifi'] != ""){
                                echo '<span><input type="checkbox" id="wifi" name="wifi" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="wifi" name="wifi" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="wifi" name="wifi" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Air Conditioning</label>
                    <?php 
                        if(isset($_SESSION['aircon'])){
                            if($_SESSION['aircon'] != ""){
                                echo '<span><input type="checkbox" id="aircon" name="aircon" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="aircon" name="aircon" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="aircon" name="aircon" value="1"></span>';
                        }
                    ?>
                    </div>

					<div>
                    <label>Spa and Wellness Center</label>
                    <?php 
                        if(isset($_SESSION['spa'])){
                            if($_SESSION['spa'] != ""){
                                echo '<span><input type="checkbox" id="spa" name="spa" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="spa" name="spa" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="spa" name="spa" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Free Breakfast</label>
                    <?php 
                        if(isset($_SESSION['breakfast'])){
                            if($_SESSION['breakfast'] != ""){
                                echo '<span><input type="checkbox" id="breakfast" name="breakfast" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="breakfast" name="breakfast" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="breakfast" name="breakfast" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Pet Friendly</label>
                    <?php 
                        if(isset($_SESSION['pet'])){
                            if($_SESSION['pet'] != ""){
                                echo '<span><input type="checkbox" id="pet" name="pet" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="pet" name="pet" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="pet" name="pet" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Beach</label>
                    <?php 
                        if(isset($_SESSION['beach'])){
                            if($_SESSION['beach'] != ""){
                                echo '<span><input type="checkbox" id="beach" name="beach" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="beach" name="beach" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="beach" name="beach" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Restaurant</label>
                    <?php 
                        if(isset($_SESSION['restaurant'])){
                            if($_SESSION['restaurant'] != ""){
                                echo '<span><input type="checkbox" id="restaurant" name="restaurant" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="restaurant" name="restaurant" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="restaurant" name="restaurant" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Gym</label>
                    <?php 
                        if(isset($_SESSION['gym'])){
                            if($_SESSION['gym'] != ""){
                                echo '<span><input type="checkbox" id="gym" name="gym" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="gym" name="gym" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="gym" name="gym" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Wheelchair Accessible</label>
                    <?php 
                        if(isset($_SESSION['wheelchair'])){
                            if($_SESSION['wheelchair'] != ""){
                                echo '<span><input type="checkbox" id="wheelchair" name="wheelchair" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="wheelchair" name="wheelchair" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="wheelchair" name="wheelchair" value="1"></span>';
                        }
                    ?>
					</div>

					<div>
                    <label>Facilitites for Disabled Guest</label>
                    <?php 
                        if(isset($_SESSION['dfacilities'])){
                            if($_SESSION['dfacilities'] != ""){
                                echo '<span><input type="checkbox" id="dfacilities" name="dfacilities" value="1" checked></span>';
                            }else{
                                echo '<span><input type="checkbox" id="dfacilities" name="dfacilities" value="1"></span>';
                            }
                        }else{
                            echo '<span><input type="checkbox" id="dfacilities" name="dfacilities" value="1"></span>';
                        }
                    ?>
					</div>

                </div>
            </div>
        </form>
    </div>

    <div id="right">
    <?php
		$i = 0;
        $locate = "";
        if(isset($_SESSION['location'])){
            $locate = $_SESSION['location'];
            $locate = strtoupper($locate);
        }
        
		while($row = mysqli_fetch_array($result) and $frow = mysqli_fetch_array($filter) and $i < 3) {

            $hotelname = $row["hname"];
            $hotelname = strtoupper($hotelname  );
            $country = $row["country"];
            $country = strtoupper($country);
            $city = $row["city"];
            $city = strtoupper($city);
            $address = $row["address"];
            $address = strtoupper($address);
            $pcode = $row["pcode"];
            $fulladdress = $address;
            $fulladdress .= ", ";
            $fulladdress .= $city;
            $fulladdress .= ", ";
            $fulladdress .= $pcode;
            $fulladdress .= ", ";
            $fulladdress .= $country;

            $hotelprice = $row["price"];
            $hotelrating = $row["review"];
            $hotelclass = $row["class"];
            $freecancel = $frow["cancellation"];
            $noprepay = $frow["prepayment"];
            $nocreditcard = $frow["creditcard"];
            $swimpool = $frow["pool"];
            $freewifi= $frow["wifi"];
            $aircondition = $frow["aircon"];
            $spacenter = $frow["spa"];
            $freebreakfast = $frow["breakfast"];
            $petfriendly = $frow["pet"];
            $hotelbeach = $frow["beach"];
            $hotelresto = $frow["restaurant"];
            $hotelgym = $frow["gym"];
            $wheelaccess = $frow["wheelchair"];
            $disfacility = $frow["dfacilities"];
            
            if(isset($_SESSION['price']) == FALSE){
                $price = $hotelprice;
            }
            if(isset($_SESSION['ratings']) == FALSE){
                $ratings = $hotelrating;
            }
            if(isset($_SESSION['star']) == FALSE){
                $star = $hotelclass;
            }
            if(isset($_SESSION['cancel'])){
                if($_SESSION['cancel'] != ""){
                    $cancel = $_SESSION['cancel'];
                }else{
                    $cancel = $freecancel;
                }
            }else{
                $cancel = $freecancel;
            }
            if(isset($_SESSION['prepayment'])){
                if($_SESSION['prepayment'] != ""){
                    $prepayment = $_SESSION['prepayment'];
                }else{
                    $prepayment = $noprepay;
                }
            }else{
                $prepayment = $noprepay;
            }
            if(isset($_SESSION['creditcard'])){
                if($_SESSION['creditcard'] != ""){
                    $creditcard = $_SESSION['creditcard'];
                }else{
                    $creditcard = $nocreditcard;
                }
            }else{
                $creditcard = $nocreditcard;
            }
            if(isset($_SESSION['pool'])){
                if($_SESSION['pool'] != ""){
                    $pool = $_SESSION['pool'];
                }else{
                    $pool = $swimpool;
                }
            }else{
                $pool = $swimpool;
            }
            if(isset($_SESSION['wifi'])){
                if($_SESSION['wifi'] != ""){
                    $wifi = $_SESSION['wifi'];
                }else{
                    $wifi = $freewifi;
                }
            }else{
                $wifi = $freewifi;
            }
            if(isset($_SESSION['aircon'])){
                if($_SESSION['aircon'] != ""){
                    $aircon = $_SESSION['aircon'];
                }else{
                    $aircon = $aircondition;
                }
            }else{
                $aircon = $aircondition;
            }
            if(isset($_SESSION['spa'])){
                if($_SESSION['spa'] != ""){
                    $spa = $_SESSION['spa'];
                }else{
                    $spa = $spacenter;
                }
            }else{
                $spa = $spacenter;
            }
            if(isset($_SESSION['breakfast'])){
                if($_SESSION['breakfast'] != ""){
                    $breakfast = $_SESSION['breakfast'];
                }else{
                    $breakfast = $freebreakfast;
                }
            }else{
                $breakfast = $freebreakfast;
            }
            if(isset($_SESSION['pet'])){
                if($_SESSION['pet'] != ""){
                    $pet = $_SESSION['pet'];
                }else{
                    $pet = $petfriendly;
                }
            }else{
                $pet = $petfriendly;
            }
            if(isset($_SESSION['beach'])){
                if($_SESSION['beach'] != ""){
                    $beach = $_SESSION['beach'];
                }else{
                    $beach = $hotelbeach;
                }
            }else{
                $beach = $hotelbeach;
            }
            if(isset($_SESSION['restaurant'])){
                if($_SESSION['restaurant'] != ""){
                    $restaurant = $_SESSION['restaurant'];
                }else{
                    $restaurant = $hotelresto;
                }
            }else{
                $restaurant = $hotelresto;
            }
            if(isset($_SESSION['gym'])){
                if($_SESSION['gym'] != ""){
                    $gym = $_SESSION['gym'];
                }else{
                    $gym = $hotelgym;
                }
            }else{
                $gym = $hotelgym;
            }
            if(isset($_SESSION['wheelchair'])){
                if($_SESSION['wheelchair'] != ""){
                    $wheelchair = $_SESSION['wheelchair'];
                }else{
                    $wheelchair = $wheelaccess;
                }
            }else{
                $wheelchair = $wheelaccess;
            }
            if(isset($_SESSION['dfacilities'])){
                if($_SESSION['dfacilities'] != ""){
                    $dfacilities = $_SESSION['dfacilities'];
                }else{
                    $dfacilities = $disfacility;
                }
            }else{
                $dfacilities = $disfacility;
            }


            if($locate == $country or $locate == $city or $locate == $address or $locate == $pcode or $locate == $fulladdress or $locate == $hotelname){
                if($hotelprice <= $price and $hotelrating >= $ratings  and $hotelclass == $star){
                    if($freecancel == $cancel and $noprepay == $prepayment and $nocreditcard == $creditcard and $swimpool == $pool and $freewifi == $wifi and $aircondition == $aircon and $spacenter == $spa){
                        if($freebreakfast = $breakfast and $petfriendly == $pet and $hotelbeach == $beach and $hotelresto == $restaurant and $hotelgym == $gym and $wheelaccess == $wheelchair and $disfacility == $dfacilities){
                            if($_SESSION['checkin']!= "" and $_SESSION['checkout'] != "" and isset($_SESSION['checkout'])){
                                $hotelid = $row["id"];
                            }else{
                                $hotelid = 0;
                            }
	?>


        <a id="hotelSubmit" class="hotelclick" method="put" onclick="hotelSubmit(<?php echo $hotelid ?>)">
            <div id="hotel">
                <div class="image">
                    <?php $imageURL = './images/hotel/hotel/'.$row["mainphoto"]; ?>
                    <img id="p_picture" src="<?php echo $imageURL; ?>" />
                </div>
                <div class="description">
                    <b><?php echo $row["hname"]; ?></b>
                    <h2 class="rating" style="float:right; background-color: #78C2E1; padding: 10px 20px; color: white;"><?php echo $row["review"]; echo " / 10"; ?></h2>
                    <h2><?php echo $row["address"]; ?><?php echo ", " ?><?php echo $row["city"]; ?><?php echo ", " ?><?php echo $row["pcode"]; ?><?php echo ", " ?><?php echo $row["country"]; ?></h2>
                    <h2><?php echo $row["city"]; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $row["pnumber"]; ?></h2>
                    <h2><?php echo $row["class"]; echo " Star Hotel"; ?></h2>
                    <h2 style="float:right; padding-top: 50px; font-size: 17px;"><?php echo "PHP "; echo $row["price"]; ?></h2><br>
                </div>
                <?php
		            if($row["id"] == $frow["hotelid"]) {
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
                <?php
                    }
	            ?>
            </div>
        </a>
    <?php
                        $i++;
                        }
                    }
                }
            }
		}
	?>
    </div>

    <?php
	    } else {
            echo "No result found";
	    }
	?>
</main>

    <?php include ("./php/footer.php"); ?>
    
</body>
</html>
