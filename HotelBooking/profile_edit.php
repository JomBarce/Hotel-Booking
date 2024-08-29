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
      if(count($_POST)>0) {
        mysqli_query($con,"UPDATE users SET fname='" . $_POST['first_name'] . "', lname='" . $_POST['last_name'] . "', gender='" . $_POST['user_gender'] . "' ,birthday='" . $_POST['user_birthday'] . "', country='" . $_POST['user_country'] . "', email='" . $_POST['user_email'] . "' ,cellphonenumber='" . $_POST['user_cellnumber'] . "', phonenumber='" . $_POST['user_phonenumber'] . "' ,recoveryemail='" . $_POST['user_recovery'] . "' WHERE id='" . $_SESSION['user_id'] . "' ");
        $message = "Record Modified Successfully";
        header("Location: profile_update.php");
        exit();
      }
	    $result = mysqli_query($con,"SELECT * FROM users WHERE id='" . $_SESSION['user_id'] . "'");
      $row= mysqli_fetch_array($result);
      $con->close();
    ?>

    <div>
      <h3>PROFILE PICTURE</h3>
      <div id="update-form">
        <form action="./php/image_upload.php" method="post" enctype="multipart/form-data">
          Select Image File to Upload:
          <input class="btn1" type="file" name="file">
          <input class="btn2" type="submit" name="upload" value="Upload">
        </form>
      </div>
      <form name="frmUser" method="post" action="">
        <div><?php if(isset($message)) { echo '<script>alert("'.$message.'")</script>'; } ?></div>
        <h3>PROFILE</h3>
        <div id="update-form">
          <div class="form-group">
            <input type="hidden" name="userid" class="txtField" value="<?php echo $row['id']; ?>">
            <label>First Name: </label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo($row['fname']); ?>" required />
          </div>
          <div class="form-group">
            <label>Last Name: </label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo($row['lname']); ?>" required />
          </div>
          <div class="form-group">
            <label>Gender: </label>
            <input type="text" class="form-control" name="user_gender" id="user_gender" placeholder="Enter your Gender" value="<?php echo($row['gender']); ?>" />
          </div>
          <div class="form-group">
            <label>Birthday: </label>
            <input type="date" class="form-control" name="user_birthday" id="user_birthday" placeholder="Enter your Age" value="<?php echo($row['birthday']); ?>">
          </div>
          <div class="form-group">
            <label>Country: </label>
            <input type="text" class="form-control" name="user_country" id="user_country" placeholder="Enter your Address" value="<?php echo($row['country']); ?>">
          </div>
          <div class="form-group">
            <label>Email Address: </label>
            <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo($row['email']); ?>" required />
          </div>
          <div class="form-group">
            <label>Cellphone Number: </label>
            <input type="text" class="form-control" name="user_cellnumber" id="user_cellnumber" placeholder="Enter your cellphone number" value="<?php echo($row['cellphonenumber']); ?>">
          </div>
          <div class="form-group">
            <label>Phone Number: </label>
            <input type="text" class="form-control" name="user_phonenumber" id="user_phonenumber" placeholder="Enter your phone number" value="<?php echo($row['phonenumber']); ?>">
          </div>
          <div class="form-group">
            <label>Recovery Email Address: </label>
            <input type="email" class="form-control" name="user_recovery" id="user_recovery" placeholder="Enter your recovery email" value="<?php echo($row['recoveryemail']); ?>">
          </div>
          <div>
            <input type="submit" name="submit" value="Submit" class="btn3">
          </div>
        </div>
      </form>
    </div>

    <?php include ("./php/footer.php"); ?>

</body>
</html>