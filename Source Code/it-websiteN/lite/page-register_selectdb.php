<?php
include("db/db_new.php");
// $conn = new mysqli("localhost","root","","itsut_db");
$conn->query("SET NAMES UTF8");

$id = $_POST["user_id"];
$user_id = $_POST["user_id"];

$sql = "SELECT * FROM `customer` WHERE 
`user_id` ='$user_id'";  

$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);


if (!$result) 
{                                                          
	$password = $_POST["password"];
	$email = $_POST["email"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$sex = $_POST["sex"];
	if (isset($_POST["course"])) {
		$course = $_POST["course"];
		$advisors = $_POST["advisors"];
		$gpa = $_POST["gpa"];
		$gpax = $_POST["gpax"];
	}
	$status = $_POST["status"];


// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if (isset($_POST["course"])) {
		$course = $_POST["course"];
		$sql = "INSERT INTO `customer`( `id`,`user_id`, `password`, `email`, `firstname`, `lastname`, `sex`, `course`,`advisors`, `gpa`, `gpax`, `status`) 
		VALUES ('" .$id."','" .$user_id."','" .$password."','" .$email."','" .$firstname."','" .$lastname."','" .$sex."','" .$course."','" .$advisors."','" .$gpa."','" .$gpax."','" .$status."')";

		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('สมัครสมาชิกสำเร็จ ยินดีต้อนรับ') 
				window.location.href='page-login.php';</script>");
		} else {
			echo ("<script = 'javascript'>alert('สมัครสมาชิก ผิดพลาด!!' . mysqli_error($conn) ) window.location.href='page-login.php';</script>");
		}
	}

	if (!isset($_POST["course"])) {
		$sql = "INSERT INTO `customer`( `id`,`user_id`, `password`, `email`, `firstname`, `lastname`, `sex`,  `status`) 
		VALUES ('" .$id."','" .$user_id."','" .$password."','" .$email."','" .$firstname."','" .$lastname."','" .$sex."', '" .$status."')";

		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('สมัครสมาชิกสำเร็จ ยินดีต้อนรับ') 
				window.location.href='career-advice.php?career=tables_user';</script>");
		} else {
			echo ("<script = 'javascript'>alert('สมัครสมาชิก ผิดพลาด!!' . mysqli_error($conn) ) window.location.href='page-register.php';</script>");
		}
	}

} 
else 
{
	echo ("<script = 'javascript'>alert('Username มีอยู่แล้ว หากลืมรหัสให้ติดต่อเจ้าหน้าที่')
		window.location.href='page-registerstudent.php';</script>");
}

mysqli_close($conn); 


?>