<?php 
    include_once("db_connect.php");
    $retVal = "";
    $isValid = true;
    $status = 400;
    $data = [];
    $today = date("Y-m-d"); 

    $location = trim($_REQUEST['location']);
    $checkin = trim($_REQUEST['checkin']);
    $checkout = trim($_REQUEST['checkout']);
    $adult = trim($_REQUEST['adult']);
    $children = trim($_REQUEST['children']);

    // Check fields are empty or not
    if($location == '' || $checkin == '' || $checkout == ''){
        $isValid = false;
        $retVal = "Please fill all fields";
    }

    if($checkin >= $checkout){
        $isValid = false;
        $retVal = "Please change the Check In and Check Out dates";
    }

    if($checkin < $today || $checkout < $today){
        $isValid = false;
        $retVal = "Please change the Check In and Check Out dates";
    }

    if($isValid){
        $_SESSION['location'] = $location;
        $_SESSION['checkin'] = $checkin;
        $_SESSION['checkout'] = $checkout;
        $_SESSION['adult'] = $adult;
        $_SESSION['children'] = $children;
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