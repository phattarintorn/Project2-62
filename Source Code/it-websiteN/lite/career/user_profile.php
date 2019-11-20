<?php
//DB
include("db/db.php"); 


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

if (isset($_SESSION["id"])) {
	$sql = "SELECT * FROM `customer` WHERE `id`=".$_SESSION["id"];
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{ 
		

		while($row = $result->fetch_assoc()) 
		{
			?>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong>ข้อมูลผู้ใช้</strong>
					</div>

					<div class="card-body card-block"><br>
						<form action="career-advice.php?career=edituser_profile" method="post" enctype="multipart/form-data" class="form-horizontal" id="user_profile">
							
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
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">ชื่อ</label>
									</div>
									<div class="col col-md-5">
									'.$row["firstname"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">นามสกุล</label>
									</div>
									<div class="col col-md-5">
									'.$row["lastname"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">อีเมล</label>
									</div>
									<div class="col col-md-5">
									'.$row["email"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">เพศ</label>
									</div>
									<div class="col col-md-5">
									'.$row["sex"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">สถานะ</label>
									</div>
									<div class="col col-md-5">
									'.$row["status"].'
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
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">ชื่อ</label>
									</div>
									<div class="col col-md-5">
									'.$row["firstname"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">นามสกุล</label>
									</div>
									<div class="col col-md-5">
									'.$row["lastname"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">อีเมล</label>
									</div>
									<div class="col col-md-5">
									'.$row["email"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">เพศ</label>
									</div>
									<div class="col col-md-5">
									'.$row["sex"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">สถานะ</label>
									</div>
									<div class="col col-md-5">
									'.$row["status"].'
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
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">ชื่อ</label>
									</div>
									<div class="col col-md-5">
									'.$row["firstname"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">นามสกุล</label>
									</div>
									<div class="col col-md-5">
									'.$row["lastname"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">อีเมล</label>
									</div>
									<div class="col col-md-5">
									'.$row["email"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">เพศ</label>
									</div>
									<div class="col col-md-5">
									'.$row["sex"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">สถานะ</label>
									</div>
									<div class="col col-md-5">
									'.$row["status"].'
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
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">ชื่อ</label>
									</div>
									<div class="col col-md-5">
									'.$row["firstname"].'
									</div>
									</div>

									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">นามสกุล</label>
									</div>
									<div class="col col-md-5">
									'.$row["lastname"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">อีเมล</label>
									</div>
									<div class="col col-md-5">
									'.$row["email"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">เพศ</label>
									</div>
									<div class="col col-md-5">
									'.$row["sex"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">อาจารย์ที่ปรึกษา</label>
									</div>
									<div class="col col-md-5">
									'.$row["advisors"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">เกรดเฉลี่ยต่อเทอม</label>
									</div>
									<div class="col col-md-5">
									'.$row["gpa"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">เกรดเฉลี่ยร่วม</label>
									</div>
									<div class="col col-md-5">
									'.$row["gpax"].'
									</div>
									</div>
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">สถานะ</label>
									</div>
									<div class="col col-md-5">
									'.$row["status"].'
									</div>
									</div>
									';
								}
							}
							?>
						</form>
						<center>
							<button type="submit" class="btn btn-success " form="user_profile">แก้ไข</button>
							<a href="career-advice.php">
								<button class="btn btn-danger">ยกเลิก</i></button></a>
							</a>
						</center><br><br>
						
					</center>
				</center><br><br>
			</div>
		</div>
	</div>


	<?php
}
}

// close database connection
$conn->close(); 
}
?>  
<script src="js/vendor/jquery-2.1.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</body>
</html>
</font>
