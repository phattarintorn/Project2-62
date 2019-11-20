<?php
include("db/db.php"); 
$q_day = $_REQUEST['q_day'];

// $q_group = $_REQUEST["q_group"];
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `question` WHERE `q_day` = '$q_day'"; 
$result = $conn->query($sql);
?>
<div class="col-md-12">
	<form action="career-advice.php?career=insert_allQ" method="post" class="form-horizontal" id="Qtop">
		<?php
		if ($result->num_rows > 0) 
		{  
			while($row = $result->fetch_assoc()) 
			{ 
				if ($row["choose_no"] == "") {
					// echo $row["choose_no"];
					?>
					<?php //echo $row["q_id"]; ?>
					<hr>
					<?php 
					$q_id = $row['q_id'];
					$q_type = $row['q_type'];
					$q_group = $row['q_group'];

					if ($q_type == "Q1") { 

						echo '<br>';
						include("insert_q1.php");
					}
					if ($q_type == "Q2") {
						echo '<br>';
						include("insert_q2.php");
					}
					if ($q_type == "Q3") {
						echo '<br>';
						include("insert_q3.php");
					}
					if ($q_type == "Q4") {
						echo '<br>';
						include("insert_q4.php");
					}
				}else{

				}
				// echo $q_group;
				echo '<input type="hidden" id="q_group"  name="q_group" value="'.$row["q_group"].'">';
			}
		}

		?>

	</form>
	<center>
		<button type="submit" value="submit" name="submit" class="btn btn-success" form="Qtop">บันทึก</button>
		<a href="career-advice.php?career=delete_form&id=<?php echo $q_id; ?>">
			<button class="btn btn-danger">ยกเลิก</i></button></a>
		</a> 
	</center>
</div>