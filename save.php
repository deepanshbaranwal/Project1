<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angularDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$data=json_decode(file_get_contents("php://input"));
$usrname = mysql_real_escape_string($data->username);
$upswd = mysql_real_escape_string($data->password);
$uemail = mysql_real_escape_string($data->email);
$uaddr = mysql_real_escape_string($data->address);
$sql = "INSERT INTO user(`username`, `password`, `email`,`address`)
VALUES ('$usrname', '$upswd', '$uemail', '$uaddr')";

if ($conn->query($sql) === TRUE) {
    $msg="New record created successfully";
    $data=json_encode($msg);
    print($data);
} else {
    $msg="Error: " . $sql . "<br>" . $conn->error;
    json_encode($msg);
    $data=json_encode($msg);
    print($data);
}

$conn->close();
?> 