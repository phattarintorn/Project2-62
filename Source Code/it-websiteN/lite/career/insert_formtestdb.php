<?php

// Create connection

include("db/db_new.php");

if (isset($_POST["user_idq1"]) && isset($_POST["user_idq2"]) ) {
	$user_idq1 = $_POST["user_idq1"];
	$q_idq1 = $_POST["q_idq1"]; 
	$q_group = $_POST["q_group"]; 
	$form_type = 'Q1'; 
	$form_side1 = $_POST["q_sideq1"];
	$q1_no = $_POST["q1_no"];

	// echo 'user_idq1= '.$user_idq1.'<br>';  
	// echo 'q_idq1= '.$q_idq1.'<br>'; 
	// echo 'user_idq2= '.$user_idq2.'<br>';  
	// echo 'q_idq2= '.$q_idq2.'<br>';  

	for ($i=1; $i <= $q1_no ; $i++) { 
		$choice = $_POST["choice$i"];
		$q_noq1 = $_POST["q_noq1$i"];
		$q1_detailq1 = $_POST["q1_detailq1$i"];
		$career = $_POST["career$i"];
		$form_date = $_POST["form_date$i"];
		if($choice != "")
		{
		// echo $choice;	
		// echo $q1_detailq1;	
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO `test_form`( `user_id`, `q_id`, `criterion_no_form`,`criterion_form`,`choice_form`,`form_group`,`form_type`,`form_side`,`career`,`form_date`) 
			VALUES ('" .$user_idq1."','" .$q_idq1."','" .$q_noq1."','" .$q1_detailq1."','" .$choice."','" .$q_group."','" .$form_type."','" .$form_side1."','" .$career."','" .$form_date."')";
			mysqli_query($conn, $sql);
		}
	}


	$user_idq2 = $_POST["user_idq2"];
	$q_idq2 = $_POST["q_idq2"]; 
	$q_group = $_POST["q_group"]; 
	$form_type2 = 'Q2'; 
	$form_side2 = $_POST["q_sideq2"];
	$q2_no = $_POST["q2_no"];

	for ($i=1; $i <= $q2_no  ; $i++) {  
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
			// echo 'career =='.$career.'<br>'; 	
			// echo $q2_raw_score.'=='.$choice_form.'<br>'; 	
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO `test_form`( `user_id`, `q_id`, `criterion_no_form`,`criterion_form`,`criterion_form2`,`choice_form`,`form_group`,`form_type`,`form_side`,`career`,`form_date`,`q2_raw_score`) 
			VALUES ('" .$user_idq2."','" .$q_idq2."','" .$q_noq2."','" .$q2_detail."','" .$q2_detail2."','" .$choice_form."','" .$q_group."','" .$form_type2."','" .$form_side2."','" .$career."','" .$form_date."','" .$q2_raw_score."')";
			mysqli_query($conn, $sql);
		}
	}
	if (isset($_POST["user_idq1"]) && isset($_POST["user_idq2"])) {
		echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
			window.location.href='career-advice.php?career=process&q_id=".$q_idq1."&q_id2=".$q_idq2."&form_date=".$form_date."';</script>");
	}
}
//-----------------------------------------------------------------------------------------------------------------------------------------

if (isset($_POST["user_idq1"])  && !isset($_POST["user_idq2"])) {
	$user_idq1 = $_POST["user_idq1"];
	$q_idq1 = $_POST["q_idq1"]; 
	$q_group = $_POST["q_group"]; 
	$form_type = 'Q1'; 
	$form_side1 = $_POST["q_sideq1"];
	$q1_no = $_POST["q1_no"];


	// echo 'user_idq1= '.$user_idq1.'<br>';  
// echo 'q_idq1= '.$q_idq1.'<br>';  

	for ($i=1; $i <= $q1_no ; $i++) { 
		$choice = $_POST["choice$i"];
		$q_noq1 = $_POST["q_noq1$i"];
		$q1_detailq1 = $_POST["q1_detailq1$i"];
		$career = $_POST["career$i"];
		$form_date = $_POST["form_date$i"];
		if($choice != "")
		{
		// echo $choice;	
		// echo $q1_detailq1;	
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO `test_form`( `user_id`, `q_id`, `criterion_no_form`,`criterion_form`,`choice_form`,`form_group`,`form_type`,`form_side`,`career`,`form_date`) 
			VALUES ('" .$user_idq1."','" .$q_idq1."','" .$q_noq1."','" .$q1_detailq1."','" .$choice."','" .$q_group."','" .$form_type."','" .$form_side1."','" .$career."','" .$form_date."')";


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
	$form_side2 = $_POST["q_sideq2"];
	$q2_no = $_POST["q2_no"];


	// echo 'user_idq2= '.$user_idq2.'<br>';  
	// echo 'q_idq2= '.$q_idq2.'<br>';  

	for ($i=1; $i <= $q2_no  ; $i++) {  
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
			// echo 'career =='.$career.'<br>'; 	
			// echo $q2_raw_score.'=='.$choice_form.'<br>'; 	
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO `test_form`( `user_id`, `q_id`, `criterion_no_form`,`criterion_form`,`criterion_form2`,`choice_form`,`form_group`,`form_type`,`form_side`,`career`,`form_date`,`q2_raw_score`) 
			VALUES ('" .$user_idq2."','" .$q_idq2."','" .$q_noq2."','" .$q2_detail."','" .$q2_detail2."','" .$choice_form."','" .$q_group."','" .$form_type2."','" .$form_side2."','" .$career."','" .$form_date."','" .$q2_raw_score."')";



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