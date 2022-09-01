
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
    <div class="shopFullContainer">
      <header class="shopHeaderContainer">
      <?php if(!isset($_SESSION['loginUsername'])){?>
        <div class="shopHeaderTop">
          <div class="shopHeaderTopGrid">
            <div class="shopHeaderTopRight font333">
              <h1><a href="../index.php">Edumaax</a></h1>
            </div>
            <div class="shopHeaderTopLeft">
              <a href="../login/login.html"><img src="../image/personal.png" alt="" /></a>
              <a href="../login/login.html"><img src="../image/shoppingCart.png" alt="" /></a>
            </div>
          </div>
        </div>
        <div class="shopHeaderBottom">
          <div class="shopHeaderBottomGrid font333">
            <ul>
              <li><a href="javascript:void(0)" onclick="showCourse(this)" id="shopHeaderUlCourse">Course</a></li>
              <li><a href="javascript:void(0)" onclick="showMerchandise(this)" id="shopHeaderUlMerchandise">Merchandise</a></li>
              <li><a href="../login/login.html">Login</a></li>
            </ul>
          </div>
        </div>
        <?php } else {?>
        <div class="shopHeaderTop">
          <div class="shopHeaderTopGrid">
            <div class="shopHeaderTopRight font333">
              <h1><a href="../index.php">Edumaax</a></h1>
            </div>
            <div class="shopHeaderTopLeft">
              <a href=""><img src="../image/personal.png" alt="" /></a>
              <a href="../cart/cart.php"><img src="../image/shoppingCart.png" alt="" /></a>
            </div>
          </div>
        </div>
        <div class="shopHeaderBottom">
          <div class="shopHeaderBottomGrid font333">
            <ul>
              <li><a href="javascript:void(0)" onclick="showCourse(this)" id="shopHeaderUlCourse">Course</a></li>
              <li><a href="javascript:void(0)" onclick="showMerchandise(this)" id="shopHeaderUlMerchandise">Merchandise</a></li>
              <li><a href="../logout/logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
        <?php }?>
        <div class="shopHeaderCourseSlide" id="shopHeaderCourseSlideId" style="display: none">
          <img src="../image/course1.png" alt="" class="courseSlide" />
          <img src="../image/course2.png" alt="" class="courseSlide" />
        </div>
        
        <div class="shopHeaderMerchandiseSlide" id="shopHeaderMerchandiseSlideId" style="display: none">
          <img src="../image/merchandise1.png" alt="" class="merchandiseSlide" />
          <img src="../image/merchandise2.png" alt="" class="merchandiseSlide" />
        </div>
      </header>

      <main class="shopMainContainer">
          
        <div class="shopMainCourseTitleGrid font333" id="shopMainCourseTitleGridId" style="display: none">
          <h1>CPDT COURSES</h1>
        </div> 
        <div class="shopMainCourseListGrid" id="shopMainCourseListGridId" style="display: none">
        <?php
          $join_course_trainer = mysqli_query($db, "SELECT * FROM course INNER JOIN trainer ON course.trainerID=trainer.trainerID ORDER BY `course`.`startDate` DESC");
          while ($course = mysqli_fetch_array($join_course_trainer)){
        ?>
          <div class="shopMainCourseList">
            <a href="./individualCourse.php?courseID=<?php echo $course['courseID']?>">
              <img src="../productUpdate/ProductUpdateImg/<?php echo $course['coursePoster']; ?>" alt="" />
            </a>
            <div class="shopMainCourseName font333" onclick="location.href='./individualCourse.php?courseID=<?php echo $course['courseID']?>'">
              <p><?php echo $course['courseName']; ?></p>
            </div>
            <div class="shopMainCoursePeriod font333">
              <p><?php echo $course['startDate']; ?> ~ <?php echo $course['endDate']; ?></p>
            </div>
            <div class="shopMainCourseTrainerFee font333">
              <div class="shopMainCourseTrainerFeeLeft">
                <p><?php echo $course['trainerName']; ?></p>
              </div>
              <div class="shopMainCourseTrainerFeeRight">
                <p>RM <?php echo $course['courseFee']; ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
          
        <div class="shopMainMerchandiseTitleGrid font333" id="shopMainMerchandiseTitleGridId" style="display: none">
          <h1>CPDT MERCHANDISE</h1>
        </div> 
        <div class="shopMainMerchandiseListGrid" id="shopMainMerchandiseListGridId" style="display: none">
        <?php
          $merchandise_load = mysqli_query($db, "SELECT * From merchandise order by merchandiseID desc");
          while ($merchandise = mysqli_fetch_array($merchandise_load)) {
        ?>
          <div class="shopMainMerchandiseList">
            <a href="./individualMerchandise.php?merchandiseID=<?php echo $merchandise['merchandiseID']?>">
              <img src="../productUpdate/ProductUpdateImg/<?php echo $merchandise['merchandisePoster']; ?>" alt="" />
            </a>
            <div class="shopMainMerchandiseName font333" onclick="location.href='./individualMerchandise.php?merchandiseID=<?php echo $merchandise['merchandiseID']?>'">
              <p><?php echo $merchandise['merchandiseName']; ?></p>
            </div>
            <div class="shopMainMerchandisePrice font333">
              <p>RM <?php echo $merchandise['merchandisePrice']; ?></p>
            </div>
          </div>
        <?php } ?>
        </div>

        <div class="slides" id="slidesId">
          <img src="../image/shopMainSlide1.png" alt="" class="slide" />
          <img src="../image/shopMainSlide2.png" alt="" class="slide" />
        </div>
      </main>

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
