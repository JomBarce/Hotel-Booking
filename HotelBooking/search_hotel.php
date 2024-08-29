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
	<link rel="stylesheet" type="text/css" href="./css/searchhotel.css">
    <script type="text/javascript" src="./js/auth.js"></script>
</head>
<body>

    <?php include ("./php/header.php"); ?>

	<div id="heroImage">
		<div class="heroText">
			<h2>Find the best Hotels in any location</h2>
			<p>We find hotels that offers the best deals and hotels that has the best reviews to ensure your hotel experience would be worthwhile, unforgettable, and enjoyable anywhere around the globe.</p>
		</div>
		<div class="search">
            <form id="searchHname" method="put" onsubmit="searchHotel(event)">
                <div class="scontainer">
                    <input name="hotelname" class="text" type="text" placeholder="Hotel Name">
                </div>
                <div class="scontainer">
                    <button type="submit" id="search">Search</button>
                </div>
            </form>
        </div>
            <div class="heroText">
                <p>By clicking "Search" you can find our recommended hotels that are suited for your needs.</p>
            </div>
	</div>

	<div id="main">
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
