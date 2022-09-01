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
    $get_course_id = $_GET['courseID'];
		$sql = mq("SELECT * FROM course INNER JOIN trainer ON course.trainerID=trainer.trainerID WHERE courseID='".$get_course_id."'");
    $individual_course = $sql->fetch_array();
  ?>
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
              src="../trainerUpdate/trainerUpdateImg/<?php echo $individual_course['trainerImages'] ?>"
              alt=""
            />
          </div>
          <div class="individualProductMainTopRight">
            <div class="individualProductMainTopRightTop">
              <div class="individualProductMainTopRightTopTitle">
                <h1><?php echo $individual_course['courseName'] ?></h1>
              </div>
              <div class="individualProductMainTopRightTopDate">
                <div class="individualProductMainTopRightTopStartDateGrid">
                  <div class="individualProductMainTopRightTopStartDateText">
                    <p>Start Date:</p>
                  </div>
                  <div class="individualProductMainTopRightTopStartDate">
                    <p><?php echo $individual_course['startDate'] ?></p>
                  </div>
                </div>
                <div class="individualProductMainTopRightTopEndDateGrid">
                  <div class="individualProductMainTopRightTopEndDateText">
                    <p>End Date:</p>
                  </div>
                  <div class="individualProductMainTopRightTopEndDate">
                    <p><?php echo $individual_course['endDate'] ?></p>
                  </div>
                </div>
              </div>
              <div class="individualProductMainTopRightTopTrainerGrid">
                <div class="individualProductMainTopRightTopTrainer">
                  <p>Trainer:</p>
                </div>
                <div class="individualProductMainTopRightTopTrainerName">
                  <p><?php echo $individual_course['trainerName'] ?></p>
                </div>
              </div>
            </div>
            <div class="individualProductMainTopRightBottom">
              <div class="individualProductMainTopRightBottomTop">
                <p>RM <?php echo $individual_course['courseFee'] ?></p>
              </div>
              <div class="individualProductMainTopRightBottomBottom">
                <button type="submit" onclick="location.href='../login/login.html'">Add Shopping Cart</button>
              </div>
            </div>
          </div>
        </div>
        <div class="individualProductMainBottom">
          <img src="../productUpdate/productUpdateImg/<?php echo $individual_course['courseIntro'] ?>" alt="" />
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

      <main class="individualProductMainContainer font333">
        <div class="individualProductMainTop">
          <div class="individualProductMainTopLeft">
            <img
              src="../trainerUpdate/trainerUpdateImg/<?php echo $individual_course['trainerImages'] ?>"
              alt=""
            />
          </div>
          <div class="individualProductMainTopRight">
            <div class="individualProductMainTopRightTop">
              <div class="individualProductMainTopRightTopTitle">
                <h1><?php echo $individual_course['courseName'] ?></h1>
              </div>
              <div class="individualProductMainTopRightTopDate">
                <div class="individualProductMainTopRightTopStartDateGrid">
                  <div class="individualProductMainTopRightTopStartDateText">
                    <p>Start Date:</p>
                  </div>
                  <div class="individualProductMainTopRightTopStartDate">
                    <p><?php echo $individual_course['startDate'] ?></p>
                  </div>
                </div>
                <div class="individualProductMainTopRightTopEndDateGrid">
                  <div class="individualProductMainTopRightTopEndDateText">
                    <p>End Date:</p>
                  </div>
                  <div class="individualProductMainTopRightTopEndDate">
                    <p><?php echo $individual_course['endDate'] ?></p>
                  </div>
                </div>
              </div>
              <div class="individualProductMainTopRightTopTrainerGrid">
                <div class="individualProductMainTopRightTopTrainer">
                  <p>Trainer:</p>
                </div>
                <div class="individualProductMainTopRightTopTrainerName">
                  <p><?php echo $individual_course['trainerName'] ?></p>
                </div>
              </div>
            </div>
            <div class="individualProductMainTopRightBottom">
              <div class="individualProductMainTopRightBottomTop">
                <p>RM <?php echo $individual_course['courseFee'] ?></p>
              </div>
              <div class="individualProductMainTopRightBottomBottom">
                <button type="submit" onclick="location.href='../cart/cartCourseUpdate.php?courseID=<?php echo $individual_course['courseID']; ?>'">Add Shopping Cart</button>
              </div>
            </div>
          </div>
        </div>
        <div class="individualProductMainBottom">
          <img src="../productUpdate/productUpdateImg/<?php echo $individual_course['courseIntro'] ?>" alt="" />
        </div>
      </main>

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
