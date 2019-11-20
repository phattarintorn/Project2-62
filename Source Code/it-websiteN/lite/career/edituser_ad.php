<?php
//DB
include("db/db.php"); 


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
$id = $_REQUEST['id'];

$sql = "SELECT * FROM `customer` WHERE `id`=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 


	while($row = $result->fetch_assoc()) 
	{
		?>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<strong>แก้ไข ข้อมูลผู้ใช้</strong>
				</div>
 
				<div class="card-body card-block">
					<form action="career-advice.php?career=insertuser_ad" method="post" enctype="multipart/form-data" class="form-horizontal" id="edituser_ad">

						<?php
						if (isset($row["status"])) {
							if ($row["status"] == "admin") {
								echo '
								<input type="hidden" id="id" name="id" value="'.$row["id"].'">
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">รหัสแอดมิน:</label>
								</div>
								<div class="col col-md-5">
								'.$row["user_id"].'
								<input type="hidden" name="user_id" class="form-control" value="'.$row["user_id"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">ชื่อ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="firstname" class="form-control" value="'.$row["firstname"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">นามสกุล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="lastname" class="form-control" value="'.$row["lastname"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">อีเมล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="email" class="form-control" value="'.$row["email"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">เพศ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="sex" class="form-control" value="'.$row["sex"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">สถานะ</label>
								</div>
								<div class="col col-md-5">
								'.$row["status"].'
								<input type="hidden" name="status" class="form-control" value="'.$row["status"].'">
								</div>
								</div>
								';
							}elseif ($row["status"] == "professor") {
								echo '
								<input type="hidden" id="id" name="id" value="'.$row["id"].'">
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">รหัสอาจารย์:</label>
								</div>
								<div class="col col-md-5">
								'.$row["user_id"].'
								<input type="hidden" name="user_id" class="form-control" value="'.$row["user_id"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">ชื่อ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="firstname" class="form-control" value="'.$row["firstname"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">นามสกุล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="lastname" class="form-control" value="'.$row["lastname"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">อีเมล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="email" class="form-control" value="'.$row["email"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">เพศ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="sex" class="form-control" value="'.$row["sex"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">สถานะ</label>
								</div>
								<div class="col col-md-5">
								'.$row["status"].'
								<input type="hidden" name="status" class="form-control" value="'.$row["status"].'">
								</div>
								</div>
								';
							}elseif ($row["status"] == "personnel") {
								echo '
								<input type="hidden" id="id" name="id" value="'.$row["id"].'">
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">รหัสเจ้าหน้าที่:</label>
								</div>
								<div class="col col-md-5">
								'.$row["user_id"].'
								<input type="hidden" name="user_id" class="form-control" value="'.$row["user_id"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">ชื่อ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="firstname" class="form-control" value="'.$row["firstname"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">นามสกุล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="lastname" class="form-control" value="'.$row["lastname"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">อีเมล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="email" class="form-control" value="'.$row["email"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">เพศ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="sex" class="form-control" value="'.$row["sex"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">สถานะ</label>
								</div>
								<div class="col col-md-5">
								'.$row["status"].'
								<input type="hidden" name="status" class="form-control" value="'.$row["status"].'">
								</div>
								</div>
								';
							}else{
								echo '
								<input type="hidden" id="id" name="id" value="'.$row["id"].'">
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">รหัสนักศึกษา:</label>
								</div>
								<div class="col col-md-5">
								'.$row["user_id"].'
								<input type="hidden" name="user_id" class="form-control" value="'.$row["user_id"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">ชื่อ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="firstname" class="form-control" value="'.$row["firstname"].'">
								</div>
								</div>

								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">นามสกุล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="lastname" class="form-control" value="'.$row["lastname"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">อีเมล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="email" class="form-control" value="'.$row["email"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">เพศ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="sex" class="form-control" value="'.$row["sex"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">อาจารย์ที่ปรึกษา</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="advisors" class="form-control" value="'.$row["advisors"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">เกรดเฉลี่ยต่อเทอม</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="gpa" class="form-control" value="'.$row["gpa"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">เกรดเฉลี่ยร่วม</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="gpax" class="form-control" value="'.$row["gpax"].'">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">สถานะ</label>
								</div>
								<div class="col col-md-5">
								'.$row["status"].'
								<input type="hidden" name="status" class="form-control" value="'.$row["status"].'">
								</div>
								</div>
								
								';
							}
						}
						?>
					</form>
					<center>
						<button type="submit" class="btn btn-success " form="edituser_ad">Save</button>
						<a href="career-advice.php?career=tables_user">
							<button class="btn btn-danger">Cancel</i></button></a>
						</a>
					</center><br><br>

					
				</div>
			</div>
		</div>


		<?php
	}

	$conn->close(); 
}
?>   