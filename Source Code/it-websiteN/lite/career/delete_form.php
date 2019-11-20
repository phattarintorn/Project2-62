<?php
//DB
include("db/db.php"); 



$Deleteid = $_GET["id"];

$conn->query("SET NAMES UTF8");
$sql="DELETE FROM question WHERE q_id = ".$Deleteid; 

if ($conn->query($sql)) { 
	echo ("<script = 'javascript'>alert('ระบบทำการยกเลิกสำเร็จ') 
		window.location.href='career-advice.php?career=q_topics&Line=1';</script>");
} else {  
	echo ("<script = 'javascript'>alert('ระบบทำการยกเลิก ผิดพลาด!!') 
		window.location.href='career-advice.php?career=insert_Qtopics_type';</script>");
}

?>
