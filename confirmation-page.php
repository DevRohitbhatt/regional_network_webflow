<?php

$redirect = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  include('./config.php');

  $first_name = $_POST['first_name'];

  $last_name = $_POST['last_name'];

  $email = $_POST['email'];

  $phone = $_POST['phone'];

  $state = $_POST['state'];

  $city = $_POST['city'];

  $zip = $_POST['zip'];

  $address = $_POST['address'];

  $code = $_POST['code'];

  $ssn = $_POST['ssn'];

  $dob = $_POST['dob'];

  $debt = $_POST['debt'];

  $income = $_POST['income'];

  $date_to_call = $_POST['date_to_call'];

  $time_to_call = $_POST['time_to_call'];

  $newtime = $time_to_call . ":00";

  $form_data =     array(



    "FirstName" => $first_name,



    "LastName" => $last_name,



    "Email" => $email,



    "State" => $state,



    "City" => $city,



    "PhoneNumber" => $phone,



    "ZipCode" => $zip,



    "BestDateToCall" => $date_to_call,



    "BestTimeToCall" => $newtime,



    "RefCode" => $code,



    "Income" => $income,



    "Address" => $address,



    "DOB" => $dob,



    "SSN" => $ssn,



    "Debt" => $debt,



  );

  $curl = curl_init();

  curl_setopt_array($curl, array(

    CURLOPT_URL => 'https://client.debtpaypro.com/post/aeb8753da96342d3cc5aa804b234c74285a55907/',
    //CURLOPT_URL => 'https://client.debtpaypro.com/post/28ffc72d8267d6f670e3b345fa47a36d4e2b7218/', //Purl Mailer CR1f 

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_ENCODING => '',

    CURLOPT_MAXREDIRS => 10,

    CURLOPT_TIMEOUT => 0,

    CURLOPT_FOLLOWLOCATION => true,

    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

    CURLOPT_CUSTOMREQUEST => 'POST',

    CURLOPT_POSTFIELDS => $form_data,

  ));

  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);



  $response = curl_exec($curl);



  curl_close($curl);

  // echo $response;



  if (isset($response) && strpos($response, 'Success') !== false) {

    $sql = "UPDATE  csv_data SET status='1' WHERE ref='$code'";

    $conn->query($sql);
  }



  session_start();

  session_destroy();

  $redirect = true;



  // header("Location: ".BASE_URL."confirmation-page.php");

  // exit;



}



?>



<!DOCTYPE html>

<html>



<head>

  <title>Confirmation | Regional Funds Network</title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/style.css">


  <script>
    if (<?php echo $redirect; ?>) {

      window.onload = function() {

        // similar behavior as an HTTP redirect

        window.location.replace("<?php echo "confirmation-page.php"; ?>");

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

            <h2>Regional Funds Network</h2>

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