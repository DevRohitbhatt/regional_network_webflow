<!DOCTYPE html>
<?php 
session_start();
include ('./config.php'); 
?>
<html>
<head>
  <title>Terms | Regional Funds Network</title>
 <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
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
                window.location.replace("'. BASE_URL."loan-amount.php" .'");
             }
          </script>';
      }
    }
  }
  ?>
  <div class="banner">
    <div class="container">
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
        <div class="col-md-12">
          <div class="">
          <div class=" text-head">
            <h2 class="fw-bold mob-pt">Terms & Conditions</h2>
            <p>* This website regionalfundsnetwork.com is owned and operated by Regional Funds Network. This offer is for an unsecured, closed-end personal loan by a participating lender through Regional Funds Network. Loan amounts and loan terms may vary depending upon borrower creditworthiness, verification of credit, and other criteria. Loan amounts range from $2,500 to $100,000 and interest rates range from 7.99% to 34.5%. Not all consumers who apply will qualify for the maximum loan amount or the lowest interest rate, which are not available through all participating lenders and generally require excellent credit.</p>
            <p>Important Information and Terms and Conditions for This Offer: Regional Funds Network may be unable to extend credit if, after you respond to this offer, the lender determines that you no longer meet the criteria used to select you for this offer. This offer may be accepted only by the person applying. Regional Funds Network may request verification of income and employment from your employer(s), and your credit report to verify your credit and identity. Upon request, you will be informed of the name and address of the credit bureau furnishing such report. Self-employed or commissioned applicants may be asked for the past two years of income tax filings. Alimony, child support or separate maintenance income need not be disclosed if you do not wish us to consider it as a basis for repayment. If your response is received after the expiration date, or if the name and address differ from the information you provide to us, we will treat your response as an application for credit that was not prescreened. Duplicate offers and acceptances are void. This service and qualified participating lenders are not available in all states. After your response to this offer has been forwarded to a participating lender, any questions or concerns should be directed to the participating lender. Participating lenders may perform additional credit checks with consumer reporting agencies or other third-parties. This service does not constitute an offer or solicitation for loan products which are prohibited by any state law. This service and offer are void where prohibited.</p>
            <p>Credit Certification and Authorization: Regional Funds Network is a lender and also provides loan referral services. Loans are not available in all states. In Alabama, Arizona, California, Colorado, District of Columbia, Florida, Idaho, Illinois, Iowa, Kansas, Louisiana, Maine, Maryland, Michigan, Missouri, Montana, New Hampshire, New Jersey, New Mexico, North Carolina, North Dakota, Ohio, Oklahoma, Pennsylvania, Rhode Island, South Carolina, South Dakota, Tennessee, Texas, Utah, Washington, Wisconsin and Wyoming personal loans are provided by Regional Funds Network, a licensed lender. In Alaska, Arkansas, Kentucky, Massachusetts, Nebraska, and New York personal loans are issued by Regional Funds Network, governed under state permitted usury laws. In the state of Indiana your personal loan will be fulfilled via our preferred network of third-party lenders. Your loan agreement will clearly identify the lender. For detailed information concerning Regional Funds Network’s licensing information please visit www.regionalfundsnetwork.com/terms-of-use. Interest rates may vary. Loan terms range from 24–60 months. Interest rates range from 7.99% to 34.5% (10.18% and 37.36% APR). A loan origination Fee of 1.99%-4.99% of the loan amount may apply where permitted by law. There is no down payment and there is never a pre-payment penalty.</p>
          </div>
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
        <div class="col-md-6 ">
          <img src="img/logo2.png" class="footer-logo">
        </div>
        <div class="col-md-6 footer-left">
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