<?php
include("db/db.php"); 
$q_day = $_REQUEST['q_day'];

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM m_group_question WHERE CREATE_DATE = '$q_day'"; 
$result = $conn->query($sql);
?>
<div class="col-md-12">
	<form action="career-advice.php?career=insert_allQ" method="post" class="form-horizontal" id="Qtop">
		<?php
		if ($result->num_rows > 0) 
		{  
			while($row = $result->fetch_assoc()) 
			{ 
				if ($row["QUESTION_CHOICE"] !== "") {
					?>
					<hr>
					<?php 
					$q_id = $row['QUESTION_ID'];
					$q_type = $row['QUESTION_TYPE'];
					$q_group = $row['QUESTION_GROUP'];
					printf($q_type);
					if ($q_type == "ความคิดเห็น") { 
						echo '<br>';
						include("insert_q1.php");
					}
					if ($q_type == "เปรียบเทียบ") {
						echo '<br>';
						include("insert_q2.php");
					}
				}else{
				}
				echo '<input type="hidden" id="q_group"  name="q_group" value="'.$row["QUESTION_GROUP"].'">';
			}
		}

		?>

	</form>
	<center>
		<button type="submit" value="submit" name="submit" class="btn btn-success" form="Qtop">บันทึก</button>
		<a href="career-advice.php?career=delete_form&idGroup=<?php echo $q_group; ?>">
			<button class="btn btn-danger">ยกเลิก</i></button></a>
		</a> 
	</center>
</div>