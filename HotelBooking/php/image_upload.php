<?php
include 'db_connect.php';
$statusMsg = '';

// File upload path
$targetDir = "../images/profile/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["upload"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = mysqli_query($con,"UPDATE users SET profilepicture='".$fileName."' WHERE id='" . $_SESSION['user_id'] . "' ");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

if($statusMsg == "The file ".$fileName. " has been uploaded successfully."){
    header("Location: ../profile_update.php");
    exit();
}else{
    header("Location: ../profile_edit.php");
    exit();
}

// Display status message
echo '<script>alert("'.$statusMsg.'")</script>';    
?>