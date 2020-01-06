<?php
include("db/db.php"); 

if (isset($_POST["q1_group"])) {
	$q_group = $_POST["q1_group"]; 
	$q_id = $_POST["q_id"]; 
	$q_no = $_POST["q_no"]; 
	$career = $_POST["career"];
	$check = 0;  
	
	for ($i=1; $i <= $q_no; $i++) { 

		if (isset($_POST["choice".$i])) {

			$sql = "UPDATE mapping_question  SET CAREER_ID_1 ='".$career."' WHERE QUESTION_ID=".$q_id." AND QUESTION_NO = ".$i;
					
			if (mysqli_query($conn, $sql)) {
				$check = 1; 
				echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
					window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
			}
		}
	}
	if($check==0){
		echo ("<script = 'javascript'>alert('โปรดเลือกคำถาม') 
		window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
	}

}