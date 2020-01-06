<?php
	include("db/db.php"); 

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$QUESTION_GROUP = $_REQUEST['QUESTION_GROUP'];
	$CREATE_DATE = $_REQUEST['CREATE_DATE'];
?>
<div class = "card">
    <div class = "card-header">
        <div class = "row">
            <div class = "col-md-9" style = "padding-top: 1vh;">
                <strong class="card-title">ประวัติการทำแบบทดสอบ</strong>
			</div>
		</div>
	</div>
	<div class = "card-body" id = "html-content-holder" style = "padding: 2em;">
		<?php
			$sql = "SELECT * FROM MAPPING_STUDENT_LOG AS L
				LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
				LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
				WHERE G.QUESTION_GROUP = $QUESTION_GROUP AND L.CREATE_DATE = '$CREATE_DATE'
				GROUP BY G.QUESTION_TYPE";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if ($result->num_rows == 2) {
						include("history_formtest1.php");
						echo '<br/>';
						echo '<hr>';
						echo '<br/>';
						include("history_formtest2.php");
					} else {
						if ($row["QUESTION_TYPE"] == "ความคิดเห็น") {
							include("history_formtest1.php");
						} else if ($row["QUESTION_TYPE"] == "เปรียบเทียบ") {
							include("history_formtest2.php");
						}
					}
				}
			}
		?> 

		<div class="col-md-1" style = "padding-left: 0;"> 
			<a href="javascript:history.back();">
				<button class="btn btn-secondary" style = "width: 100%;">กลับ</button>
			</a> 
		</div>
	</div>
</div>