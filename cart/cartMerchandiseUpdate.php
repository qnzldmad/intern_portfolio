<?php
  include "../connectDB/connectDB.php";

  $get_merchandise_id = $_GET['merchandiseID'];
  $sql = mq("SELECT * FROM merchandise WHERE merchandiseID='".$get_merchandise_id."'");
  $update_course_cart = $sql->fetch_array();

  $customer_username = $_SESSION['loginUsername'];
  $merchandise_id = $update_course_cart['merchandiseID'];
  $merchandise_size = $_POST['merchandiseSize'];
  $merchandise_quantity = $_POST['calculate_quantity'];

  $sql2 = mq("INSERT INTO cart(username, merchandiseID, size, quantity, orderDate)
  value ('".$customer_username."','".$merchandise_id."','".$merchandise_size."','".$merchandise_quantity."',now())");

echo "<script>alert('Successfully Added to Shopping Cart.'); location.href='./cart.php';</script>"

?>
