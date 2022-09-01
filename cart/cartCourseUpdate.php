<?php 
  include "../connectDB/connectDB.php";

  $get_course_id = $_GET['courseID'];
  $sql = mq("SELECT * FROM course INNER JOIN trainer ON course.trainerID=trainer.trainerID WHERE courseID='".$get_course_id."'");
  $update_course_cart = $sql->fetch_array();
  
  $customer_username = $_SESSION['loginUsername'];
  $trainer_id = $update_course_cart['trainerID'];
  $course_id = $update_course_cart['courseID'];

  $sql2 = mq("INSERT INTO cart(username, trainerID, courseID, orderDate)
  value ('".$customer_username."','".$trainer_id."','".$course_id."',now())");

  echo "<script>alert('Successfully Added to Shopping Cart.'); location.href='./cart.php';</script>"
?>
