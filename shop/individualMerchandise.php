<?php include "../connectDB/connectDB.php" ?>
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
    <?php
    $get_merchandise_id = $_GET['merchandiseID'];
		$sql = mq("SELECT * FROM merchandise WHERE merchandiseID='".$get_merchandise_id."'");
    $individual_merchandise = $sql->fetch_array(); ?>
    <div class="individualProductUllContainer">
      <?php if(!isset($_SESSION['loginUsername'])){?>
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
                <a href="./shop.php"> Shop </a>
              </li>
              <li><a href="../login/login.html">Login</a></li>
            </ul>
          </div>
        </div>
      </header>

      <main class="individualProductMainContainer font333">
        <div class="individualProductMainTop">
          <div class="individualProductMainTopLeft">
            <img
              src="../productUpdate/productUpdateImg/<?php echo $individual_merchandise['merchandisePoster']; ?>"
              alt=""
            />
          </div>
          <div class="individualProductMainTopRight">
            <div class="individualProductMainTopRightTop">
              <div class="individualProductMainTopRightTopTitle">
                <h1><?php echo $individual_merchandise['merchandiseName'] ?></h1>
              </div>
              <div class="individualProductMainTopRightTopDate">
                <div class="individualProductMainTopRightTopPriceGrid">
                  <div class="individualProductMainTopRightTopPriceText">
                    <p>Price:</p>
                  </div>
                  <div class="individualProductMainTopRightTopPrice">
                    <p>RM</p>
                    &nbsp;
                    <p id="each_price"><?php echo $individual_merchandise['merchandisePrice'] ?></p>
                  </div>
                </div>
                <div class="individualProductMainTopRightTopSizeGrid">
                  <div class="individualProductMainTopRightTopSizeText">
                    <p>Size:</p>
                  </div>
                  <div class="individualProductMainTopRightTopSize">
                  <?php
                    $merchandise_type = $individual_merchandise['merchandiseType'];
                    if ($merchandise_type == 'Clothes') { ?>
                      <select name="merchandiseSize" id="merchandiseSize">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                      </select>
                    <?php } else{ ?>
                      <p>N/A</p>
                      <input type="text" name="merchandiseSize" id="merchandiseSize" style="display: none" />
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="individualProductMainTopRightTopQuantityGrid">
                <div class="individualProductMainTopRightTopQuantity">
                  <p>Quantity:</p>
                </div>
                <div class="individualProductMainTopRightTopQuantityName">
                  <input type="button" value="+" onclick="add();" />
                  <span id="check_limited_quantity" style="display:none"
                    ><?php echo $individual_merchandise['merchandiseQuantity'] ?></span
                  >
                  <input type="text" value="1" name="calculate_quantity" id="calculate_quantity" readonly />
                  <input type="button" value="-" onclick="less();" />
                </div>
              </div>
            </div>
            <div class="individualProductMainTopRightBottom">
              <div class="individualProductMainTopRightBottomTop">
                <p>RM</p>
                <p id="total_price"><?php echo number_format($individual_merchandise['merchandisePrice'],2) ?></p>
              </div>
              <div class="individualProductMainTopRightBottomBottom">
                <button
                  type="submit"
                  onclick="location.href='../login/login.html'"
                >
                  Add Shopping Cart
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="individualProductMainBottom">
          <img
            src="../productUpdate/productUpdateImg/<?php echo $individual_merchandise['merchandiseIntro']; ?>"
            alt=""
          />
        </div>
      </main>
      <?php } else {?>
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
                <a href="./shop.php"> Shop </a>
              </li>
              <li><a href="../logout/logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </header>

      <form method="post" action="../cart/cartMerchandiseUpdate.php?merchandiseID=<?php echo $individual_merchandise['merchandiseID']; ?>" enctype="multipart/form-data" name="individualProductMainContainer" class="individualProductMainContainer">
      <main class="individualProductMainContainer font333">
        <div class="individualProductMainTop">
          <div class="individualProductMainTopLeft">
            <img
              src="../productUpdate/productUpdateImg/<?php echo $individual_merchandise['merchandisePoster']; ?>"
              alt=""
            />
          </div>
          <div class="individualProductMainTopRight">
            <div class="individualProductMainTopRightTop">
              <div class="individualProductMainTopRightTopTitle">
                <h1><?php echo $individual_merchandise['merchandiseName'] ?></h1>
              </div>
              <div class="individualProductMainTopRightTopDate">
                <div class="individualProductMainTopRightTopPriceGrid">
                  <div class="individualProductMainTopRightTopPriceText">
                    <p>Price:</p>
                  </div>
                  <div class="individualProductMainTopRightTopPrice">
                    <p>RM</p>
                    &nbsp;
                    <p id="each_price"><?php echo $individual_merchandise['merchandisePrice'] ?></p>
                  </div>
                </div>
                <div class="individualProductMainTopRightTopSizeGrid">
                  <div class="individualProductMainTopRightTopSizeText">
                    <p>Size:</p>
                  </div>
                  <div class="individualProductMainTopRightTopSize">
                    <?php
                    $merchandise_type = $individual_merchandise['merchandiseType'];
                    if ($merchandise_type == 'Clothes') { ?>
                      <select name="merchandiseSize" id="merchandiseSize">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                      </select>
                    <?php } else{ ?>
                      <p>N/A</p>
                      <input type="text" name="merchandiseSize" id="merchandiseSize" style="display: none" />
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="individualProductMainTopRightTopQuantityGrid">
                <div class="individualProductMainTopRightTopQuantity">
                  <p>Quantity:</p>
                </div>
                <div class="individualProductMainTopRightTopQuantityName">
                  <input type="button" value="+" onclick="add();" />
                  <span id="check_limited_quantity" style="display:none"
                    ><?php echo $individual_merchandise['merchandiseQuantity'] ?></span
                  >
                  <input type="text" value="1" name="calculate_quantity" id="calculate_quantity" readonly />
                  <input type="button" value="─" onclick="less();" />
                </div>
              </div>
            </div>
            <div class="individualProductMainTopRightBottom">
              <div class="individualProductMainTopRightBottomTop">
                <p>RM</p>
                <p id="total_price"><?php echo number_format($individual_merchandise['merchandisePrice'],2) ?></p>
              </div>
              <div class="individualProductMainTopRightBottomBottom">
                <button
                  type="submit"
                  >
                  Add Shopping Cart
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="individualProductMainBottom">
          <img
            src="../productUpdate/productUpdateImg/<?php echo $individual_merchandise['merchandiseIntro']; ?>"
            alt=""
          />
        </div>
      </main>
      </form>
      <?php }?>

      <footer class="footerContainer">
        <div class="footerGrid font333">
          <p>Copyright ⓒ 2021 Imperium Edumaax Sdn Bhd</p>
          <p>Powered By Kayaum Company</p>
        </div>
      </footer>
    </div>
    <script src="../script.js"></script>
  </body>
</html>
