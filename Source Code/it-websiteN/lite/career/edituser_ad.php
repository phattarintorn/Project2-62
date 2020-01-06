<?php
//DB
include("db/db.php");


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$id = $_REQUEST['id'];

$sql = "SELECT * FROM M_USER AS u
LEFT JOIN MAPPING_STUDENT_DATA AS sdata
ON u.USER_ID = sdata.STUDENT_ID
WHERE USER_ID =" . $id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {

	while ($row = $result->fetch_assoc()) {
?>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<strong>แก้ไข ข้อมูลผู้ใช้</strong>
				</div>

				<div class="card-body card-block">
					<form action="career-advice.php?career=insertuser_ad" method="post" enctype="multipart/form-data" class="form-horizontal" id="edituser_ad">

						<?php
						if (isset($row["USER_STATUS"])) {
							if ($row["USER_STATUS"] == "ADMIN") {
								echo '
								<input type="hidden" id="id" name="id" value="' . $row["USER_ID"] . '">
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">รหัสแอดมิน : </label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="user_name_show" class="form-control" value="' . $row["USER_USERNAME"] . '" disabled>
								<input type="hidden" name="user_name" class="form-control" value="' . $row["USER_USERNAME"] . '" >
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">ชื่อ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="firstname" class="form-control" value="' . $row["USER_FIRSTNAME"] . '">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">นามสกุล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="lastname" class="form-control" value="' . $row["USER_LASTNAME"] . '">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">อีเมล</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="email" class="form-control" value="' . $row["USER_EMAIL"] . '">
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="tel" class="form-control" value="' . $row["USER_TEL"] . '">
								</div>
								</div>'; ?>

								<div class="row form-group">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">เพศ : </label>
									</div>
									<div class="col col-md-5">
										<select id="gender" name="gender" required class="form-control" size="">
											<?php
											if ($row["USER_GENDER"] == "M") {
												echo '<option value="M" selected><h5>ชาย</h5></option>
														<option value="F"><h5>หญิง</h5></option>';
											} else if ($row["USER_GENDER"] == "F") {
												echo '<option value="M"><h5>ชาย</h5></option>
														<option value="F" selected><h5>หญิง</h5></option>';
											}
											?>
										</select>
									</div>
								</div>

							<?php echo '
								<div class="row form-group">
								<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">สถานะ</label>
								</div>
								<div class="col col-md-5">
								<input type="text" name="status_show" class="form-control" value="' . $row["USER_STATUS"] . '" disabled>
								<input type="hidden" name="status" class="form-control" value="' . $row["USER_STATUS"] . '" >
								</div>
								</div>
								';
							} elseif ($row["USER_STATUS"] == "PROFESSOR") {
								echo '
								<input type="hidden" id="id" name="id" value="' . $row["USER_ID"] . '">
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">รหัสอาจารย์ : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="user_name_show" class="form-control" value="' . $row["USER_USERNAME"] . '" disabled>
							<input type="hidden" name="user_name" class="form-control" value="' . $row["USER_USERNAME"] . '" >
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">ชื่อ</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="firstname" class="form-control" value="' . $row["USER_FIRSTNAME"] . '">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">นามสกุล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="lastname" class="form-control" value="' . $row["USER_LASTNAME"] . '">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">อีเมล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="email" class="form-control" value="' . $row["USER_EMAIL"] . '">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="tel" class="form-control" value="' . $row["USER_TEL"] . '">
							</div>
							</div>'; ?>

								<div class="row form-group">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">เพศ : </label>
									</div>
									<div class="col col-md-5">
										<select id="gender" name="gender" required class="form-control" size="">
											<?php
											if ($row["USER_GENDER"] == "M") {
												echo '<option value="M" selected><h5>ชาย</h5></option>
													<option value="F"><h5>หญิง</h5></option>';
											} else if ($row["USER_GENDER"] == "F") {
												echo '<option value="M"><h5>ชาย</h5></option>
													<option value="F" selected><h5>หญิง</h5></option>';
											}
											?>
										</select>
									</div>
								</div>

							<?php echo '
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">สถานะ</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="status_show" class="form-control" value="' . $row["USER_STATUS"] . '" disabled>
							<input type="hidden" name="status" class="form-control" value="' . $row["USER_STATUS"] . '" >
							</div>
							</div>
							';
							} elseif ($row["USER_STATUS"] == "PERSONNEL") {
								echo '
							<input type="hidden" id="id" name="id" value="' . $row["USER_ID"] . '">
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">รหัสเจ้าหน้าที่ : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="user_name_show" class="form-control" value="' . $row["USER_USERNAME"] . '" disabled>
							<input type="hidden" name="user_name" class="form-control" value="' . $row["USER_USERNAME"] . '" >
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">ชื่อ</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="firstname" class="form-control" value="' . $row["USER_FIRSTNAME"] . '">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">นามสกุล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="lastname" class="form-control" value="' . $row["USER_LASTNAME"] . '">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">อีเมล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="email" class="form-control" value="' . $row["USER_EMAIL"] . '">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="tel" class="form-control" value="' . $row["USER_TEL"] . '">
							</div>
							</div>'; ?>

								<div class="row form-group">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">เพศ : </label>
									</div>
									<div class="col col-md-5">
										<select id="gender" name="gender" required class="form-control" size="">
											<?php
											if ($row["USER_GENDER"] == "M") {
												echo '<option value="M" selected><h5>ชาย</h5></option>
													<option value="F"><h5>หญิง</h5></option>';
											} else if ($row["USER_GENDER"] == "F") {
												echo '<option value="M"><h5>ชาย</h5></option>
													<option value="F" selected><h5>หญิง</h5></option>';
											}
											?>
										</select>
									</div>
								</div>

							<?php echo '
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">สถานะ</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="status_show" class="form-control" value="' . $row["USER_STATUS"] . '" disabled>
							<input type="hidden" name="status" class="form-control" value="' . $row["USER_STATUS"] . '" >
							</div>
							</div>
							';
							} else {
								echo '
							<input type="hidden" id="id" name="id" value="' . $row["USER_ID"] . '">
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">รหัสนักศึกษา : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="user_name_show" class="form-control" value="' . $row["USER_USERNAME"] . '" disabled>
							<input type="hidden" name="user_name" class="form-control" value="' . $row["USER_USERNAME"] . '" >
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">ชื่อ : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="firstname" class="form-control" value="' . $row["USER_FIRSTNAME"] . '">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">นามสกุล : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="lastname" class="form-control" value="' . $row["USER_LASTNAME"] . '">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">อีเมล : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="email" class="form-control" value="' . $row["USER_EMAIL"] . '">
							</div>
							</div>'; ?>

								<div class="row form-group">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">เพศ : </label>
									</div>
									<div class="col col-md-5">
										<select id="gender" name="gender" required class="form-control" size="">
											<?php
											if ($row["USER_GENDER"] == "M") {
												echo '<option value="M" selected><h5>ชาย</h5></option>
													<option value="F"><h5>หญิง</h5></option>';
											} else if ($row["USER_GENDER"] == "F") {
												echo '<option value="M"><h5>ชาย</h5></option>
													<option value="F" selected><h5>หญิง</h5></option>';
											}
											?>
										</select>
									</div>
								</div>

								<?php echo '						
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์ : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="tel" class="form-control" value="' . $row["USER_TEL"] . '">
							</div>
							</div>'; ?>

								<div class="row form-group">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">อาจารย์ที่ปรึกษา : </label>
									</div>
									<div class="col col-md-5">
										<select id="advisors" name="advisors" required class="form-control" size="">
											<option value="">-- กรุณาเลือกชื่ออาจารย์ที่ปรึกษา --</option>
											<?php
											$sql = "SELECT * FROM M_USER WHERE USER_STATUS = 'PROFESSOR'";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												while ($row2 = $result->fetch_assoc()) {
													if($row["ADVISOR_ID"] == $row2["USER_ID"]) {
														$sel = "selected";
													} else {
														$sel = "";
													}
											?>
													<option value="<?php echo $row2["USER_ID"]; ?>" <?php echo $sel;?>>
													<?php echo $row2["USER_FIRSTNAME"] . ' ' . $row2["USER_LASTNAME"]; ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>

								<div class="row form-group">
									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">หลักสูตร : </label>
									</div>
									<div class="col col-md-5">
										<select id="branch" name="branch" required class="form-control" size="">
											<option value="">-- กรุณาเลือกหลักสูตร --</option>
											<?php
											$sql = "SELECT * FROM M_BRANCH";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												while ($row3 = $result->fetch_assoc()) {
													if($row["BRANCH_ID"] == $row3["BRANCH_ID"]) {
														$sel = "selected";
													} else {
														$sel = "";
													}
											?>
													<option value="<?php echo $row3["BRANCH_ID"]; ?>" <?php echo $sel;?>>
													<?php echo ("[ " . $row3["BRANCH_INITIAL"] . " ] " . $row3["BRANCH_NAME"]); ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>



						<?php echo '
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">GPA : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="gpa" class="form-control" value="' . $row["USER_GPA"] . '">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">GPAX : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="gpax" class="form-control" value="' . $row["USER_GPAX"] . '">
							</div>
							</div>
							<input type="hidden" id="status" name="status" value="' . $row["USER_STATUS"] . '">
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