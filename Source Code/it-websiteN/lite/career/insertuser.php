<?php

// Create connection
include("db/db.php");

$session = $_SESSION["USER_STATUS"];
$status = $_REQUEST['status'];

if ($status == "ADMIN") {
	// echo $status;
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
}elseif ($status == "PROFESSOR") {
	// echo $status;
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
}elseif ($status == "PERSONNEL") {
	// echo $status;
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
}else{
	// echo $status;
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$gpa = $_POST["gpa"];
	$gpax = $_POST["gpax"];
}


// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
if ($status == "STUDENT") {
	$sql = "UPDATE M_USER AS USER
	INNER JOIN MAPPING_STUDENT_DATA AS MS_DATA
	ON MS_DATA.STUDENT_ID = USER.USER_ID
	SET
	USER_FIRSTNAME ='" .$firstname."',
	USER_LASTNAME ='" .$lastname."',
	USER_TEL ='" .$tel."',
	USER_GPA ='" .$gpa."',
	USER_GPAX ='" .$gpax."',
	USER_EMAIL ='" .$email."',
	UPDATE_DATE = SYSDATE(),
	UPDATE_BY = '".$session."' WHERE USER_ID=" . $id;
}else{
	$sql = "UPDATE M_USER SET 
	USER_FIRSTNAME ='" .$firstname."',
	USER_LASTNAME ='" .$lastname."',
	USER_TEL ='" .$tel."',
	USER_EMAIL ='" .$email."' WHERE USER_ID=" . $id;
}

//echo $sql;

if (mysqli_query($conn, $sql)) {
	echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
		window.location.href='career-advice.php?career=user_profile';</script>");
} else {
	echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) 
		window.location.href='career-advice.php?career=user_profile';</script>");
}

mysqli_close($conn);


//echo "Connected successfully";


?>
