<?php 

session_start();

include ('./config.php'); 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ref FROM csv_data ";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

// Check if there are any records
if ($result->num_rows > 0) {
   echo count($row);
   echo 'record exist';
} else {
    echo "No records found";
}

// Close connection
$conn->close();

?>