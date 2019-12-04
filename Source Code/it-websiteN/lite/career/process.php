<?php
include("db/db.php");

$user_id = $_SESSION["USER_ID"];
$form_date = $_REQUEST['form_date'];

if (isset($_REQUEST["q_id"])  && isset($_REQUEST["q_id2"])) {
	$q_id = $_REQUEST['q_id']; 

	// $sql = "SELECT COUNT(form_id) AS count, `form_type`,`form_side`,`form_group`,`form_date`,`career`,SUM(`choice_form`) AS sum FROM test_form WHERE `q_id` = '$q_id' GROUP BY `career` ORDER BY `sum` DESC";

	$sql = "SELECT Q.QUESTION_ID, SUM(L.QUESTION_SCORE) AS SUM, L.CAREER_ID, G.QUESTION_PART, G.QUESTION_TYPE FROM MAPPING_STUDENT_LOG AS L
		LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
		LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
		WHERE L.STUDENT_ID = $user_id AND Q.QUESTION_ID = $q_id GROUP BY L.CAREER_ID ORDER BY SUM DESC";
	
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
			VALUES ($q_id, $user_id, "  .$row['CAREER_ID'] . ", " . $row['SUM'] . ", 0, 0, '$form_date')";

			mysqli_query($conn, $sql);

		}

		$sql = "UPDATE MAPPING_STUDENT_REPORT  SET TOTAL_SCORE = " . $total_score . ", TOP_SCORE = " . $top_score . " WHERE QUESTION_ID = $q_id AND STUDENT_ID = $user_id";
		mysqli_query($conn, $sql);

	}

	$q_id2 = $_REQUEST['q_id2'];  

	// $sql = "SELECT COUNT(form_id) AS count2, `form_type`,`form_side`,`form_group`,`form_date`,`career`,SUM(`q2_raw_score`) AS sum2 FROM test_form WHERE `q_id` = '$q_id2' GROUP BY `career` ORDER BY `sum2` DESC";
	
	$sql = "SELECT Q.QUESTION_ID, SUM(L.QUESTION_SCORE) AS SUM, L.CAREER_ID, G.QUESTION_PART, G.QUESTION_TYPE FROM MAPPING_STUDENT_LOG AS L
	LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
	LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
		WHERE L.STUDENT_ID = $user_id AND Q.QUESTION_ID = $q_id2 GROUP BY L.CAREER_ID ORDER BY SUM DESC";
	
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

			if ($i <= "5") {
				$top_score2 = $top_score2 +  $row["SUM"];
			} 

			$total_score2 = $total_score2 +  $row["SUM"];

			$sql = "INSERT INTO MAPPING_STUDENT_REPORT (QUESTION_ID, STUDENT_ID, CAREER_ID, RAW_SCORE, TOP_SCORE, TOTAL_SCORE, CREATE_DATE) 
				VALUES ($q_id2, $user_id, "  .$row['CAREER_ID'] . ", " . $row['SUM'] . ", 0, 0, '$form_date')";

			mysqli_query($conn, $sql);

		}	 

		$sql = "UPDATE MAPPING_STUDENT_REPORT  SET TOTAL_SCORE = " . $total_score2 . ", TOP_SCORE = " . $top_score2 . " WHERE QUESTION_ID = $q_id2 AND STUDENT_ID = $user_id";
		mysqli_query($conn, $sql);

	}

	if (isset($_REQUEST["q_id"])  && isset($_REQUEST["q_id2"])) {
		echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=action&q_id=".$q_id."&q_id2=".$q_id2."&form_date=".$form_date."&form_type=".$form_type."&form_type2=".$form_type2."&form_side=".$form_part."&form_side2=".$form_part2."';
			</script>");
	}
}

if (isset($_REQUEST["q_id"])  && !isset($_REQUEST["q_id2"])) {
	$q_id = $_REQUEST['q_id']; 

	// $sql = "SELECT COUNT(form_id) AS count, `form_type`,`form_side`,`form_group`,`form_date`,`career`,SUM(`choice_form`) AS sum FROM test_form WHERE `q_id` = '$q_id' GROUP BY `career` ORDER BY `sum` DESC";
	
	$sql = "SELECT Q.QUESTION_ID, SUM(L.QUESTION_SCORE) AS SUM, L.CAREER_ID, G.QUESTION_PART, G.QUESTION_TYPE FROM MAPPING_STUDENT_LOG AS L
		LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
		LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
		WHERE L.STUDENT_ID = $user_id AND Q.QUESTION_ID = $q_id GROUP BY L.CAREER_ID ORDER BY SUM DESC";
	
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
				VALUES ($q_id, $user_id, "  .$row['CAREER_ID'] . ", " . $row['SUM'] . ", 0, 0, '$form_date')";

			mysqli_query($conn, $sql);

		}

		$sql = "UPDATE MAPPING_STUDENT_REPORT  SET TOTAL_SCORE = " . $total_score . ", TOP_SCORE = " . $top_score . " WHERE QUESTION_ID = $q_id AND STUDENT_ID = $user_id";
		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=action&q_id=".$q_id."&form_date=".$form_date."&form_type=".$form_type."&form_side=".$form_part."';</script>");
		} 
	}
}

if (isset($_REQUEST["q_id2"])  && !isset($_REQUEST["q_id"])) {

	$q_id2 = $_REQUEST['q_id2']; 

	$sql = "SELECT Q.QUESTION_ID, SUM(L.QUESTION_SCORE) AS SUM, L.CAREER_ID, G.QUESTION_PART, G.QUESTION_TYPE FROM MAPPING_STUDENT_LOG AS L
		LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
		LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
		WHERE L.STUDENT_ID = $user_id AND Q.QUESTION_ID = $q_id2 GROUP BY L.CAREER_ID ORDER BY SUM DESC";

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

			if ($i <= "5") {
				$top_score2 = $top_score2 +  $row["SUM"];
			} 

			$total_score2 = $total_score2 +  $row["SUM"];

			$sql = "INSERT INTO MAPPING_STUDENT_REPORT (QUESTION_ID, STUDENT_ID, CAREER_ID, RAW_SCORE, TOP_SCORE, TOTAL_SCORE, CREATE_DATE) 
				VALUES ($q_id2, $user_id, "  .$row['CAREER_ID'] . ", " . $row['SUM'] . ", 0, 0, '$form_date')";

			mysqli_query($conn, $sql);

		}	 

		$sql = "UPDATE MAPPING_STUDENT_REPORT  SET TOTAL_SCORE = " . $total_score2 . ", TOP_SCORE = " . $top_score2 . " WHERE QUESTION_ID = $q_id2 AND STUDENT_ID = $user_id";
		
		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=action&q_id2=".$q_id2."&form_date=".$form_date."&form_type2=".$form_type2."&form_side2=".$form_part2."';</script>");
		} 

	}
} 