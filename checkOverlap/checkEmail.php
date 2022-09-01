<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <title>Document</title>
</head>
<body>
<?php
	include "../connectDB/connectDB.php"; //Open database

	$check_email = $_GET["registerEmail"];

	$sql = mq("select * from customer where email='".$check_email."'");
	$member = $sql->fetch_array();

	if($member==0)
	{
?>
<div class="checkEmailGrid">
    <div class="checkEmailWindow">
    <!-- Open New page with print email Available -->
	    <div class="checkEmailAvailable font333">
            <?php echo $check_email; ?> <a>is Available.</a>
        </div>
        <div class="checkEmailButton">
            <button value="close" onclick="window.close()">Close</button>
        </div>
    </div>
</div>
    <?php 
	    }else{
    ?>
    
<div class="checkEmailGrid">
    <div class="checkEmailWindow">
    <!-- Open New page with print email Overlap -->
	    <div class="checkEmailDisavailable font333">
            <?php echo $check_email; ?> <a>is already used!</a>
        <div>
        <div class="checkEmailButton">
            <button value="close" onclick="window.close()">Close</button>
        </div>
    </div>
</div>
    <?php
	    }
    ?>
    
</body>
</html>