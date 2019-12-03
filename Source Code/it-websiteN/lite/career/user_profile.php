<?php
include("db/db.php");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION["USER_USERNAME"];

if (isset($_SESSION["USER_ID"])) {
	$sql = "SELECT * FROM M_USER AS u
	LEFT JOIN MAPPING_STUDENT_DATA AS sdata
	ON u.USER_ID = sdata.STUDENT_ID
	WHERE USER_ID =" . $_SESSION["USER_ID"];

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			?>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<strong>ข้อมูลผู้ใช้</strong>
					</div>
					<div class="card-body card-block"><br>
						<form action="career-advice.php?career=edituser_profile" method="post" enctype="multipart/form-data" class="form-horizontal" id="user_profile">
							<?php
										if (isset($row["USER_STATUS"])) {
											if ($row["USER_STATUS"] == "ADMIN") {
												echo '
													<input type="hidden" id="id" name="id" value="' . $row["USER_ID"] . '">
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">รหัสแอดมิน:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_USERNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">ชื่อ:	</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_FIRSTNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">นามสกุล:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_LASTNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">อีเมล:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_EMAIL"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_TEL"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">เพศ:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_GENDER"] . '
													</div>
													</div>
													';
											} elseif ($row["USER_STATUS"] == "PROFESSOR") {
												echo '
													<input type="hidden" id="id" name="id" value="' . $row["USER_ID"] . '">
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">รหัสอาจารย์:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_USERNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">ชื่อ:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_FIRSTNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">นามสกุล:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_LASTNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">อีเมล:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_EMAIL"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_TEL"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">เพศ:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_GENDER"] . '
													</div>
													</div>
													';
											} elseif ($row["USER_STATUS"] == "PERSONNEL") {
												echo '
													<input type="hidden" id="id" name="id" value="' . $row["USER_ID"] . '">
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">รหัสเจ้าหน้าที่:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_USERNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">ชื่อ:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_FIRSTNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">นามสกุล:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_LASTNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">อีเมล:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_EMAIL"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_TEL"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">เพศ:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_GENDER"] . '
													</div>
													</div>
													';
											} elseif ($row["USER_STATUS"] == "STUDENT") {
												echo '
													<input type="hidden" id="id" name="id" value="' . $row["USER_ID"] . '">
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">รหัสนักศึกษา:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_USERNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">ชื่อ:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_FIRSTNAME"] . '
													</div>
													</div>

													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">นามสกุล:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_LASTNAME"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">อีเมล:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_EMAIL"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_TEL"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">เพศ:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_GENDER"] . '
													</div>
													</div>'; ?>

													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">อาจารย์ที่ปรึกษา:</label>
													</div>
													<div class="col col-md-5">
													<?php
													
													$sql = "SELECT u.USER_FIRSTNAME, u.USER_LASTNAME FROM m_user as u
													LEFT JOIN mapping_student_data as mdata
													ON u.USER_ID = mdata.ADVISOR_ID
													WHERE student_ID = ".$_SESSION["USER_ID"];

													$result = $conn->query($sql);
													if ($result->num_rows > 0) 
													{  
													  while($row2 = $result->fetch_assoc()) 
													  {   ?>
														<?php echo $row2["USER_FIRSTNAME"].' '.$row2["USER_LASTNAME"];?>
														
														<?php
													  }
													}
													?>
													</div>
													</div>
													
													<?php echo '
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">เกรดเฉลี่ยต่อเทอม:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_GPA"] . '
													</div>
													</div>
													<div class="row form-group">
													<div class="col col-md-3">
													<label for="text-input" class=" form-control-label">เกรดเฉลี่ยร่วม:</label>
													</div>
													<div class="col col-md-5">
													' . $row["USER_GPAX"] . '
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