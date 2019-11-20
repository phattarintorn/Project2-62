<?php
session_start(); 

$user_id = $_POST["user_id"];
$password = $_POST["password"];

//DB
include("db/db.php"); 

$sql = "SELECT * FROM `customer` WHERE 
`user_id` ='$user_id' and 
`password` ='$password' ";  

$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);


if (!$result) 
{                                                          
	echo ("<script = 'javascript'>alert('Username หรือ Password อาจจะผิดกรุณา Login ใหม่อีกครั้ง')
		window.location.href='page-login.php';</script>");

} 
else 
{
	$_SESSION["id"] = $result['id'];
	$_SESSION["user_id"] = $result['user_id'];
	$_SESSION["status"] = $result['status'];
	$_SESSION["firstname"] = $result['firstname'];

	session_write_close();

	if($result['status'] == 'admin') 
	{     
		echo ("<script = 'javascript'>alert('ยินดีต้อนรับแอดมิน')
			window.location.href='career-advice.php';</script>");

	} elseif($result['status'] == 'professor') {
		echo ("<script = 'javascript'>alert('ยินดีต้อนรับอาจารย์')
			window.location.href='career-advice.php';</script>");

	}elseif($result['status'] == 'personnel') {
		echo ("<script = 'javascript'>alert('ยินดีต้อนรับเจ้าหน้าที่')
			window.location.href='career-advice.php';</script>");

	}else{
		echo ("<script = 'javascript'>alert('ยินดีต้อนรับนักศึกษา')
			window.location.href='career-advice.php';</script>");     
	}
}

mysqli_close($conn);
?>