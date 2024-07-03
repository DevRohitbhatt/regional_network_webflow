<?php include('./config.php');



if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
} else {



    $today = date('Y-m-d');



    // $sql2 = "SELECT * FROM csv_data WHERE created_at = '$today'";



    // $result = $conn->query($sql2);



    // if ($result->num_rows > 0) {



    //     // output data of each row



    //     while ($row = $result->fetch_assoc()) {



    //         echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";



    //     }



    // } else {



    //     echo "0 results";



    // }



    // print_r($result);



    // exit;





    session_start();



    $importfile = $_SESSION['importfile'];

    if (isset($importfile)) {

        $filename = $importfile['filename'];
    }

    header('Content-Type: text/csv; charset=utf-8');



    header('Content-Disposition: attachment; filename=' . $filename . '-' . date('m-d-y') . '.csv');

    // header('Content-Disposition: attachment; filename=data.csv');

    $output = fopen("php://output", "w");



    fputcsv($output, array('PURL', 'REF', 'COMPANY', 'FIRST', 'MIDDLE', 'LAST',  'CITY', 'ST', 'ZIP', 'ADDRESS', 'SSN', 'DOB', 'FICO', 'PHONE', 'Debt', 'REF_URL'));



    $today = date('Y-m-d');



    $sql2 = "SELECT * FROM csv_data WHERE created_at = '$today'";



    $result = $conn->query($sql2);



    while ($row = mysqli_fetch_assoc($result)) {



        $lineData = array($row['purl'], $row['ref'], $row['company'], $row['first'], $row['middle'], $row['last'],  $row['city'], $row['st'], $row['zip'], $row['address'], $row['ssn'], $row['dob'], $row['fico'], $row['phone'], $row['debt'], $row['ref_url']);



        fputcsv($output, $lineData);
    }



    fclose($output);
}



header("refresh:5;url=" . "logout.php");

exit;
