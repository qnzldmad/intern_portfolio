
<?php include "./connectDB/connectDB.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="indexFullContainer">
      <header class="headerContainer">
        <?php if(!isset($_SESSION['loginUsername'])){?>
        <nav class="menu font333">
          <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./shop/shop.php">Shop</a></li>
            <li><a href="./login/login.html">Login</a></li>
          </ul>
        </nav>
        <?php } else {?>
        <nav class="menu font333">
          <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./shop/shop.php">Shop</a></li>
            <li><a href="./logout/logout.php">Logout</a></li>
          </ul>
        </nav>
        <?php }?>

        <div class="banner">
          <div class="bannerGrid font333">
            <p>
              Centre for Professional Development and Training<br />
              (CPDT)
            </p>
          </div>
        </div>
      </header>

      <main class="mainContainer">
        <div class="mainRight">
          <div class="mainRightGrid font333">
            <h1>WELCOME TO IMPERIUM EDUMAAX SDN BHD</h1>
            <p>
              Imperium Edumaax Centre for Professional Development and Training
              or better known as CPDT was developed to ensure that employees
              within the Malaysian workforce are given the opportunity to keep
              learning new skills and acquire new knowledge to live and work
              more productively and effectively. <br /><br />
              Furthermore, trainings have been said to increase job satisfaction
              and increase morale among employees resulting in an increase in
              employee motivation, efficacies in processes that delivers
              substantial financial gain and increased capacity to adopt new
              technologies and methods. <br /><br />
              We believe that introducing CPDT will be beneficial to employees
              as trainings have been proven to improve employee retention,
              growth, career development, build self-esteem and most importantly
              to sharpen your confidence in both your personal and professional
              life. Training boosts a feeling of value in employees, and it
              shows that you as an organization are committed in providing the
              resources needed to ensure that each one of your employees are
              doing a good job.<br /><br />
            </p>
            <p style="font-weight: bold">Anne Rajasaikaran<br /><br /></p>
            <p>CEO Imperium Edumaax Sdn Bhd</p>
          </div>
        </div>
        <div class="mainLeft">
          <img src="./image/mainCeo.PNG" alt="" />
        </div>
      </main>

      <footer class="footerContainer">
        <div class="footerGrid font333">
          <p>Copyright ⓒ 2021 Imperium Edumaax Sdn Bhd</p>
          <p>Powered By Kayaum Company</p>
        </div>
      </footer>
    </div>
    <script src="script.js"></script>
  </body>
</html>
