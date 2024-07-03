<?php
include('./config.php');
session_start();
$successData = $_SESSION['successData'];
if (!isset($successData['code'])) {
  header("Location: " . "index.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Loan Form | Regional Funds Network</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    span.check-text {
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="banner img-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 text-left">
          <a href="index.php"><img src="img/Logo credit.png" class="logo"></a>
        </div>
        <div class="col-md-3">
          <div class="phone-div">
            <a href="tel:855-574-1082" class="phone-btn"><img src="img/phone-icon.png"> 855-574-1082
            </a>
            <p>Click here to connect with a representative<br> immediately. Se Habla Espanol</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="banner-left margin-top-0">
            <div class="text-head">
              <h2>We put you first.</h2>
              <h3>Get your fresh start with Regional Funds Network.</h3>
            </div>
            <form class="manageform" action="confirmation-page.php" onsubmit="return validateForm()" method="post">
              <?php if (isset($_POST)) {
                $row = array();
                $errors = array();
                $code = isset($successData['code']) ? $successData['code'] : null;
                if (isset($code) && $code != '') {
                  $sql = "SELECT * FROM csv_data WHERE ref='$code'";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  if ($result->num_rows == 0) {
                    $errors[] = "Invalid code.";
                  }
                }
              ?>
                <input required type="hidden" name="code" value="<?= isset($successData['code']) ? $successData['code'] : '' ?> " />
                <input required type="hidden" name="address" value="<?= isset($row['address']) ? $row['address'] : '' ?> " />
                <input required type="hidden" name="ssn" value="<?= isset($row['ssn']) ? $row['ssn'] : '' ?> " />
                <input required type="hidden" name="dob" value="<?= isset($row['dob']) ? $row['dob'] : '' ?> " />
                <input required type="hidden" name="debt" value="<?= isset($row['debt']) ? $row['debt'] : '' ?> " />
                <input required type="hidden" name="income" value="<?= isset($_POST['income']) ? $_POST['income'] : '' ?>" />
              <?php } ?>
              <div class="row">
                <div class="col-md-6 left-right">
                  <label>First name</label>
                  <input required type="text" name="first_name" value="<?= isset($row['first']) ? $row['first'] : '' ?>" class="form-control form-control-lg" placeholder="First name">
                </div>
                <div class="col-md-6 left-right">
                  <label>Last name</label>
                  <input required type="text" name="last_name" value="<?= isset($row['last']) ? $row['last'] : '' ?>" class="form-control form-control-lg" placeholder="Last name">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 left-right">
                  <label>Cell Phone</label>
                  <input required type="text" name="phone" value="<?= (isset($row['phone'])  && $row['phone'] != '0' && $row['phone'] != '') ? $row['phone'] : '' ?>" class="form-control form-control-lg" placeholder="Cell Phone" minlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
                <div class="col-md-6 left-right">
                  <label>Email</label>
                  <input required type="Email" name="email" value="<?= isset($row['email']) ? $row['email'] : '' ?>" class="form-control form-control-lg" placeholder="Email">
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 left-right">
                  <label>State</label>
                  <input required type="text" name="state" value="<?= isset($row['st']) ? $row['st'] : '' ?>" class="form-control form-control-lg" placeholder="State">
                </div>
                <div class="col-md-4 left-right">
                  <label>City</label>
                  <input required type="text" name="city" value="<?= isset($row['city']) ? $row['city'] : '' ?>" class="form-control form-control-lg" placeholder="City">
                </div>
                <div class="col-md-4 left-right">
                  <label>Zip Code</label>
                  <input required type="text" name="zip" value="<?= isset($row['zip']) ? $row['zip'] : '' ?>" class="form-control form-control-lg" placeholder="Zip Code">
                </div>
              </div>
              <!-- <div class="row">
                    <div class="col-md-6 left-right">
                      <label>Zip Code</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Zip Code">
                    </div>
                    <div class="col-md-6 left-right">
                      <label>Refcode</label>
                      <input type="Email" class="form-control form-control-lg" placeholder="Refcode">
                    </div>
                  </div> -->
              <div class="row">
                <div class="col-md-6 left-right">
                  <label>Best Date to Call</label>
                  <input type="date" name="date_to_call" class="form-control form-control-lg" placeholder="Best Date to Call" min="<?php echo date("Y-m-d") ?>">
                </div>
                <div class="col-md-6 left-right">
                  <label>Best time to Call</label>
                  <input type="time" name="time_to_call" class="form-control form-control-lg" placeholder="Best time to Call">
                </div>
              </div>
              <!-- <div class="row">
                  <div class="col-md-12 left-right">
                    <label>Address</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Address"></textarea>
                  </div>
                </div> -->
              <div class="row">
                <div class="col-md-12 left-right">
                  <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked required> <span class="check-text">Check this box to agree to receive text messages from Regional Funds Network. Msg freq varies. Msg & data rates may apply. Reply STOP to stop, HELP for help. Terms&privacy: <a href="terms-conditions.php" target="_blank">View terms of use</a></span>
                  <button type="submit" id="submitButton" class="btn btn-primary" style="margin-top: 30px;">Continue</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="banner-right">
            <img src="img/tab.jpg" class="img-fluid mob-image">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="img/logo2.png" class="footer-logo">
        </div>
        <div class="col-md-6 footer-left">
          <div class="footer-head">
            <h2>Activate your loan with us today.</h2>
            <h3>Call 855-574-1082 to expedite your loan.</h3>
          </div>
          <p>Your information is safe. The safety of your personal information is very important to us. <br>All of the information you provide is kept in strict confidence.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    function validateForm() {
      $('#submitButton').attr("disabled", true);
    }
  </script>
</body>

</html>