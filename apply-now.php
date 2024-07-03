<!DOCTYPE html>
<?php 
session_start();
include ('./config.php'); 
?>
<html>
<head>
  <title>Apply Now | Regional Funds Network</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>
<style>
</style>
<body>
  <?php
  // if (isset($_POST['submit'])) {
  //   if ($conn->connect_error) {
  //     die("Connection failed: " . $conn->connect_error);
  //   } else {
  //     // Form submission handling
  //     $code = $_POST['code'];
  //     $errors = array();
  //     $sql = "SELECT ref FROM csv_data WHERE ref='$code' AND status='0'";
  //     $result = $conn->query($sql);
  //     if ($result->num_rows == 0) {
  //       $errors[] = "Invalid code.";
  //     }
  //     if (!empty($errors)) {
  //       echo '<script>
  //       $(document).ready(function() {
  //         $("#myPopup").fadeIn();
  //       });
  //     </script>';
  //   } else {
  //       $successData = array(
  //         'code' => $code
  //       );
  //       $_SESSION['successData'] = $successData;
  //       // header("Location: loan-amount.php");
  //       // exit;
  //       echo '<script>
  //             window.onload = function() {
  //               // similar behavior as an HTTP redirect
  //               window.location.replace("'. BASE_URL."loan-amount.php" .'");
  //            }
  //         </script>';
  //     }
  //   }
  // }
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
            <h2 class="fw-bold mob-pt">Let's get you funded!</h2>
            <p class="text-center">Hi there, here's direct access for you, your family, or your business for any lending need.</p>
          </div>
          </div>
        </div>
      </div>
      <form method="post" action="apply-now-confirm.php" id="apply-form" class="apply-form">
        <div class="row">
          <div class="col-md-6">
            <lable>First Name</lable>
            <input  name="fname" id="fname" type="text"  placeholder="Enter your first name">
          </div>
          <div class="col-md-6">
            <lable>Last Name</lable>
            <input name="lname" id="lname" type="text" placeholder="Enter your last name">
          </div>
          <div class="col-md-6">
            <lable>Phone Number</lable>
            <input  type="text" id="phone" name="phone" placeholder="Enter your phone number">
          </div>
          <div class="col-md-6">
            <lable>Email Address</lable>
            <input type="text" id="email" name="email" placeholder="Enter your email address">
          </div>
          <div class="col-md-6">
            <lable>Select Loan Purpose</lable>
            <select name="loan-purpose">
              <option disabled  >Choose a category</option>
              <option>Personal</option>
              <option>Business</option>
            </select>
          </div>
          <div class="col-md-6">
            <lable>What loan amount do you want?</lable>
            <input type="text" name="amount" placeholder="Enter amount">
          </div>
          <div class="col-md-6">
            <lable>Estimated Credit Score?</lable>
            <select name="credit-range">
              <option disabled >Choose a credit range</option>
              <option>Personal</option>
              <option>Business</option>
            </select>
          </div>
          <div class="col-md-6">
            <lable>Best Time to Call</lable>
            <input type="time" name="time_to_call" placeholder="Best Time to Call">
          </div>
          <div class="col-md-12 w-70">
            <input type="checkbox" id="" name="agree" value="1" > By checking this box, I agree to be contacted by Regional Funds Network, our Partners and financial institutions via email, postal mail service and/or at the telephone number (s) I have provided above to explore personal loan offers, including contact through automatic dialing systems, artificial or pre-recorded voice messaging, or text message.
          </div>
          <div class="col-md-12">
            <input type="submit" value="Apply Now" class="submit">
            <p class="p-terms">By clicking Apply Now, I confirm that I agree to the <a href="terms-conditions.php">Terms & Conditions.</a></p>
          </div>
        </div>
      </form>
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

      $(document).ready(function () {
            $('#apply-form').validate({
       
                rules: {
                    fname: 'required',
                    lname: 'required',
                    phone: {
                            required: true,
                            phoneUS: true // Custom validation rule for US phone format
                          },
             
                    email: {
                            required: true,
                            email: true
                        },
                    agree:'required',
                   
                },
                messages: {
                    fname: 'Please enter your first name.',
                    lname: 'Please enter your last name.',
                      phone: {
                        required: 'Please enter your phone Number',
                        phoneUS: 'Please enter a valid phone number.'
                    },
                 
                    email: {
                        required: 'Please enter your email address.',
                        email: 'Please enter a valid email address.'
                    },
                 
                },
                submitHandler: function (form) {
                    // Form is valid, submit it here
                    form.submit();
                }
            });
  
$.validator.addMethod("phoneUS", function(phoneNumber, element) {
                phoneNumber = phoneNumber.replace(/\D/g, ''); // Remove non-digits

                // Check if the phone number is exactly 10 digits
                if (phoneNumber.length === 10) {
                    phoneNumber = phoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
                    $(element).val(phoneNumber); // Update the input field with the formatted number
                }

                return this.optional(element) || phoneNumber.length === 14; // Validate formatted number
            }, 'Please enter a valid phone number');


      });
  </script>
</body>
</html>