<?php

// Create connection
include("db/db.php"); 
$status = $_REQUEST['status'];

if ($status == "admin") {
	// echo $status;
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$sex = $_POST["sex"];
}elseif ($status == "professor") {
	// echo $status;
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$sex = $_POST["sex"];
}elseif ($status == "personnel") {
	// echo $status;
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$sex = $_POST["sex"];
}else{
	// echo $status;
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$sex = $_POST["sex"];
	$advisors = $_POST["advisors"];
	$gpa = $_POST["gpa"];
	$gpax = $_POST["gpax"];
}


// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
if ($status == "student") {
	$sql = "UPDATE `customer` SET 
	`firstname`='" .$firstname."',
	`lastname`='" .$lastname."',
	`sex`='" .$sex."',
	`advisors`='" .$advisors."',
	`gpa`='" .$gpa."',
	`gpax`='" .$gpax."',
	`email`='" .$email."'WHERE id=" . $id;
}else{
	$sql = "UPDATE `customer` SET 
	`firstname`='" .$firstname."',
	`lastname`='" .$lastname."',
	`sex`='" .$sex."',
	`email`='" .$email."'WHERE id=" . $id;
}


if (mysqli_query($conn, $sql)) {
	echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
		window.location.href='career-advice.php?career=user_profile&".$id."';</script>");
} else {
	echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php?career=tables_user';</script>");
}

mysqli_close($conn);


//echo "Connected successfully";


?>
