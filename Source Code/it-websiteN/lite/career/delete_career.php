<?php
//DB
include("db/db.php"); 



$Deleteid = $_GET["career_id"];

$conn->query("SET NAMES UTF8");
$sql="DELETE FROM data_career WHERE career_id = ".$Deleteid; 

if ($conn->query($sql)) {
	echo "id" . $Deleteid . "Deleted Already!"; 
	echo ("<script = 'javascript'>alert('ระบบทำการลบอาชีพสำเร็จ') 
		window.location.href='career-advice.php?career=add_career';</script>");
} else { 
	echo "Execution Error!"; 
	echo ("<script = 'javascript'>alert('ระบบทำการลบอาชีพ ผิดพลาด!!') 
		window.location.href='career-advice.php?career=add_career';</script>");
}

?>
