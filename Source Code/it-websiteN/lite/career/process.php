<?php
include("db/db.php");

$user_id = $_SESSION["USER_ID"];
$form_date = $_REQUEST['form_date'];

if (isset($_REQUEST["q_id"])  && isset($_REQUEST["q_id2"])) {
	
	$q_id = $_REQUEST['q_id'];

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

	$sql = "SELECT Q.QUESTION_GROUP FROM MAPPING_STUDENT_REPORT AS R
		LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
		WHERE R.STUDENT_ID = $user_id AND R.CREATE_DATE = '$form_date'
		GROUP BY R.CAREER_ID LIMIT 1";

	$result = $conn->query($sql);
	$row2 = $result->fetch_assoc();

	if (isset($_REQUEST["q_id"])  && isset($_REQUEST["q_id2"])) {
		echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=action&QUESTION_GROUP=" . $row2['QUESTION_GROUP'] . "&CREATE_DATE=" . $form_date . "';
			</script>");
	}
}

if (isset($_REQUEST["q_id"])  && !isset($_REQUEST["q_id2"])) {

	$q_id = $_REQUEST['q_id']; 

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
		
		$sql = "SELECT Q.QUESTION_GROUP FROM MAPPING_STUDENT_REPORT AS R
			LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
			WHERE R.STUDENT_ID = $user_id AND R.CREATE_DATE = '$form_date'
			GROUP BY R.CAREER_ID LIMIT 1";

		$result = $conn->query($sql);
		$row2 = $result->fetch_assoc();

		$sql = "UPDATE MAPPING_STUDENT_REPORT  SET TOTAL_SCORE = " . $total_score . ", TOP_SCORE = " . $top_score . " WHERE QUESTION_ID = $q_id AND STUDENT_ID = $user_id";

		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=action&QUESTION_GROUP=" . $row2['QUESTION_GROUP'] . "&CREATE_DATE=" . $form_date . "';</script>");
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

		$sql = "SELECT Q.QUESTION_GROUP FROM MAPPING_STUDENT_REPORT AS R
			LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
			WHERE R.STUDENT_ID = $user_id AND R.CREATE_DATE = '$form_date'
			GROUP BY R.CAREER_ID LIMIT 1";

		$result = $conn->query($sql);
		$row2 = $result->fetch_assoc();

		$sql = "UPDATE MAPPING_STUDENT_REPORT  SET TOTAL_SCORE = " . $total_score2 . ", TOP_SCORE = " . $top_score2 . " WHERE QUESTION_ID = $q_id2 AND STUDENT_ID = $user_id";
		
		if (mysqli_query($conn, $sql)) {
			echo ("<script = 'javascript'>alert('บันทึกสำเร็จ') 
				window.location.href='career-advice.php?career=action&QUESTION_GROUP=" . $row2['QUESTION_GROUP'] . "&CREATE_DATE=" . $form_date . "';</script>");
		} 

	}
} 