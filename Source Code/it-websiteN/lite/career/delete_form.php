<?php
//DB
include("db/db.php"); 



$DeleteidGroup = $_GET["idGroup"];

$conn->query("SET NAMES UTF8");
$sql="DELETE FROM m_group_question WHERE QUESTION_GROUP = ".$DeleteidGroup; 

if ($conn->query($sql)) { 
	echo ("<script = 'javascript'>alert('ระบบทำการยกเลิกสำเร็จ') 
		window.location.href='career-advice.php?career=q_topics&Line=1';</script>");
} else {  
	echo ("<script = 'javascript'>alert('ระบบทำการยกเลิก ผิดพลาด!!') 
		window.location.href='career-advice.php?career=insert_Qtopics_type';</script>");
}

?>
