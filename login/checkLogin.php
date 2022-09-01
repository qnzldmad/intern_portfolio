<?php	
	include "../connectDB/connectDB.php";
    $login_username = $_POST["loginUsername"];
    $login_password = $_POST["loginPassword"];

    
    $sql = mq("select * from customer where username='".$login_username."'");
    $member = $sql->fetch_array();
    $hash_password = !empty($member['password'])?$member['password']:0; 
    $check_username = !empty($member['username'])?$member['username']:0; 
    
	// Go back to previous page if username or password empty
	if($login_username == "" || $login_password == ""){
		echo '<script> alert("Please Enter Your Username or Password"); history.back(); </script>';
	}else if(!$check_username)
    {
        // Go back to previous page if no username in database
      echo("
            <script> alert('No Registered Username'); history.back(); </script>
          ");
     }else{
	    // if password and hash_password are same save session and go to index.php after alert
	    if(password_verify($login_password, $hash_password)) 
	    {
		    $_SESSION['loginUsername'] = $member["username"];
		    $_SESSION['loginPassword'] = $member["password"];
            echo "<script>alert('successfully Login.'); location.href='../index.php';</script>";
	    }else{
             // if password is not same go back to previous page with alert
		    echo "<script>alert('Login Failed! Check your username or password again!'); history.back();</script>";
	    }
    }
?>