<?php include "../connectDB/connectDB.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <title>Document</title>
  </head>
  <body>    
<?php if(!isset($_SESSION['loginUsername'])){?>
    <?php } else{?>
    <div class="cartFullContainer font333">
      <header class="shopHeaderContainer">
        <div class="shopHeaderTop">
          <div class="shopHeaderTopGrid">
            <div class="shopHeaderTopRight font333">
              <h1><a href="../index.php">Edumaax</a></h1>
            </div>
            <div class="shopHeaderTopLeft">
              <a href=""><img src="../image/personal.png" alt="" /></a>
              <a href=""><img src="../image/shoppingCart.png" alt="" /></a>
            </div>
          </div>
        </div>
        <div class="shopHeaderBottom">
          <div class="individualProductHeaderBottomGrid font333">
            <ul>
              <li>
                <a href="../shop/shop.php"> Shop </a>
              </li>
              <li><a href="../logout/logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </header>

      <main class="cartMainContainer" id="cartMainContainerId">
        <div class="cartMainHeader">
          <div class="cartMainHeaderLeft">
            <h1>SHOPPING CART</h1>
          </div>
          <div class="cartMainHeaderRight">
            <span id="shopping_cart">Shopping Cart</span>
            <p id="check_out">Check Out</p>
            <p id="place_order">Place Order</p>
          </div>
        </div>

        <div class="cartMainCourse">
          <div class="cartMainCourseListTitle">
            <div class="cartMainCourseListPoster">
              <p>Poster</p>
            </div>
            <div class="cartMainCourseListCourseName">
              <p>Course Name</p>
            </div>
            <div class="cartMainCourseListStartDate">
              <p>Start Date</p>
            </div>
            <div class="cartMainCourseListEndDate">
              <p>End Date</p>
            </div>
            <div class="cartMainCourseListTrainer">
              <p>Trainer</p>
            </div>
            <div class="cartMainCourseListPrice">
              <p>Price</p>
            </div>
            <div class="cartMainCourseListDelete"></div>
          </div>

          <?php 
          $course_information = mq("SELECT * FROM cart INNER JOIN course ON cart.courseID=course.courseID INNER JOIN trainer ON cart.trainerID=trainer.trainerID WHERE username='{$_SESSION['loginUsername']}'");
          
          $total_course = 0;

          while ($cart_course = $course_information->fetch_array()){
          ?>
          <div class="cartMainCourseListContent">
            <div class="cartMainCourseListPoster">
              <img src="../productUpdate/productUpdateImg/<?php echo $cart_course['coursePoster'];?>" alt="" />
            </div>
            <div class="cartMainCourseListCourseName">
              <p>
              <?php echo $cart_course['courseName'];?>
              </p>
            </div>
            <div class="cartMainCourseListStartDate">
              <p><?php echo $cart_course['startDate'];?></p>
            </div>
            <div class="cartMainCourseListEndDate">
              <p><?php echo $cart_course['endDate'];?></p>
            </div>
            <div class="cartMainCourseListTrainer">
              <p><?php echo $cart_course['trainerName'];?></p>
            </div>
            <div class="cartMainCourseListPrice">
              <p>RM <?php echo number_format($cart_course['courseFee'],2) ;?></p>
            </div>
            <div class="cartMainCourseListDelete">
              <a
                href="./delete.php?cartID=<?php echo $cart_course['cartID'];?>"
                onclick="return confirm('Are You Sure You Want to Delete This Order Line?')"
                >DELETE</a
              >
            </div>
          </div>
          <?php 
          $total_course += $cart_course['courseFee'];
          } 
          ?>
          <div class="cartMainCourseListTotal">
            <div class="cartMainCourseListPoster"></div>
            <div class="cartMainCourseListCourseName"></div>
            <div class="cartMainCourseListStartDate"></div>
            <div class="cartMainCourseListEndDate"></div>
            <div class="cartMainCourseListTotalText">
              <p>Total:</p>
            </div>
            <div class="cartMainCourseListPrice">
              <p>RM <?php echo number_format($total_course,2)?></p>
            </div>
            <div class="cartMainCourseListDelete"></div>
          </div>
        </div>

        <div class="cartMainMerchandise">
          <div class="cartMainMerchandiseListTitle">
            <div class="cartMainMerchandiseListPoster">
              <p>Poster</p>
            </div>
            <div class="cartMainMerchandiseListMerchandiseName">
              <p>Merchandise Name</p>
            </div>
            <div class="cartMainMerchandiseListType">
              <p>Type</p>
            </div>
            <div class="cartMainMerchandiseListSize">
              <p>Size</p>
            </div>
            <div class="cartMainMerchandiseListPriceEach">
              <p>Price Each</p>
            </div>
            <div class="cartMainMerchandiseListQuantity">
              <p>Quantity</p>
            </div>
            <div class="cartMainMerchandiseListPrice">
              <p>Price</p>
            </div>
            <div class="cartMainMerchandiseListDelete"></div>
          </div>

          <?php 
          $merchandise_information = mq("SELECT * FROM cart INNER JOIN merchandise ON cart.merchandiseID=merchandise.merchandiseID WHERE username='{$_SESSION['loginUsername']}'");
          
          $total_merchandise = 0;

          while ($cart_merchandise = $merchandise_information->fetch_array()){
          ?>
          <div class="cartMainMerchandiseListContent">
            <div class="cartMainMerchandiseListPoster">
              <img
                src="../productUpdate/productUpdateImg/<?php echo $cart_merchandise['merchandisePoster'] ?>"
                alt=""
              />
            </div>
            <div class="cartMainMerchandiseListMerchandiseName">
              <p><?php echo $cart_merchandise['merchandiseName'] ?></p>
            </div>
            <div class="cartMainMerchandiseListType">
              <p><?php echo $cart_merchandise['merchandiseType'] ?></p>
            </div>
            <div class="cartMainMerchandiseListSize">
              <p><?php echo $cart_merchandise['size'] ?></p>
            </div>
            <div class="cartMainMerchandiseListPriceEach">
              <p>RM <?php echo $cart_merchandise['merchandisePrice'] ?></p>
            </div>
            <div class="cartMainMerchandiseListQuantity">
              <p><?php echo $cart_merchandise['quantity'] ?></p>
            </div>
            <div class="cartMainMerchandiseListPrice">
              <p>RM<?php echo number_format($cart_merchandise['merchandisePrice'] * $cart_merchandise['quantity'],2) ?></p>
            </div>
            <div class="cartMainMerchandiseListDelete">
              <a
                href="./delete.php?cartID=<?php echo $cart_merchandise['cartID'];?>"
                onclick="return confirm('Are You Sure You Want to Delete This Order Line?')"
                >DELETE</a
              >
            </div>
          </div>
          <?php 
          $total_merchandise += ($cart_merchandise['merchandisePrice'] * $cart_merchandise['quantity']);
          } 
          ?>

          <div class="cartMainMerchandiseListTotal">
            <div class="cartMainMerchandiseListPoster"></div>
            <div class="cartMainMerchandiseListMerchandiseName"></div>
            <div class="cartMainMerchandiseListType"></div>
            <div class="cartMainMerchandiseListSize"></div>
            <div class="cartMainMerchandiseListPriceEach"></div>
            <div class="cartMainMerchandiseListTotalText">
              <p>Total:</p>
            </div>
            <div class="cartMainMerchandiseListPrice">
              <p>RM<?php echo number_format($total_merchandise,2) ?></p>
            </div>
            <div class="cartMainMerchandiseListDelete"></div>
          </div>
        </div>

        <?php 
        $total_price_products = $total_course + $total_merchandise;
        $delivery_fee = 3.50;
        $total_all_amount = $total_price_products + $delivery_fee;
        ?>
        <div class="cartMainCalculateTotal">
          <p>
            Product(s) Price: RM <?php echo number_format($total_price_products,2) ?> + Delivery Fee/Apply Fee: RM <?php echo number_format($delivery_fee,2) ?> =
          </p>
          <span>Total Price: RM <?php echo number_format($total_all_amount,2) ?></span>
        </div>

        <div class="cartMainBtn">
          <div class="cartMainBtnLeft">
            <button onclick="location.href='../shop/shop.php'">Continue Shopping</button>
          </div>
          <div class="cartMainBtnRight">
            <button onclick="checkOut();">Check Out</button>
          </div>
        </div>
      </main>
      
      <main class="cartMainContainerCheckout" id="cartMainContainerCheckoutId" style="display: none">
        <div class="cartMainHeader">
          <div class="cartMainHeaderLeft">
            <h1>SHOPPING CART</h1>
          </div>
          <div class="cartMainHeaderRight">
            <p id="shopping_cart">Shopping Cart</p>
            <span id="check_out">Check Out</span>
            <p id="place_order">Place Order</p>
          </div>
        </div>
        
        <div class="deliveryInformation">
          <div class="deliveryInformationTitle">
            <h1>Delivery Information</h1>
          </div>
          <div class="deliveryInformationName">
            <p>Kay Aum</p>
          </div>
          <div class="deliveryInformationPhone">
            <p>(+60)165315884</p>
          </div>
          <div class="deliveryInformationAddress">
            <p>
              Jln Sri Hartamas 1, Mont Kiara, Kuala Lumpur , Malaysia, 50480
            </p>
          </div>
        </div>

        <div class="paymentMethod">
          <div class="paymentMethodTop">
            <h1>Payment Method</h1>
          </div>
          <div class="paymentMethodBottom">
            <button>Edumaax Pay</button>
            <button>Cash on Delivery</button>
            <button>Cash on Receive at Office</button>
            <button>Cash Payment at Convenience Stores</button>
            <button>Online bank</button>
            <button>Credit/Debit Card</button>
          </div>
        </div>

        <div class="subtotal">
          <div class="productSubtotal">
            <div class="productSubtotalLeft">
              <p>Product(s) Subtotal:</p>
            </div>
            <div class="productSubtotalRight">
              <p>RM 42.50</p>
            </div>
          </div>
          <div class="deliveryFee">
            <div class="deliveryFeeLeft">
              <p>Delivery Fee:</p>
            </div>
            <div class="deliveryFeeRight">
              <p>RM 3.50</p>
            </div>
          </div>
          <div class="totalPayment">
            <div class="totalPaymentLeft">
              <p>Total Payment:</p>
            </div>
            <div class="totalPaymentRight">
              <p>RM 46.00</p>
            </div>
          </div>
        </div>

        <div class="placeOrderBtn">
          <button>Place Order</button>
        </div>
      </main>

      <footer class="footerContainer">
        <div class="footerGrid font333">
          <p>Copyright ⓒ 2021 Imperium Edumaax Sdn Bhd</p>
          <p>Powered By Kayaum Company</p>
        </div>
      </footer>
    </div>
    <?php } ?>
    <script src="../script.js"></script>
  </body>
</html>