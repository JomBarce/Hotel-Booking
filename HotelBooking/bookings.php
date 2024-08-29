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
    <link rel="stylesheet" type="text/css" href="./css/bookings.css">
    <script type="text/javascript" src="./js/auth.js"></script>
</head>
<body>

    <?php include ("./php/header.php"); ?>


    <div class="section_title">
		<div class="section_content">
			<h2>Bookings</h2>	
		</div>
	</div>

    <?php
		$con = mysqli_connect("localhost", "root", "","hotel_booking_user");
		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$result = mysqli_query($con,"SELECT * FROM hotels");
        $filter = mysqli_query($con,"SELECT * FROM filter");
        $room =  mysqli_query($con,"SELECT * FROM rooms");

        if(isset( $_SESSION['user_id'])){
            $booked = mysqli_query($con,"SELECT * FROM userbookings ");
            $count = mysqli_num_rows ( $booked );
        }else{
            $booked = mysqli_query($con,"SELECT * FROM userbookings WHERE userid=0");
    ?>
         
         <script type="text/javascript">
            Swal.fire({
                title: 'Sign In',
                text: "Sign in to Reserve or Book a Hotel",
                imageUrl: './images/icons/profile.png',
                imageWidth: 250,
                imageHeight: 250,
                showCancelButton: true,
                confirmButtonColor: '#3C64B1',
                confirmButtonText: 'Sign In',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace('./signin.php');
                }else{
                    window.location.replace('./index.php');
                }
            });
        </script>

    <?php
        }
	?>
    
    <main id="booked">
    <table>

    <?php
        $i=0;
		if (mysqli_num_rows($booked)) {
            while($b_row = mysqli_fetch_array($booked)){
                if($b_row["userid"] == $_SESSION['user_id']){
                    $result = mysqli_query($con,"SELECT * FROM hotels");
                    $filter = mysqli_query($con,"SELECT * FROM filter");
                    $room =  mysqli_query($con,"SELECT * FROM rooms");
	?>
        <div id="hotelresult">
                   
            <?php
                while ($row = mysqli_fetch_array($result)) {
                    if($b_row["hotelid"] == $row["id"]){
            ?>

    <th colspan="2">
            <div id="bookhead">
                <?php
                    $checkinformat = date("F d, Y", strtotime($b_row["checkin"]));
                    $checkoutformat = date("F d, Y", strtotime($b_row["checkout"]));
                    $formatdays = strtotime($b_row["checkout"]) - strtotime($b_row["checkin"]);
                    $total = (date('d', $formatdays)-1) * $b_row["price"];
                ?>
                <img src="./images/icons/calendar2.png" height="30px" width="30px" alt="calendar" style="vertical-align: middle;">
                <h3 style="padding-right: 500px; padding-left: 20px;"><?php echo $checkinformat; echo " - "; echo $checkoutformat;?></h3>
                <h3 class="price"><?php echo "PHP "; echo $total; ?></h3><label for="cancel"></label>
                
                <?php
                    if($b_row["cancel"] == 1){
                        echo "<input type='submit' name='cancel' value='Cancel' onclick='cancelHotel(".$b_row["id"].")'>";
                    }
                ?>
            </div>
    </th>
    <tr>
    <td id="hotel">
            <div>
                <div class="image">
                    <?php $imageURL = './images/hotel/hotel/'.$row["mainphoto"]; ?>
                    <img id="p_picture" src="<?php echo $imageURL; ?>" />
                </div>
                <div class="description">
                    <b><?php echo $row["hname"]; ?></b>
                    <h2><?php echo $row["address"]; ?><?php echo ", " ?><?php echo $row["city"]; ?><?php echo ", " ?><?php echo $row["pcode"]; ?><?php echo ", " ?><?php echo $row["country"]; ?></h2>
                    <h2><?php echo $row["city"]; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $row["pnumber"]; ?></h2>
                    <h2><?php echo $row["class"]; echo " Star Hotel"; ?></h2><br>
                </div>

                <?php
                    while ($frow = mysqli_fetch_array($filter)) {
                        if($row["id"] == $frow["hotelid"]){
                ?>

            <div class="addformation">
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
                        }
                    }   
                }
            ?>

        </div>
    </td>  
        <?php
            while ($r_row = mysqli_fetch_array($room)) {
                if($r_row["hotelid"] == $b_row["hotelid"]){
                    if($r_row["id"] == $b_row["roomid"]){
        ?>
    <td id="rooms">
        <div>
            <div class="room_image">
                <?php $imageURL = './images/hotel/room/'.$r_row["rphoto"]; ?>
                <img id="r_picture" src="<?php echo $imageURL; ?>" />
            </div>
            <div class="room_description">
                <b><?php echo $r_row["name"]; ?></b>
                <h2><?php echo "Accomodates up to "; echo $r_row["accomodation"]; echo " Adult and "; ?><?php echo $r_row["child"]; echo " Child"; ?></h2>
                <h2><?php echo $r_row["nbed"]; ?>&nbsp;<?php echo $r_row["tbed"]; ?></h2>
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
    </td>
    </tr>
        <?php   
                                }
                            }
                        }
                        $i++;
                    }
                }
                if($i == 0){
                    echo '<center style="padding-top: 150px; padding-bottom: 450px;"><p>No Booked Hotels. To book a hotel <a href="search_hotel.php" style="color: #0085FF ;">click here</a>.</p></center>';
                }
            }else{
                echo '<center style="padding-top: 150px; padding-bottom: 450px;"><p>No Booked Hotels. To book a hotel <a href="search_hotel.php" style="color: #0085FF ;">click here</a>.</p></center>';
            }
            $con->close();	
        ?>
    </table>
    </main>
    <?php include ("./php/footer.php"); ?>

</body>
</html>
