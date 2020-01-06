<?php
include("db/db.php");  
$del = $_GET["id"];

$conn->query("SET NAMES UTF8");
$sql="UPDATE M_USER SET STATUS_USER = 1 WHERE USER_ID = $del"; 

if ($conn->query($sql)) {
	echo ("<script = 'javascript'>alert('ระบบทำการปิดสถานะผู้ใช้สำเร็จ') 
		window.location.href='career-advice.php?career=tables_user';</script>");
} else { 
	echo ("<script = 'javascript'>alert('ระบบทำการปิดสถานะผู้ใช้ ผิดพลาด!!') 
		window.location.href='career-advice.php?career=tables_user';</script>");
}
?> 
