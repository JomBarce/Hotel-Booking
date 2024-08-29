<?php 
    include_once("db_connect.php");
    $retVal = "";
    $isValid = true;
    $status = 400;
    $data = [];

    $booking_id = trim($_POST['bookingid']);

    
    if($isValid){
        $sql = "DELETE FROM userbookings WHERE id = $booking_id";
        mysqli_query($con, $sql);
        
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