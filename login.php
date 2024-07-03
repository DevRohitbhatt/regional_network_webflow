<?php
session_start();
include('./config.php');
$redirect = false;
if (isset($_SESSION['successData']['access_code'])) {
  if ($_SESSION['successData']['access_code'] == ACCESS_KEY) {
    $redirect = true;
  }
}
$error = '';
if (isset($_POST['code']) && $_POST['code'] != '') {
  if (ACCESS_KEY == $_POST['code']) {
    $successData = array(
      'access_code' => $_POST['code']
    );
    $_SESSION['successData'] = $successData;
    $redirect = true;
    // print_r($_SESSION);
    // die;
    // header("Location: ".BASE_URL."upload.php");
    // exit;
  } else {
    $error = 'invalid code, please enter a valid code';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login | Regional Funds Network</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script>
    if (<?php echo $redirect; ?>) {
      window.onload = function() {
        // similar behavior as an HTTP redirect
        window.location.replace("<?php echo "upload.php"; ?>");
      }
    }
  </script>
</head>

<body>
  <div class="top-logo">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="img/Logo credit.png" style="margin-top: 30px;">
        </div>
      </div>
    </div>
  </div>
  <div class="banner-login img-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="login-box">
            <h2>Enter your key!</h2>
            <p>Please enter your unique key to access further!</p>
            <form action="<?= 'login.php' ?>" method="POST">
              <input type="text" name="code" value="<?= isset($_POST['code']) ? $_POST['code'] : '' ?>" placeholder="Enter key" required>
              <p class="text-danger my-1" style="text-align: start;"><?= isset($error) ? $error : '' ?></p>
              <!-- <a class="login-btn" href="#" >Get Access</a> -->
              <button class="custom-login-btn" type="submit" value="Submit">Get Access</button>
              <a href="index.php" class="back-home"><small><b>Back to Home ></b></small></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <img src="img/logo2.png" class="footer-logo">
        </div>
        <div class="col-md-5 footer-left">
          <div class="phone-div-footer">
            <a href="tel:855-574-1082" class="phone-btn"><img src="img/phone-icon-white.png">Click to speak to a
              <b>LIVE AGENT</b></a>
          </div>
          <p class="text-center">Your information is safe. The safety of your personal information is very important to us. All of the information you provide is kept in strict confidence.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>