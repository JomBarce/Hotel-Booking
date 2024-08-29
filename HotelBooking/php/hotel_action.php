<?php 
    include_once("db_connect.php");
    $retVal = "";
    $isValid = true;
    $status = 400;
    $data = [];

    $hotel_id = trim($_POST['hotelid']);

    if($isValid){
        $_SESSION['hotelid'] = $hotel_id;
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