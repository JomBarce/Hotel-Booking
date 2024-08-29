<?php 
    include_once("db_connect.php");
    $retVal = "";
    $isValid = true;
    $status = 400;
    $data = [];

    $hotel = trim($_REQUEST['hotelname']);

    if($hotel == ''){
        $isValid = false;
        $retVal = "Please fill all fields.";
    }


    if($isValid){
        $_SESSION['location'] = $hotel;
        $_SESSION['checkin'] = "";
        $_SESSION['checkout'] = "";
        $_SESSION['adult'] = "";
        $_SESSION['children'] = "";
        $_SESSION['hotel'] = $hotel;
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