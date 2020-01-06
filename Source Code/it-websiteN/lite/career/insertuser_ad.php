<?php

// Create connection
include("db/db.php");

$session = $_SESSION["USER_STATUS"]; 
$status = $_REQUEST['status'];

if ($status == "ADMIN") {
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$gender = $_POST["gender"];
}elseif ($status == "PROFESSOR") {
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$gender = $_POST["gender"];
}elseif ($status == "PERSONNEL") {
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$gender = $_POST["gender"];
}else{
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$gender = $_POST["gender"];
	$advisors = $_POST["advisors"];
	$gpa = $_POST["gpa"];
	$gpax = $_POST["gpax"];
	$branch = $_POST["branch"];
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
	USER_GENDER ='" .$gender."',
	USER_TEL ='" .$tel."',
	ADVISOR_ID ='" .$advisors."',
	BRANCH_ID ='".$branch."',
	USER_GPA ='" .$gpa."',
	USER_GPAX ='" .$gpax."',
	USER_EMAIL ='" .$email."',
	UPDATE_DATE = SYSDATE(),
	UPDATE_BY = '".$session."' WHERE USER_ID=" . $id;
}else{
	$sql = "UPDATE M_USER 
	INNER JOIN SET 
	USER_FIRSTNAME ='" .$firstname."',
	USER_LASTNAME ='" .$lastname."',
	USER_GENDER ='" .$gender."',
	USER_TEL ='" .$tel."',
	USER_EMAIL ='" .$email."' WHERE USER_ID=" . $id;
}



if (mysqli_query($conn, $sql)) {
	echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
		window.location.href='career-advice.php?career=tables_user';</script>");
} else {
	echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) 
		window.location.href='career-advice.php?career=tables_user';</script>");
}

mysqli_close($conn);


//echo "Connected successfully";


?>
