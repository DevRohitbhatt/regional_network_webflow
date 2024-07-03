<?php
session_start();
include('./config.php');
// if (session_status() == PHP_SESSION_ACTIVE) {
//   echo 'Session is active';
// } 
//     print_r($_SESSION);
//     die;
if (isset($_SESSION['successData']['access_code'])) {
  if ($_SESSION['successData']['access_code'] != ACCESS_KEY) {
    header("Location: " . "login.php");
    exit;
  }
} else {
  header("Location: " . "login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Upload | Regional Funds Network</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="banner img-3">
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
        <div class="col-md-7">
          <div class="banner-right">
            <img src="img/page-5-img.jpg" class="img-fluid mob-image">
          </div>
        </div>
        <div class="col-md-5">
          <div class="banner-left">
            <div class="text-head">
              <h2>Upload CSV</h2>
            </div>
            <div class="box-amount">
              <form class="form-horizontal" action="import.php" method="post" id="uploadForm" name="upload_excel" enctype="multipart/form-data">
                <fieldset>
                  <!-- Form Name -->
                  <legend></legend>
                  <!-- File Button -->
                  <div class="form-group">
                    <div class="col-md-4">
                      <input type="file" name="file" id="fileInput" required class="input-large">
                    </div>
                  </div>
                  <!-- Button -->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                      <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                    </div>
                  </div>
                </fieldset>
              </form>
              <div class="progress">
                <div class="progress-bar"></div>
              </div>
              <div id="uploadStatus"></div>
            </div>
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
  <div id="myPopup" class="popup">
    <div class="popup-content">
      <span id="closePopup" class="close">&times;</span>
      <h3></h3>
      <p><img src="img/invalid.png" class="invalid-icon"> Please provide a valid file (csv).</p>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    // $(document).ready(function() {
    //   $(document).on("click", ".get-started-btn", function() {
    //     var form = $(this).closest("form");
    //     //console.log(form);
    //     form.submit();
    //   });
    // });
  </script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    // File upload via Ajax
    $("#uploadForm").on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
              var percentComplete = ((evt.loaded / evt.total) * 100);
              percentComplete = parseFloat(percentComplete).toFixed(2);
              $(".progress-bar").width(percentComplete + '%');
              $(".progress-bar").html(percentComplete + '%');
            }
          }, false);
          return xhr;
        },
        type: 'POST',
        url: 'import.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $(".progress-bar").width('0%');
          $('#uploadStatus').html('<p>Upload in progress.</p>');
        },
        error: function() {
          $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
        },
        success: function(resp) {
          if (resp == 'ok') {
            $('#uploadForm')[0].reset();
            $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p><a target="_blank" class="get-started-btn" onclick="redirectPage()" href="download.php">Click To Download</a>');
          } else if (resp == 'err') {
            $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
          }
        }
      });
    });
    $('#closePopup').click(function() {
      $('#myPopup').fadeOut();
    });
    // File type validation
    $("#fileInput").change(function() {
      var allowedTypes = ['text/csv', 'application/csv', ];
      var file = this.files[0];
      var fileType = file.type;
      if (!allowedTypes.includes(fileType)) {
        // alert('Please select a valid file (csv).');
        $(document).ready(function() {
          $("#myPopup").fadeIn();
        });
        $("#fileInput").val('');
        return false;
      }
    });
  });

  function redirectPage() {
    setTimeout(function() {
      redirectTo();
    }, 5000);
  }

  function redirectTo() {
    console.log('trigger click');
    window.location.href = "<?= 'logout.php' ?>";
  }
</script>

</html>