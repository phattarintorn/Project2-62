<?php
// Create connection
include("db/db.php");

if (isset($_POST["user_idq1"]) && isset($_POST["user_idq2"]) ) {
	$user_idq1 = $_POST["user_idq1"];
	$q_idq1 = $_POST["q_idq1"]; 
	$q_group = $_POST["q_group"];
	$form_type1 = $_POST["q_typeq1"];
	$q1_no = $_POST["q1_no"];

	for ($i=1; $i <= $q1_no ; $i++) {
		$mapp_id = $_POST["q_idq1_$i"];
		$choice = $_POST["choice$i"];
		$q_noq1 = $_POST["q_noq1$i"];
		$q1_detailq1 = $_POST["q1_detailq1$i"];
		$career = $_POST["career$i"];
		$form_date = $_POST["form_date$i"];
		if($choice != "")
		{
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			$sql = "INSERT INTO MAPPING_STUDENT_LOG (STUDENT_ID, QUESTION_TYPE, MAPPING_QUESTION_ID, QUESTION_SCORE, QUESTION_SELECTED, CREATE_DATE, CAREER_ID) 
			VALUES (" .$user_idq1.", '" .$form_type1."', " .$mapp_id.", " .$choice.", " .$choice.", '" . $form_date . "', " . $career . ")";

			mysqli_query($conn, $sql);
		}
	}

	$user_idq2 = $_POST["user_idq2"];
	$q_idq2 = $_POST["q_idq2"]; 
	$q_group = $_POST["q_group"];
	$form_type2 = $_POST["q_typeq2"];
	$q2_no = $_POST["q2_no"];

	for ($i=1; $i <= $q2_no  ; $i++) {  
		$mapp_id2 = $_POST["q_idq2_$i"];
		$q_noq2 = $_POST["q_noq2$i"];
		$choice_form = $_POST["choice_form$i"];
		$q2_detail = $_POST["q2_detail$i"];
		$q2_detail2 = $_POST["q2_detail2$i"];
		if (isset($_POST["career$i"])) {
			$career = $_POST["career$i"];		
		}
		if (isset($_POST["career2$i"])) {
			$career = $_POST["career2$i"];		
		}
		$form_date = $_POST["form_date$i"];
		$q2_raw_score = 1;

		if($choice_form != "")
		{
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO MAPPING_STUDENT_LOG (STUDENT_ID, QUESTION_TYPE, MAPPING_QUESTION_ID, QUESTION_SCORE, QUESTION_SELECTED, CREATE_DATE, CAREER_ID)";

			if ($choice_form == 1) {
				$sql .= " VALUES (" .$user_idq2.", '" .$form_type2."', " .$mapp_id2.", 1, 1, '" . $form_date . "', " . $career . ")";
			} elseif ($choice_form == 2) {
				$sql .= " VALUES (" .$user_idq2.", '" .$form_type2."', " .$mapp_id2.", 1, 2, '" . $form_date . "', " . $career . ")";
			}

			mysqli_query($conn, $sql);
		}
	}
	if (isset($_POST["user_idq1"]) && isset($_POST["user_idq2"])) {
		echo ("<script = 'javascript'> window.location.href='career-advice.php?career=process&q_id=".$q_idq1."&q_id2=".$q_idq2."&form_date=".$form_date."'; </script>");
	}
}
//-----------------------------------------------------------------------------------------------------------------------------------------

if (isset($_POST["user_idq1"])  && !isset($_POST["user_idq2"])) {
	$user_idq1 = $_POST["user_idq1"];
	$q_idq1 = $_POST["q_idq1"]; 
	$q_group = $_POST["q_group"]; 
	$form_type = 'Q1'; 
	$form_side1 = $_POST["q_typeq1"];
	$q1_no = $_POST["q1_no"];

	for ($i=1; $i <= $q1_no ; $i++) {
		$mapp_id = $_POST["q_idq1_$i"];
		$choice = $_POST["choice$i"];
		$q_noq1 = $_POST["q_noq1$i"];
		$q1_detailq1 = $_POST["q1_detailq1$i"];
		$career = $_POST["career$i"];
		$form_date = $_POST["form_date$i"];
		if($choice != "")
		{
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO MAPPING_STUDENT_LOG (STUDENT_ID, QUESTION_TYPE, MAPPING_QUESTION_ID, QUESTION_SCORE, QUESTION_SELECTED, CREATE_DATE, CAREER_ID) 
			VALUES (" .$user_idq1.", '" .$form_type1."', " .$mapp_id.", " .$choice.", " .$choice.", '" . $form_date . "', " . $career . ")";


			if (mysqli_query($conn, $sql)) {
				echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
					window.location.href='career-advice.php?career=process&q_id=".$q_idq1."&form_date=".$form_date."';</script>");
			} else {
				echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php?career=insert_formtest';</script>");
			}
		}
	}
}
if (isset($_POST["user_idq2"])  && !isset($_POST["user_idq1"])) {


	$user_idq2 = $_POST["user_idq2"];
	$q_idq2 = $_POST["q_idq2"]; 
	$q_group = $_POST["q_group"]; 
	$form_type2 = 'Q2'; 
	$form_side2 = $_POST["q_typeq2"];
	$q2_no = $_POST["q2_no"];

	for ($i=1; $i <= $q2_no  ; $i++) {  
		$mapp_id2 = $_POST["q_idq2_$i"];
		$q_noq2 = $_POST["q_noq2$i"];
		$choice_form = $_POST["choice_form$i"];
		$q2_detail = $_POST["q2_detail$i"];
		$q2_detail2 = $_POST["q2_detail2$i"];
		if (isset($_POST["career$i"])) {
			$career = $_POST["career$i"];		
		}
		if (isset($_POST["career2$i"])) {
			$career = $_POST["career2$i"];		
		}
		$form_date = $_POST["form_date$i"];
		$q2_raw_score = 1;

		if($choice_form != "")
		{
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO MAPPING_STUDENT_LOG (STUDENT_ID, QUESTION_TYPE, MAPPING_QUESTION_ID, QUESTION_SCORE, QUESTION_SELECTED, CREATE_DATE, CAREER_ID)";

			if ($choice_form == 1) {
				$sql .= " VALUES (" .$user_idq2.", '" .$form_type2."', " .$mapp_id2.", 1, 1, '" . $form_date . "', " . $career . ")";
			} elseif ($choice_form == 2) {
				$sql .= " VALUES (" .$user_idq2.", '" .$form_type2."', " .$mapp_id2.", 1, 2, '" . $form_date . "', " . $career . ")";
			}


			if (mysqli_query($conn, $sql)) {
				echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
					window.location.href='career-advice.php?career=process&q_id=".$q_idq2."&form_date=".$form_date."';</script>");
			} else {
				echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php?career=insert_formtest';</script>");
			}
		}
	}
}

mysqli_close($conn);
?>