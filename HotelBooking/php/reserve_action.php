<?php 
    include_once("db_connect.php");
    $retVal = "";
    $isValid = true;
    $status = 400;
    $data = [];

    $user_id = trim($_POST['userid']);
    $hotel_id = trim($_POST['hotelid']);
    $room_id = trim($_POST['roomid']);
    $check_in = $_SESSION['checkin'];
    $check_out = $_SESSION['checkout'];
    $price = trim($_POST['price']);
    $cancel = trim($_POST['cancel']);
    
    if($isValid){
        $sql = "INSERT INTO userbookings (userid, hotelid, roomid, checkin, checkout, price, cancel) VALUES ('$user_id', '$hotel_id', '$room_id', '$check_in', '$check_out', '$price', '$cancel')";
        mysqli_query($con, $sql);

        unset($_SESSION['hotelid']);
        unset($_SESSION['hotel']);
        unset($_SESSION['location']);
        unset($_SESSION['checkin']);
        unset($_SESSION['checkout']);
        unset($_SESSION['adult']);
        unset($_SESSION['children']);
        unset($_SESSION['price']);
        unset($_SESSION['ratings']);
        unset($_SESSION['star']);
        unset($_SESSION['cancel']);
        unset($_SESSION['prepayment']);
        unset($_SESSION['creditcard']);
        unset($_SESSION['pool']);
        unset($_SESSION['wifi']);
        unset($_SESSION['aircon']);
        unset($_SESSION['spa']);
        unset($_SESSION['breakfast']);
        unset($_SESSION['pet']);
        unset($_SESSION['beach']);
        unset($_SESSION['restaurant']);
        unset($_SESSION['gym']);
        unset($_SESSION['wheelchair']);
        unset($_SESSION['dfacilities']);
        
        $status = 200;
    }

    $myObj = array(
        'status' => $status,
        'data' => $data,
        'message' => $retVal  
    );
    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();
?>