<?php

	include("db/db.php"); 

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$QUESTION_GROUP = $_REQUEST['QUESTION_GROUP'];
	$QUESTION_TYPE = $_REQUEST['QUESTION_TYPE'];
	$CREATE_DATE = $_REQUEST['CREATE_DATE'];

	$sql = "SELECT * FROM MAPPING_STUDENT_LOG AS L
		LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
		LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
		WHERE G.QUESTION_GROUP = $QUESTION_GROUP AND G.QUESTION_TYPE = '$QUESTION_TYPE'
		AND L.CREATE_DATE = '$CREATE_DATE'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row["QUESTION_TYPE"] == "ความคิดเห็น") {
				include("history_formtest1.php");
			} elseif ($row["QUESTION_TYPE"] == "เปรียบเทียบ") {
				include("history_formtest2.php");
			}
		}
	}

?> 

<div class="col-md-2"> 
	<a href="career-advice.php?career=tables_history2&q_group=<?php echo $QUESTION_GROUP ?>">
		<button class="btn btn-secondary">กลับ</i></button></a>
	</a> 
</div>