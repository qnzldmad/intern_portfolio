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
    <div class="registerFullContainer">
      <header class="registerHeaderContainer">
        <nav class="menu font333">
          <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../shop/shop.php">Shop</a></li>
            <li><a href="../login/login.html">Login</a></li>
          </ul>
        </nav>
      </header>

      <main class="registerMainContainer">
        <div class="registerMainTop">
          <h1>Register</h1>
        </div>

        
        <div class="registerMainBottom">
        <form method="post" action="./postRegister.php" enctype="multipart/form-data" name="registerForm" class="registerForm">
          <div class="registerMainUploadImageGrid">
            <div class="registerFile">
              <label for="file"
                >Choose file to upload Picture (Requirement)</label
              >
              <input
                type="file"
                name="image"
                id="image"
                accept="image/*"
                onchange="setImage(this);"
                required
              />
              <input
                type="hidden"
                name="registerCertificate"
                value="No Certificate"
                required
              />
            </div>
            <div class="registerImageGrid">
              <img id="registerImage" />
            </div>
          </div>
          <div class="registerUsernameGrid">
            <div class="registerUsernameText">
              <p>Username:</p>
            </div>
            <div class="registerUsernameInput">
              <input type="text"name="registerUsername" placeholder="Enter Username"
              id="registerUsername" required" />
            </div>
            <div class="registerUsernameBtn">
              <input
                type="button"
                value="Check Overlap"
                class="btnOverlap"
                onclick="checkUsername();"
                required
              />
            </div>
          </div>
          <div class="registerEmailGrid">
            <div class="registerEmailText">
              <p>E-mail:</p>
            </div>
            <div class="registerEmailInput">
              <input
                type="email"
                name="registerEmail"
                placeholder="Enter Email"
                id="registerEmail"
                required
              />
            </div>
            <div class="registerEmailBtn">
              <input
                type="button"
                value="Check Overlap"
                class="btnOverlap"
                onclick="checkEmail();"
                required
              />
            </div>
          </div>

          <div class="registerPasswordGrid">
            <div class="registerPasswordLeft">
              <p>Password</p>
              <input
                type="password"
                name="registerPassword"
                placeholder="Enter Password"
                id="registerPassword"
                onchange="checkPassword()"
                required
              />
            </div>
            <div class="registerPasswordRight">
              <p>Confirm Password</p>
              <input
                type="password"
                name="Register Confirm Password"
                placeholder="Enter Confirm Password"
                id="registerConfirmPassword"
                onchange="checkPassword()"
                required
              />
            </div>
          </div>

          <div class="registerPasswordCheckGrid">
            <p id="registerPasswordCheck"></p>
          </div>

          <div class="registerNameGrid">
            <div class="registerNameText">
              <p>Full Name:</p>
            </div>
            <div class="registerNameInput">
              <input
                type="text"
                name="registerName"
                placeholder="Enter Full Name"
                required
              />
            </div>
            <div class="emptyForSpace"></div>
          </div>

          <div class="registerPhoneGrid">
            <div class="registerPhoneText">
              <p>Phone:</p>
            </div>
            <div class="registerPhoneInput">
              <input
                type="number"
                name="registerPhone"
                placeholder="Enter Phone Number"
                required
              />
            </div>
            <div class="emptyForSpace"></div>
          </div>

          <div class="registerAddressGrid">
            <div class="registerAddressText">
              <p>Address:</p>
            </div>
            <div class="registerAddressInput">
              <input
                type="text"
                name="registerAddress"
                placeholder="Enter Address"
                required
              />
            </div>
            <div class="emptyForSpace"></div>
          </div>

          <div class="registerPostGrid">
            <div class="registerPostText">
              <p>Post Code:</p>
            </div>
            <div class="registerPostInput">
              <input
                type="number"
                name="registerPost"
                placeholder="Enter Post Code"
                require
              />
            </div>
            <div class="emptyForSpace"></div>
          </div>

          <div class="registerOrganizeGrid">
            <div class="registerOrganizeText">
              <p>Organize:</p>
            </div>
            <div class="registerOrganizeInput">
              <input
                type="text"
                name="registerOrganize"
                placeholder="Enter Organize Name"
                required
              />
            </div>
            <div class="emptyForSpace"></div>
          </div>

          <div class="registerRegisterBtnGrid font333">
            <button type="submit" name="upload">Submit</button>
          </div>
        </form>
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
