<?php
include "../connectDB/connectDB.php";
$username_check = $_POST["registerUsername"];
$email_check = $_POST['registerEmail'];

$sql1 = mq("select * from customer where username='".$username_check."' || email = '".$email_check."'");
$result1 = $sql1->fetch_array();

if($result1["username"] == $username_check || $result1["email"] == $email_check){
            echo "<script>alert('Please Check Overlap username and email'); history.back();</script>";
        }else{
                $pictures = $_FILES['image']['name'];
  	            $username = mysqli_real_escape_string($db, $_POST['registerUsername']);
              	$email = mysqli_real_escape_string($db, $_POST['registerEmail']);
              	$password = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);
              	$name = mysqli_real_escape_string($db, $_POST['registerName']);
              	$phone = mysqli_real_escape_string($db, $_POST['registerPhone']);
              	$address = mysqli_real_escape_string($db, $_POST['registerAddress']);
              	$postcode = mysqli_real_escape_string($db, $_POST['registerPost']);
              	$organize = mysqli_real_escape_string($db, $_POST['registerOrganize']);
              	$certificate = mysqli_real_escape_string($db, $_POST['registerCertificate']);
              	$target = "registerUploadImg/".basename($pictures);

              	$sql = "INSERT INTO customer (username, email, password, name, phone, address, postcode, organize, certificate, images) VALUES ('$username', '$email', '$password', '$name', '$phone', '$address', '$postcode', '$organize', '$certificate', '$pictures')";
              	mysqli_query($db, $sql);

              	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          		$msg = "Image uploaded successfully";
  	            }else{
  		                $msg = "Failed to upload image";
  	                }
            	echo "<script>alert('Successfully Register!'); location.href='../login/login.html'; </script>";
            }


?>