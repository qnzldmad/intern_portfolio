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

	$check_username = $_GET["registerUsername"];

	$sql = mq("select * from customer where username='".$check_username."'");
	$member = $sql->fetch_array();

	if($member==0)
	{
?>
<div class="checkUsernameGrid">
    <div class="checkUsernameWindow">
    <!-- Open New page with print username Available -->
	    <div class="checkUsernameAvailable font333">
            <?php echo $check_username; ?> <a>is Available.</a>
        </div>
        <div class="checkUsernameButton">
            <button value="close" onclick="window.close()">Close</button>
        </div>
    </div>
</div>
    <?php 
	    }else{
    ?>
    
<div class="checkUsernameGrid">
    <div class="checkUsernameWindow">
    <!-- Open New page with print username Overlap -->
	    <div class="checkUsernameDisavailable font333">
            <?php echo $check_username; ?> <a>is already used!</a>
        <div>
        <div class="checkUsernameButton">
            <button value="close" onclick="window.close()">Close</button>
        </div>
    </div>
</div>
    <?php
	    }
    ?>
    
</body>
</html>