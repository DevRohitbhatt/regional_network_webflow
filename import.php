<?php include('./config.php');
$fileMimes = array(
    'text/csv',
    'application/csv',
);
$companyName = 'Regional Funds Network';
$target_dir = "assets/csv/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
// if ($imageFileType != "csv") {
//     echo "Sorry, only csv files are allowed.";
//     $uploadOk = 0;
// }
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
//     // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
//         echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }
// Validate selected file is a CSV file or not
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {
        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($target_dir . basename($_FILES["file"]["name"]), 'r');
        $filename = $_FILES['file']['name'];
        session_start();
        $importfile = array(
            'filename' => basename($_FILES["file"]["name"], '.csv')
        );
        $_SESSION['importfile'] = $importfile;
        // Skip the first line
        fgetcsv($csvFile);
        function generatePattern($length)
        {
            $result = '';
            $result = 'RN';
            // Generate the first letter (alphabet character)
            $result .= chr(rand(65, 90)); // ASCII values for uppercase alphabets A-Z
            // Generate the rest of the sequence (numeric characters)
            for ($i = 1; $i < $length; $i++) {
                $result .= rand(0, 9);
            }
            return $result;
        }
        // Parse data from CSV file line by line        
        $values = array();
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
            if (!empty($getData[2])) {
                // Get row data
                $purl = $getData[0];
                $first = $getData[2];
                $first = str_replace("'", "`", $first);
                $middle = $getData[3];
                $middle = str_replace("'", "`", $middle);
                $last = $getData[4];
                $last = str_replace("'", "`", $last);
                $city = $getData[5];
                $st = $getData[6];
                $zip = $getData[7];
                $address = $getData[8];
                $address = str_replace("'", "`", $address);
                $ssn = $getData[9];
                $dob = $getData[10];
                $fico = $getData[11];
                $phone = $getData[12];
                $debt = $getData[13];
                $bytes = random_bytes(7);
                // $ref = bin2hex($bytes);
                $company = str_replace("'", "`", $companyName);
                $ref = generatePattern(7);
                $ref_url = BASE_URL . $ref;
                $created_at = date('Y-m-d');
                // $sql = "INSERT INTO csv_data (purl,ref,first,middle, last,address,city,st,zip,ssn,dob,phone,debt,fico,created_at) VALUES ('$purl','$ref','$first','$middle' ,'$last', '$address','$city','$st', '$zip','$ssn' ,'$dob', '$phone','$debt' ,'$fico','$created_at')";
                $values[] = "('$purl','$ref','$ref_url','$company','$first','$middle' ,'$last', '$address','$city','$st', '$zip','$ssn' ,'$dob', '$phone','$debt' ,'$fico','$created_at')";
                if (count($values) == 2000) {
                    $sql = "INSERT INTO csv_data (purl,ref,ref_url,company,first,middle, last,address,city,st,zip,ssn,dob,phone,debt,fico,created_at) VALUES " . implode(',', $values);
                    $conn->query($sql);
                    $values = array();
                }
            }
        }
        if (count($values)) {
            $sql = "INSERT INTO csv_data (purl,ref,ref_url,company,first,middle, last,address,city,st,zip,ssn,dob,phone,debt,fico,created_at) VALUES " . implode(',', $values);
            $conn->query($sql);
        }
        $upload = 'ok';
        // Close opened CSV file
        fclose($csvFile);
        // header("Location: index.html");
    } else {
        $upload = "err";
    }
    $conn->close();
}
echo $upload;
