<?php

include("db/db.php"); 

$q_group = $_POST["q_group"];

if (isset($_POST["q_idq1"])) {
	$q_idq1 = $_POST["q_idq1"];
	$q_noq1 = $_POST["q_noq1"];
	$choose_nonq1 =  $_POST["choose_nonq1"];

	for ($q1=1; $q1 <= $q_noq1 ; $q1++) { 
		if ($_POST["q1_detail$q1"] != "") {
			$q1_detail = $_POST["q1_detail$q1"];

			$sql = "INSERT INTO mapping_question(QUESTION_ID,QUESTION_NO,QUESTION_DETAIL_1) 
			VALUES ('".$q_idq1."','".$q1."','".$q1_detail."')";
			
			if (mysqli_query($conn, $sql)) {
				echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
					window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>");
			} else {
				echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php';</script>");
			}
		}
	}
}

if (isset($_POST["q_idq2"])) {
	$q_idq2 = $_POST["q_idq2"];
	$q_noq2 = $_POST["q_noq2"];
	$choose_nonq2 =  2;

	for ($q2=1; $q2 <= $q_noq2 ; $q2++) { 
		if ($_POST["q2_detail$q2"] != "") {
			$q2_detail = $_POST["q2_detail$q2"];
			$q2_detail2 = $_POST["q2_detail2$q2"];

			$sql = "INSERT INTO mapping_question(QUESTION_ID,QUESTION_NO,QUESTION_DETAIL_1,QUESTION_DETAIL_2) 
			VALUES ('".$q_idq2."','".$q2."','".$q2_detail."','".$q2_detail2."')";

			if (mysqli_query($conn, $sql)) {
				echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
					window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>");
			} else {
				echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php';</script>");
			}
		}
	}
}



if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} 

mysqli_close($conn);
?>