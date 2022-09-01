<?php
    include "../connectDB/connectDB.php";

    $get_cart_id = $_GET['cartID'];
    $delete_product = "DELETE FROM cart WHERE cartID='".$get_cart_id."' && username='{$_SESSION['loginUsername']}'";
    $result = mysqli_query($db, $delete_product);

    echo "<script>alert('Product Successfully Deleted'); location.href='./cart.php';</script>";
    ?>