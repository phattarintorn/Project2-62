<?php
include("db/db.php");  
$Deleteid = $_GET["id"];

$conn->query("SET NAMES UTF8");
$sql="DELETE FROM M_USER WHERE USER_ID = $Deleteid"; 

if ($conn->query($sql)) {
	echo ("<script = 'javascript'>alert('ระบบทำการลบผู้ใช้สำเร็จ') 
		window.location.href='career-advice.php?career=tables_user';</script>");
} else { 
	echo ("<script = 'javascript'>alert('ระบบทำการลบผู้ใช้ ผิดพลาด!!') 
		window.location.href='index.php?page=tables_user';</script>");
}
?> 
