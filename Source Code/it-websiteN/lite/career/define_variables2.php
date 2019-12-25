<?php
include("db/db.php"); 

if (isset($_POST["q2_group"])) {
	$q_group = $_POST["q2_group"]; 
	$q_id = $_POST["q_id"]; 
	$q_no = $_POST["q_no"]; 
	$career = $_POST["career"];
  

	$q_no = $q_no * 2;
	for ($i=1; $i <= $q_no; $i++) { 

		if (isset($_POST["q2_choice".$i])) {
			$mod = $i % 2;

			if($mod == 0){
				$sql = "UPDATE mapping_question  SET CAREER_ID_2 ='".$career."' WHERE QUESTION_ID = ".$q_id." AND QUESTION_NO = ".$_POST["q_no".$i];						
				if (mysqli_query($conn, $sql)) {
					echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
						window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
				} 
			}else{
				$sql = "UPDATE mapping_question  SET CAREER_ID_1 ='".$career."' WHERE QUESTION_ID = ".$q_id." AND QUESTION_NO = ".$_POST["q_no".$i];
				if (mysqli_query($conn, $sql)) {
					echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
						window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 
				} 
			}
		}else{
			echo ("<script = 'javascript'>alert('โปรดเลือกคำถาม') 
						window.location.href='career-advice.php?career=check_Qresult&q_group=".$q_group."';</script>"); 

		}
	} 
}