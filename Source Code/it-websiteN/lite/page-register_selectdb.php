<?php
include("db/db.php");
// $conn = new mysqli("localhost","root","","itsut_db");
$conn->query("SET NAMES UTF8");

$username = $_REQUEST["username"];

$sql = "SELECT * FROM `M_USER` WHERE `USER_USERNAME` =" . $username;

$query = mysqli_query($conn, $sql);
// $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));

if (!$query) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$gender = $_POST["gender"];
	if (isset($_POST["branch"])) {
		$branch = $_POST["branch"];
		$advisor = $_POST["advisor"];
		$gpa = $_POST["gpa"];
		$gpax = $_POST["gpax"];
	}
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$status = $_POST["status"];


	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}


	if (isset($_POST["branch"])) {
		$sql = "INSERT INTO M_USER(USER_USERNAME, USER_PASSWORD, USER_FIRSTNAME, USER_LASTNAME, USER_GENDER, USER_GPA, USER_GPAX, USER_TEL, USER_EMAIL, USER_STATUS) 
		VALUES ('" . $username . "','" . $password . "','" . $firstname . "','" . $lastname . "','" . $gender . "','" . $gpa . "','" . $gpax . "', '" . $tel . "','" . $email . "','" . $status . "')";

		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
			$sql = "INSERT INTO MAPPING_STUDENT_DATA (STUDENT_ID, BRANCH_ID, ADVISOR_ID, CREATE_DATE, CREATE_BY, UPDATE_DATE, UPDATE_BY)
			VALUES (" . $last_id . ", " . $branch . ", " . $advisor . ", SYSDATE(), 'SYSTEM', SYSDATE(), 'SYSTEM')";
			if (mysqli_query($conn, $sql)) {
				echo ("<script = 'javascript'>alert('เพิ่มข้อมูลสำเร็จ กรุณาเข้าสู่ระบบ') window.location.href='page-login.php';</script>");
			} else {
				echo ("<script = 'javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้ กรุณาตรวจสอบข้อมูล!!' . mysqli_error($conn) ) window.location.href='page-login.php';</script>");
			}
		} else {
			echo ("<script = 'javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้ กรุณาตรวจสอบข้อมูล!!' . mysqli_error($conn) ) window.location.href='page-registerstudent.php';</script>");
		}
	} else {
		$sql = "INSERT INTO M_USER (USER_USERNAME, USER_PASSWORD, USER_FIRSTNAME, USER_LASTNAME, USER_GENDER, USER_TEL,USER_EMAIL, USER_STATUS)
			VALUES ('" . $username . "','" . $password . "','" . $firstname . "','" . $lastname . "','" . $gender . "', '" . $tel . "','" . $email . "','" . $status . "')";

		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('เพิ่มข้อมูลสำเร็จ') window.location.href='career-advice.php?career=tables_user';</script>");
		} else {
			echo ("<script = 'javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้ กรุณาตรวจสอบข้อมูล!!' . mysqli_error($conn) ) window.location.href='page-register.php';</script>");
		}
	}
} else {
	echo ("	<script = 'javascript'>
				alert('Username มีอยู่ในระบบอยู่แล้ว หากลืมรหัสผ่าน กรุณาติดต่อเจ้าหน้าที่')
				window.location.href='page-registerstudent.php';
			</script>
		");
}

mysqli_close($conn);
