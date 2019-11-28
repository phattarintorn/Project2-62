<?php

include("db/db.php"); 


if (isset($_POST["q_noq1"])) {
	$q_noq1 = $_POST["q_noq1"];
	// $choose_nonq1 =  $_POST["choose_nonq1"];

	// echo $q_idq1.'<br>';
	// echo $q_noq1.'<br>';

	for ($i=1; $i <= $q_noq1 ; $i++) { 
		if ($_POST["q1_detail$i"] != "") {
			$q1_detail = $_POST["q1_detail$i"];
			$q_id = $_POST["q_id$i"];
			

			
			// echo $q_id1.'<br>';
			// echo $q1_id.'<br>';
			// echo $q1_detail.'<br>';

			// $sql = "UPDATE `q1`  SET `q1_detail`='".$q1_detail."' WHERE q1_id=".$q1_id;
			$sql = "UPDATE mapping_question  SET QUESTION_DETAIL_1 = '".$q1_detail."' WHERE QUESTION_ID = ".$q_id." AND QUESTION_NO = ".$i;
			if (mysqli_query($conn, $sql)) {
				echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
					window.location.href='career-advice.php?career=in_Q&id=".$q_id."';</script>");
			} else {
				echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php';</script>");
			}

		}
	}
}

if (isset($_POST["q_noq2"])) 
{
	$q_noq2 = $_POST["q_noq2"];
	

	// echo $q_id2.'<br>';
	// echo $q_noq2.'<br>';
	for ($i=1; $i <= $q_noq2 ; $i++) 
	{ 
		if ($_POST["q2_detail$i"] != "") 
		{
			$q2_detail = $_POST["q2_detail$i"];
			$q2_detail2 = $_POST["q2_detail2$i"];
			$q_id2 = $_POST["q_id2$i"]; 
			$q2_id = $_POST["q2_id$i"]; 

			// echo $q2_id.'<br>';
			// echo $q2_detail.'<br>'; 
			// echo $q2_detail2.'<br>';
			// $sql = "UPDATE `q2` SET `q2_detail`='".$q2_detail."',`q2_detail2`='".$q2_detail2."' WHERE q2_id=".$q2_id;
			$sql = "UPDATE mapping_question  SET QUESTION_DETAIL_1 = '".$q2_detail."', QUESTION_DETAIL_2 = '".$q2_detail2."' WHERE QUESTION_ID = ".$q2_id." AND QUESTION_NO = ".$i;
			if (mysqli_query($conn, $sql)) {
				echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
					window.location.href='career-advice.php?career=in_Q&id=".$q_id2."';</script>");
			} else {
				echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php';</script>");
			}
		}
	}
}

mysqli_close($conn);
?>