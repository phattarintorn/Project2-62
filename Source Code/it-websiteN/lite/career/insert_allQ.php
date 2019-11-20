<?php

include("db/db.php"); 

$q_group = $_POST["q_group"];

if (isset($_POST["q_idq1"])) {
	$q_idq1 = $_POST["q_idq1"];
	$q_noq1 = $_POST["q_noq1"];
	$choose_nonq1 =  $_POST["choose_nonq1"];

	// echo $q_idq1.'<br>';
	// echo $q_noq1.'<br>';
	for ($q1=1; $q1 <= $q_noq1 ; $q1++) { 
		if ($_POST["q1_detail$q1"] != "") {
			$q1_detail = $_POST["q1_detail$q1"];
			// echo $q1_detail;

			$sql = "UPDATE `question` SET `choose_no`='".$choose_nonq1."' WHERE q_id=".$q_idq1;
			mysqli_query($conn, $sql);

			$sql = "INSERT INTO `q1`(`q_id`,`q1_no`,`q1_detail`) 
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

	// echo $q_idq2.'<br>';
	// echo $q_noq2.'<br>';
	for ($q2=1; $q2 <= $q_noq2 ; $q2++) { 
		if ($_POST["q2_detail$q2"] != "") {
			$q2_detail = $_POST["q2_detail$q2"];
			$q2_detail2 = $_POST["q2_detail2$q2"];
			// echo $q2_detail; 
			
			// echo $q2_detail2;

			$sql = "UPDATE `question` SET `choose_no`='".$choose_nonq2."' WHERE q_id=".$q_idq2;
			mysqli_query($conn, $sql);

			$sql = "INSERT INTO `q2`(`q_id`,`q2_no`,`q2_detail`,`q2_detail2`) 
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

if (isset($_POST["q_idq3"])) {

	$q_idq3 = $_POST["q_idq3"];
	$choose_nonq3 = 4;
	$q3 = implode(",", $_POST["q3"]);
	$criterionq3 = implode(",", $_POST["criterionq3"]);

	// echo 'คำถาม = '.$criterionq3.'<br>';
	// echo $q_idq3.'<br>';
	// echo $q_noq3.'<br>';
	echo $q3.'<br>';

	// for ($i=1; $i <=4 ; $i++) { 
	$choiceq3 = implode(",", $_POST["choiceq3_"]);
	echo $choiceq3;

	$sql = "UPDATE `question` SET `choose_no`='".$choose_nonq3."' WHERE q_id=".$q_idq3;
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO `q3`(`q_id`,`q3_no`,`q3_criterion`,`q3_detail`) 
	VALUES ('".$q_idq3."','".$q3."','".$criterionq3."','".$choiceq3."')";

	if (mysqli_query($conn, $sql)) {
		echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
			window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>");
	} else {
		echo ("<script = 'javascript'>alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) window.location.href='career-advice.php';</script>");
	}
	// }
}


if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} 

mysqli_close($conn);
?>