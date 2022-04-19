<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

// Create connection
$con = mysqli_connect('localhost', 'root', '','db_contact');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get the post records
$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtPhone = $_POST['txtPhone'];
$txtMessage = $_POST['txtMessage'];

// database insert SQL code
$sql = "INSERT INTO `tbl_contact` (`Id`, `fldName`, `fldEmail`, `fldPhone`, `fldMessage`) VALUES ('0', '$txtName', '$txtEmail', '$txtPhone', '$txtMessage')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	header("Location: success.html");
}

$conn->close();
?>