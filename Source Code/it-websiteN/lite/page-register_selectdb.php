<?php
include("db/db.php");
// $conn = new mysqli("localhost","root","","itsut_db");
$conn->query("SET NAMES UTF8");

$username = $_POST["username"];

$sql = "SELECT * FROM `M_USER` WHERE `USER_USERNAME` ='$username'";  

$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

if (!$result) 
{                                                          
	$password = $_POST["password"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$gender = $_POST["gender"];
	$branch = $_POST["branch"];
	$advisor = $_POST["advisor"];
	$gpa = $_POST["gpa"];
	$gpax = $_POST["gpax"];
	$email = $_POST["email"];
	$status = $_POST["status"];

// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO M_USER( USER_USERNAME, USER_PASSWORD, USER_FIRSTNAME, USER_LASTNAME, USER_GENDER, USER_GPA, USER_GPAX, USER_EMAIL, USER_STATUS) 
	VALUES ('" .$username."','" .$password."','" .$firstname."','" .$lastname."','" .$gender."','" .$gpa."','" .$gpax."','" .$email."','" .$status."')";

	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
		$sql = "INSERT INTO MAPPING_USER_DATA (USER_ID, BRANCH_ID, ADVISOR_ID, CREATE_DATE, CREATE_BY, UPDATE_DATE, UPDATE_BY)
		VALUES (".$last_id.", ".$branch.", ".$advisor.", SYSDATE(), 'SYSTEM', SYSDATE(), 'SYSTEM')";
		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบ') window.location.href='page-login.php';</script>");
		} else {
			echo ("<script = 'javascript'>alert('ไม่สามารถสมัครสมาชิกได้ กรุณาตรวจสอบข้อมูล!!' . mysqli_error($conn) ) window.location.href='page-login.php';</script>");
		}
	} else {
		echo ("<script = 'javascript'>alert('ไม่สามารถสมัครสมาชิกได้ กรุณาตรวจสอบข้อมูล!!' . mysqli_error($conn) ) window.location.href='page-login.php';</script>");
	}

} 
else 
{
	echo ("	<script = 'javascript'>
				alert('USERNAME มีอยู่ในระบบอยู่แล้ว หากลืมรหัสผ่าน กรุณาติดต่อเจ้าหน้าที่')
				window.location.href='page-registerstudent.php';
			</script>
		");
}

mysqli_close($conn); 

?>