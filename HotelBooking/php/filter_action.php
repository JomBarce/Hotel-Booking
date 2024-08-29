<?php 
    include_once("db_connect.php");
    $retVal = "";
    $isValid = true;
    $status = 400;
    $data = [];

    $price = trim($_REQUEST['price']);
    $ratings = trim($_REQUEST['ratings']);
    $star = trim($_REQUEST['star']);
    $cancel = trim($_REQUEST['cancel']);
    $prepayment = trim($_REQUEST['prepayment']);
    $creditcard = trim($_REQUEST['creditcard']);
    $pool = trim($_REQUEST['pool']);
    $wifi = trim($_REQUEST['wifi']);
    $aircon = trim($_REQUEST['aircon']);
    $spa = trim($_REQUEST['spa']);
    $breakfast = trim($_REQUEST['breakfast']);
    $pet = trim($_REQUEST['pet']);
    $beach = trim($_REQUEST['beach']);
    $restaurant = trim($_REQUEST['restaurant']);
    $gym = trim($_REQUEST['gym']);
    $wheelchair = trim($_REQUEST['wheelchair']);
    $dfacilities = trim($_REQUEST['dfacilities']);

    if($isValid){
        $_SESSION['price'] = $price;
        $_SESSION['ratings'] = $ratings;
        $_SESSION['star'] = $star;
        $_SESSION['cancel'] = $cancel;
        $_SESSION['prepayment'] = $prepayment;
        $_SESSION['creditcard'] = $creditcard;
        $_SESSION['pool'] = $pool;
        $_SESSION['wifi'] = $wifi;
        $_SESSION['aircon'] = $aircon;
        $_SESSION['spa'] = $spa;
        $_SESSION['breakfast'] = $breakfast;
        $_SESSION['pet'] = $pet;
        $_SESSION['beach'] = $beach;
        $_SESSION['restaurant'] = $restaurant;
        $_SESSION['gym'] = $gym;
        $_SESSION['wheelchair'] = $wheelchair;
        $_SESSION['dfacilities'] = $dfacilities;
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