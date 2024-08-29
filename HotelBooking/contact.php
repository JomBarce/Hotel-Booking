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
	<link rel="stylesheet" type="text/css" href="./css/contactpolicy.css">
</head>
<body>

    <?php include ("./php/header.php"); ?>

	<div class="section_title">
		<div class="section_content">
			<h2>Help Center</h2>	
		</div>
	</div>
	<div class="section_content">
		<h2>
			Can I indicate special room requests or preferences, such as connecting rooms, bed type, smoking type, or early check-in?
		</h2>
		<p> 
		Each hotel's amenities and room features are listed on the hotel details page. To make sure you only view hotels with certain amenities, filter your search by clicking the check box for the features you prefer. For additional special room preferences, it's best to book by phone.
		</p>
		<br>
		<h2>
			Can I reserve more than one room at the same time?
		</h2>
		<p> 
			Yes. You can book as many rooms in as many hotels as you like.
		</p>
		<br>
		<h2>
			How do I book a hotel room that meets my accessibility needs?
		</h2>
		<p> 
			Please refer to the Property description for specific needs or alternatively contact the property.
			We cannot guarantee that a room with your requested options will be available.
		</p>
		<br>
		<h2>
			How do I know my reservation is confirmed?
		</h2>
		<p> 
			We will send you an email confirmation after you've completed your booking. You should receive the confirmation email generally within 15 minutes, although it may take up to several hours for you to receive the confirmation email. 
			It's worth checking the spam folder in your email to make sure your confirmation email was not blocked. 
			You may need to add this web site to your 'allowed' senders list to receive confirmation emails and information regarding future bookings.
		</p>
		<br>
		<h2>
			I know where I want to stay, but the search results do not show the hotel I want. Why can't I find it?
		</h2>
		<p> 
			There are several reasons why this could happen:
		</p>
		<p> 
			- If we don't have rooms available for the dates you want, the hotel may not show up in your search. You may want to try your search again without dates.
		</p>
		<p>
			- If you use the filters on the Search Results page to narrow your preferences, it's possible that you have filtered that hotel out of the listing.
		</p>
		<p>
			- Or you could be searching for a hotel for which this web site does not have negotiated rates.
		</p>
		<p>
			The best way to find a specific hotel is to filter by hotel name after performing a search in your desired location.
		</p>
		<br>
		<h2>
			I want to bring my pet. Will the hotel allow it?
		</h2>
		<p> 
			Pet policies vary by hotel. If the hotel you are seeking to book shows as (Pets Considered), please contact us for further assistance.
		</p>
		<br>
		<h2>
			I'm having trouble booking online. What do I do?
		</h2>
		<p> 
			Please contact our customer service by the contact form on the bottom of the page.
		</p>
		<br>
		<h2>
			What should I do if I didn't receive a confirmation email after making my reservation?
		</h2>
		<p> 
			Generally, confirmations are sent within 15 minutes of booking, although sometimes it can take a few hours to receive the confirmation email. 
			You may need to add this site to your ´allowed´ senders list to receive confirmation emails and information regarding future bookings.
		</p>
		<br>
		<h2>
			What should I do if I have a question about a past reservation?
		</h2>
		<p> 
			Please contact our customer service by the contact form on the bottom of the page.
		</p>
	</div>
	<div class="section_title">
		<div class="section_content">
			<h2>Contact Us</h2>	
		</div>
	</div>
	<div class="section_contact">
		<h2>Contact Form</h2>
		<p>Fields marked with an asterisk (*) are required.</p>
		<div class="contact_form">
			<p>First Name*</p>
			<input type="text">
		</div>
		<div class="contact_form">
			<p>Last Name*</p>
			<input type="text">
		</div>
		<div class="contact_form">
			<p>Email*</p>
			<input type="text">
		</div>
		<div class="contact_form">
			<p>Phone number</p>
			<input type="text">
		</div>
		<div class="contact_form">
			<p>Message</p>
			<textarea rows="4">Enter text here...</textarea>
		</div>
	</div>

    <?php include ("./php/footer.php"); ?>

</body>
</html>
