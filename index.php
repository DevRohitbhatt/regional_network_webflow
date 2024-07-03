<!DOCTYPE html>
<?php
session_start();
include('./config.php');

?>
<html>

<head>
  <title>Regional Funds Network</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/0cf64878b1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
</style>

<body>
  <?php
  if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle)
    {
      return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
  }
  $REQUEST_URI = str_replace('/', '', $_SERVER['REQUEST_URI']);
  if (isset($REQUEST_URI) &&  !str_contains($REQUEST_URI, 'index.php') && str_contains($REQUEST_URI, 'RN')) {
    $errors = array();
    $sql = "SELECT ref FROM csv_data WHERE ref='$REQUEST_URI' AND status='0'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows == 0) {
      $errors[] = "Invalid code.";
      echo '<script>
          $(document).ready(function() {
            $("#myPopup").fadeIn();
          });
        </script>';
    } else {
      $successData = array(
        'code' => $row['ref']
      );
      $_SESSION['successData'] = $successData;
      echo '<script>
        window.onload = function() {
          // similar behavior as an HTTP redirect
          window.location.replace("' . "loan-amount.php" . '");
        }
        </script>';
    }
  }
  if (isset($_POST['submit'])) {
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else {
      // Form submission handling
      $code = $_POST['code'];
      $errors = array();
      $sql = "SELECT ref FROM csv_data WHERE ref='$code' AND status='0'";
      $result = $conn->query($sql);
      if ($result->num_rows == 0) {
        $errors[] = "Invalid code.";
      }
      if (!empty($errors)) {
        echo '<script>
        $(document).ready(function() {
          $("#myPopup").fadeIn();
        });
      </script>';
      } else {
        $successData = array(
          'code' => $code
        );
        $_SESSION['successData'] = $successData;
        // header("Location: loan-amount.php");
        // exit;
        echo '<script>
              window.onload = function() {
                // similar behavior as an HTTP redirect
                window.location.replace("' . "loan-amount.php" . '");
             }
          </script>';
      }
    }
  }
  ?>
  <div class="banner img-1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 text-left">
          <a href="index.php"><img src="img/Logo credit.png" class="logo"></a>

        </div>
        <div class="col-md-2 funded-box">
          <div class="funded-main">
            <a class="funded" href="apply-now.php">Apply Now</a>
          </div>
        </div>
        <div class="col-md-2">

          <div class="phone-div">
            <a href="tel:855-574-1082" class="phone-btn"><img src="img/phone-icon.png"> 855-574-1082 </a>
            <p>Click here to connect with a representative<br> immediately. Se Habla Espanol</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="banner-left mt-5">
            <div class=" text-head">
              <h2 class="fw-bold">You’re <br>Pre-approved!</h2>
              <h3 class="p-2">There’s no better time to take control of your financial future.</h3>
            </div>
            <form action="" method="post" class="form-new">
              <input type="text" name="code" placeholder="Enter your access code">
              <!-- <a class="get-started-btn" name="submit" value="submit" href="javascript:void(0)">Get Started</a> -->
              <input type="submit" name="submit" value="Get Started">
              <small><b>If you don't have a reference code, please call 855-574-1082.</b><br>
                <b>This will not affect your credit score.</b></small>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="banner-right">
            <img src="img/family3.jpg" class="img-fluid mob-image">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="myPopup" class="popup">
    <div class="popup-content">
      <span id="closePopup" class="close">&times;</span>
      <h3></h3>
      <p><img src="img/invalid.png" class="invalid-icon"> Invalid code</p>
      <small>If you don't have a reference code, please call 855-574-1082.<br>
        This will not affect your credit score.</small>
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
          <p class="text-center">Your information is safe. The safety of your personal <br>information is very important to us. All of the information you provide is kept in strict confidence.</p>
        </div>
      </div>
    </div>
  </div>
  <script>
    // $(document).ready(function() {
    //   $(document).on("click", ".get-started-btn", function() {
    //     var form = $(this).closest("form");
    //     //console.log(form);
    //     form.submit();
    //   });
    // });
    $('#closePopup').click(function() {
      $('#myPopup').fadeOut();
    });
  </script>
</body>

</html>