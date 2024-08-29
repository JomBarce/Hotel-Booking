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
	<link rel="stylesheet" type="text/css" href="./css/profile.css">
    <script type="text/javascript" src="./js/auth.js"></script>
</head>
<body>

	<?php include ("./php/header.php"); ?>

	<?php
		$con = mysqli_connect("localhost", "root", "","hotel_booking_user");
		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$result = mysqli_query($con,"SELECT * FROM users WHERE id='" . $_SESSION['user_id'] . "'");
		$con->close();	
	?>

	<?php
		if (mysqli_num_rows($result)) {
	?>
	<div class="background"></div>
	<div>
		<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
				if($row["profilepicture"] == NULL){
					$imageURL = './images/placeholder.jpg';
				}else{
					$imageURL = './images/profile/'.$row["profilepicture"];	
				}
		?>
		<div class="contents">
			<img id="p_picture" src="<?php echo $imageURL; ?>" />
			<div class="user">
				<h1><?php echo $row["fname"]; ?><?php echo " " ?><?php echo $row["lname"]; ?></h1>
				<h2>User Number: <?php echo $row["id"]; ?></h2>
			</div>
		</div>
		<form action="profile_edit.php" >
			<input type="submit" class="btn btn-primary btn-lg" name="edit" id="edit" value="Edit"/>
		</form>
		<table>
			<tr>
				<td class="left header" colspan="2" ><h2>PROFILE</h2></td>
			</tr>
			<tr>
				<td class="left">Name: <?php echo $row["fname"]; ?><?php echo " " ?><?php echo $row["lname"]; ?></td>
				<td class="right">Email Address: <?php echo $row["email"]; ?></td>
			</tr>
			<tr>
				<td class="left">User Number: <?php echo $row["id"]; ?></td>
				<td class="right">Cellphone Number: <?php echo $row["cellphonenumber"]; ?></td>
			</tr>
			<tr>
				<td class="left">Gender: <?php echo $row["gender"]; ?></td>
				<td class="right">Phone Number: <?php echo $row["phonenumber"]; ?></td>
			</tr>
			<tr>
				<?php 
				if($row["birthday"] != NULL){
					$dateformat = date("m/d/Y", strtotime($row["birthday"])); 
				}else{
					$dateformat = ""; 
				}
				?>
				<td class="left">Birthday: <?php echo $dateformat; ?></td>
				<td class="right">Recovery Email Address: <?php echo $row["recoveryemail"]; ?></td>
			</tr>
			<tr>
				<td class="left">Country: <?php echo $row["country"]; ?></td>
				<td class="right"></td>
			</tr>
		<?php
			$i++;
			}
		?>
		</table>	
	</div>
 	<?php
	} else {
    echo "No result found";
	}
	?>

	<?php include ("./php/footer.php"); ?>

</body>
</html>
