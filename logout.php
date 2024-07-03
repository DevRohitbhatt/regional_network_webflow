<?php

session_start();



include('./config.php');

session_unset();

session_destroy();



// echo 'You have cleaned session';

// header("Location: ".BASE_URL."index.php");

// exit();

?>



<!DOCTYPE html>

<html>

<head>

  <title>One Partner Advantage</title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/style.css">

  <script>
    window.onload = function() {

      // similar behavior as an HTTP redirect

      window.location.replace("<?php echo "index.php"; ?>");

    }
  </script>

</head>

<body>





  <script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>



</body>

</html>