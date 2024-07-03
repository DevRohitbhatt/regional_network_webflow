<?php

  $redirect = false;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  include('./config.php');
 
  $first_name = $_POST['fname'];

  $last_name = $_POST['lname'];

  $email = $_POST['email'];

  $phone = $_POST['phone'];

  $loan_purpose = $_POST['loan-purpose'];

  $amount = $_POST['amount'];

  $credit_range = $_POST['credit-range'];

  $time_to_call = $_POST['time_to_call'];

  $I_agree = $_POST['agree'];
   $sql = "INSERT INTO apply_now_form (first_name, last_name, email,phone,loan_purpose,amount,credit_range,time_to_call,aggrement) VALUES ('$first_name', '$last_name', '$email','$phone','$loan_purpose','$amount','$credit_range','$time_to_call','$I_agree')";
  
 $conn->query($sql);


  }



  ?>



<!DOCTYPE html>

<html>



<head>

<title>Confirmation | American 1st Funds</title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/style.css">


<script>
    

    if(<?php echo $redirect;?>){

      window.onload = function() {

          // similar behavior as an HTTP redirect

          window.location.replace("<?php echo BASE_URL."apply-now-confirm.php";?>");

      }

    }

</script>



</head>



<body>


 

  <div class="banner img-6">

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

        <div class="col-md-12 text-head padding-big">

          <h2>We can’t wait to work with you…</h2>

          <h3>an advisor will be contacting you shortly.</h3>

        </div>

        <div class="col-md-2">

        </div>

        <div class="col-md-8">

          <div class="banner-right">

            <img src="img/office work.jpg" class="img-fluid mob-image">

            <!-- <h3>Take advantage of new <br>lending limits</h3> -->

          </div>

        </div>

        <div class="col-md-2">

        </div>



      </div>

    </div>

  </div>

  <div class="footer">

    <div class="container">

      <div class="row">

        <div class="col-md-6 ">

          <img src="img/logo2.png" class="footer-logo">

        </div>

        <div class="col-md-6 footer-left">

          <div class="footer-head">

            <h2>American 1st Funds</h2> 

            <h3>Call 855-574-1082 to expedite your loan.</h3>

          </div>

          <p>Your information is safe. The safety of your personal information is very important to us. <br>All of the information you provide is kept in strict confidence.</p>

        </div>

      </div>

    </div>

  </div>

  <script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

</body>



</html>