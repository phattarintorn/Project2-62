<?php
//DB
include("db/db.php"); 


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
$id = $_REQUEST['id'];

$sql = "SELECT * FROM `skills` WHERE `skills_id`=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 


	while($row = $result->fetch_assoc()) 
	{
		?>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<strong>แก้ไข : ข้อมูลเกณฑ์การเลือกอาชีพ</strong>
				</div>

				<div class="card-body card-block">
					<form action="career-advice.php?career=insertuser" method="post" enctype="multipart/form-data" class="form-horizontal">

						
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">ข้อที่:</label>
							</div>
							<div class="col col-md-9">
								<?php echo $row["skills_id"];?>
							</div>
						</div>

						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">เกณฑ์การเลือกอาชีพ:</label>
							</div>
							<div class="col col-md-9">
								<textarea type="text" rows="3" id="skills_detail" name="skills_detail" class="form-control"><?php echo $row["skills_detail"];?></textarea>
							</div>
						</div>
						<center>
							<button type="submit" class="btn btn-primary ">Save</button>
							<button type="submit" class="btn btn-danger ">Cancle</button>
						</center>
					</form>
				</div>
			</div>
		</div>


		<?php
	}

	$conn->close(); 
}
?>   