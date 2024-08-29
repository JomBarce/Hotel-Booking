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
	<link rel="stylesheet" type="text/css" href="./css/home.css">
	<link rel="stylesheet" type="text/css" href="./css/hero.css">
    <script type="text/javascript" src="./js/auth.js"></script>
</head>
<body>

    <?php include ("./php/header.php"); ?>

    <div id="heroImage">
        <div class="heroText">
            <h2>Find the Hotels with the best deals</h2>
            <p>We find hotels that offers the best deals and hotels that has the best reviews to ensure your hotel experience would be worthwhile, unforgettable, and enjoyable anywhere around the globe.</p>
        </div>
        <div class="search">
            <form id="searchForm" method="post" onsubmit="searchSubmit(event)">
                <div class="scontainer">
                    <input name="location" class ="text" type="text" placeholder="Location">
                </div>
                <div class="scontainer">
                    <label>Check In</label>
                    <input name="checkin" class ="date" type="date">
                </div>
                <div class="scontainer">
                    <label>Check Out</label>
                    <input name="checkout" class ="date" type="date">
                </div>
                <div class="scontainer">
                    <label>Adult</label>
                    <input type="number" id="adult" name="adult" min="1" max="10" value="1">
                </div>
                <div class="scontainer">
                    <label>Children</label>
                    <input type="number" id="child" name="children" min="0" max="10" value="0">
                </div>
                <div class="scontainer">
                    <button type="submit" id="searchHotel">Search</button>
                </div>
            </form>
        </div>
        <div class="heroText">
            <p>By clicking "Search" you can find our recommended hotels that are suited for your needs.</p>
        </div>
    </div>

    <div id="main">
        <div class="mcontainer">
            <div class="feature">
                <img src="./images/icons/noPrepayment.png" alt="noPrepayment.png">
                <h3>Book without any prepayment</h3>
                <p>Book anywhere without prepayment and surcharges</p>
            </div>
            <div class="feature">
                <img src="./images/icons/noCancellationfee.png" alt="noCancellationfee.png">
                <h3>No cancellation fee</h3>
                <p>Cancel your reservations without any additional charges and fees.</p>
            </div>
            <div class="feature">
                <img src="./images/icons/bookIcon.png" alt="bookIcon.png">
                <h3>Book hotels anywhere</h3>
                <p>We accommodate hotels anywhere in the globe and recommend according to your needs</p>
            </div>
            <div class="feature">
                <img src="./images/icons/idealHotel.png" alt="idealHotel.png">
                <h3>Find your ideal hotel</h3>
                <p>Images, rating, and reviews allows you to find out more about where you are going</p>
            </div>
        </div>
        <div class="mcontainer">
            <div class="hotels">
                <img src="./images/background/bestHotel.jpg" alt="bestHotel.jpg">
                <h3>Best Hotels</h3>
                <p>The Best Hotels with the best reviews and experience.</p>
            </div>
            <div class="hotels">
                <img src="./images/background/cheapHotels.jpg" alt="cheapHotels.jpg">
                <h3>Cheap Hotels</h3>
                <p>Find cheap and budget hotels without sacrificing enjoyment.</p>
            </div>
            <div class="hotels">
                <img src="./images/background/topDestination.jpg" alt="topDestination.jpg">
                <h3>Top Destinations</h3>
                <p>Find the best hotels in any top destination worldwide.</p>
            </div>
            <div class="hotels">
                <img src="./images/background/topCountry.jpg" alt="topCountry.jpg">
                <h3>Top Countries</h3>
                <p>Enjoy top countries with the best hotel offers and experience.</p>
            </div>
        </div>
    </div>

    <?php include ("./php/footer.php"); ?>

</body>
</html>
