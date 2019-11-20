<!-- insert_Qside -->
<?php

include("db/db.php"); 

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$line = $_POST["hdnLine"];

for($i=1; $i<$line; $i++)
{
	if($_POST["q_side$i"] != "")
	{
		$q_side = $_POST["q_side$i"];
		// $topics = $_POST["topics$i"];
		$q_type = $_POST["q_type$i"];
		// $explanation = $_POST["explanation$i"];
		$q_group = $_POST["q_group$i"];
		$q_no = $_POST["q_no$i"];
		$choose_no = $_POST["choose_no$i"];
		$q_day = $_POST["q_day"];
		 

		$sql = "INSERT INTO `question`(`q_side`,`q_type`,`q_group`,`q_no`,`choose_no`,`q_day`) 
		VALUES ('".$q_side."','".$q_type."','".$q_group."','".$q_no."','".$choose_no."','".$q_day."')";

		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=insert_Qtopics_type&q_day=".$q_day."';</script>");
		} else {
			echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php';</script>");
		}
	}
}



mysqli_close($conn);

?>


