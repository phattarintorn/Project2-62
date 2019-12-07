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

	$sql = "SELECT Q.QUESTION_ID, SUM(L.QUESTION_SCORE) AS SUM, L.CAREER_ID, G.QUESTION_PART, G.QUESTION_TYPE FROM MAPPING_STUDENT_LOG AS L
		LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
		LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
		WHERE L.STUDENT_ID = $user_idq1 AND Q.QUESTION_ID = $q_idq1 GROUP BY L.CAREER_ID ORDER BY SUM DESC";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$i = 0;
		$top_score = 0;
		$total_score = 0;

		while($row = $result->fetch_assoc()) 
		{  
			$i = $i +1;
			$form_part = $row['QUESTION_PART'];
			$form_type = $row['QUESTION_TYPE'];
			
			if ($i <= "5") {
				$top_score = $top_score +  $row["SUM"];
			} 

			$total_score = $total_score +  $row["SUM"];

			$sql = "INSERT INTO MAPPING_STUDENT_REPORT (QUESTION_ID, STUDENT_ID, CAREER_ID, RAW_SCORE, TOP_SCORE, TOTAL_SCORE, CREATE_DATE) 
			VALUES ($q_idq1, $user_idq1, "  .$row['CAREER_ID'] . ", " . $row['SUM'] . ", 0, 0, '$form_date')";

			mysqli_query($conn, $sql);

		}
		
		$sql = "UPDATE MAPPING_STUDENT_REPORT  SET TOTAL_SCORE = " . $total_score . ", TOP_SCORE = " . $top_score . " WHERE QUESTION_ID = $q_idq1 AND STUDENT_ID = $user_idq1";
		mysqli_query($conn, $sql);

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

	$sql = "SELECT Q.QUESTION_ID, SUM(L.QUESTION_SCORE) AS SUM, L.CAREER_ID, G.QUESTION_PART, G.QUESTION_TYPE FROM MAPPING_STUDENT_LOG AS L
	LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
	LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
		WHERE L.STUDENT_ID = $user_idq2 AND Q.QUESTION_ID = $q_idq2 GROUP BY L.CAREER_ID ORDER BY SUM DESC";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{
		$i2 = 0;
		$top_score2 = 0;
		$total_score2 = 0;

		while($row = $result->fetch_assoc()) 
		{  
			$i2 = $i2 +1;
			$form_part2 = $row['QUESTION_PART'];
			$form_type2 = $row['QUESTION_TYPE'];

			if ($i2 <= "5") {
				$top_score2 = $top_score2 +  $row["SUM"];
			} 

			$total_score2 = $total_score2 +  $row["SUM"];

			$sql = "INSERT INTO MAPPING_STUDENT_REPORT (QUESTION_ID, STUDENT_ID, CAREER_ID, RAW_SCORE, TOP_SCORE, TOTAL_SCORE, CREATE_DATE) 
				VALUES ($q_idq2, $user_idq2, "  .$row['CAREER_ID'] . ", " . $row['SUM'] . ", 0, 0, '$form_date')";

			mysqli_query($conn, $sql);

		}

		$sql = "UPDATE MAPPING_STUDENT_REPORT  SET TOTAL_SCORE = " . $total_score2 . ", TOP_SCORE = " . $top_score2 . " WHERE QUESTION_ID = $q_idq2 AND STUDENT_ID = $user_idq2";
		mysqli_query($conn, $sql);

	}

	if (isset($_POST["user_idq1"]) && isset($_POST["user_idq2"])) {
		// echo ("<script = 'javascript'> window.location.href='career-advice.php?career=process&q_id=".$q_idq1."&q_id2=".$q_idq2."&form_date=".$form_date."'; </script>");
		echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
			window.location.href='career-advice.php?career=action&q_id=".$q_idq1."&q_id2=".$q_idq2."&form_date=".$form_date."&form_type=".$form_type."&form_type2=".$form_type2."&form_side=".$form_part."&form_side2=".$form_part2."';
		</script>");
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
						window.location.href='career-advice.php?career=process&q_id=".$q_idq1."&form_date=".$form_date."';
					</script>");
			} else {
				echo ("<script = 'javascript'>
					alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) 
					window.location.href='career-advice.php?career=insert_formtest';
				</script>");
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
						window.location.href='career-advice.php?career=process&q_id=".$q_idq2."&form_date=".$form_date."';
					</script>");
			} else {
				echo ("<script = 'javascript'>
					alert('เกิดข้อผิดพลาด' . mysqli_error($conn) ) 
					window.location.href='career-advice.php?career=insert_formtest';
				</script>");
			}
		}
	}
}

mysqli_close($conn);
?>