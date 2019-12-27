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
WHERE USER_ID =".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
	while($row = $result->fetch_assoc()) 
	{
		?>

<div class="card">
    <div class="card-header">
        <strong>ข้อมูลผู้ใช้</strong>
    </div>

    <div class="card-body card-block">
        <form action="career-advice.php?career=insertuser" method="post" enctype="multipart/form-data"
            class="form-horizontal" id="edituser_profile">

            <?php
					if (isset($row["USER_STATUS"])) {
						if ($row["USER_STATUS"] == "ADMIN") {
							echo '
							<input type="hidden" id="id" name="id" value="'.$row["USER_ID"].'">
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">รหัสแอดมิน:</label>
							</div>
							<div class="col col-md-5">
							'.$row["USER_USERNAME"].'
							<input type="hidden" name="user_name" class="form-control" value="'.$row["USER_USERNAME"].'" >
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">ชื่อ</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="firstname" class="form-control" value="'.$row["USER_FIRSTNAME"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">นามสกุล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="lastname" class="form-control" value="'.$row["USER_LASTNAME"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">อีเมล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="email" class="form-control" value="'.$row["USER_EMAIL"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="tel" class="form-control" value="'.$row["USER_TEL"].'">
							</div>
							</div>';?>

							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">เพศ:</label>
							</div>
							<div class="col col-md-5">
							<?php
								if($row["USER_GENDER"] == "M")
								{
									echo 'ชาย';
								} else {
									echo 'หญิง';
								}
							?>
							</div>
							</div>
							<?php echo '
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">สถานะ</label>
							</div>
							<div class="col col-md-5">
							'.$row["USER_STATUS"].'
							<input type="hidden" name="status" class="form-control" value="'.$row["USER_STATUS"].'" >
							</div>
							</div>
							';
						}elseif ($row["USER_STATUS"] == "PROFESSOR") {
							echo '
							<input type="hidden" id="id" name="id" value="'.$row["USER_ID"].'">
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">รหัสอาจารย์:</label>
							</div>
							<div class="col col-md-5">
							'.$row["USER_USERNAME"].'
							<input type="hidden" name="user_name" class="form-control" value="'.$row["USER_USERNAME"].'" >
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">ชื่อ</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="firstname" class="form-control" value="'.$row["USER_FIRSTNAME"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">นามสกุล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="lastname" class="form-control" value="'.$row["USER_LASTNAME"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">อีเมล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="email" class="form-control" value="'.$row["USER_EMAIL"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="tel" class="form-control" value="'.$row["USER_TEL"].'">
							</div>
							</div>';?>

							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">เพศ:</label>
							</div>
							<div class="col col-md-5">
							<?php
								if($row["USER_GENDER"] == "M")
								{
									echo 'ชาย';
								} else {
									echo 'หญิง';
								}
							?>
							</div>
							</div>
							<?php echo '
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">สถานะ</label>
							</div>
							<div class="col col-md-5">
							'.$row["USER_STATUS"].'
							<input type="hidden" name="status" class="form-control" value="'.$row["USER_STATUS"].'" >
							</div>
							</div>
							';
						}elseif ($row["USER_STATUS"] == "PERSONNEL") {
							echo '
							<input type="hidden" id="id" name="id" value="'.$row["USER_ID"].'">
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">รหัสเจ้าหน้าที่:</label>
							</div>
							<div class="col col-md-5">
							'.$row["USER_USERNAME"].'
							<input type="hidden" name="user_name" class="form-control" value="'.$row["USER_USERNAME"].'" >
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">ชื่อ</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="firstname" class="form-control" value="'.$row["USER_FIRSTNAME"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">นามสกุล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="lastname" class="form-control" value="'.$row["USER_LASTNAME"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">อีเมล</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="email" class="form-control" value="'.$row["USER_EMAIL"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">หมายเลขโทรศัพท์</label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="tel" class="form-control" value="'.$row["USER_TEL"].'">
							</div>
							</div>';?>

							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">เพศ:</label>
							</div>
							<div class="col col-md-5">
							<?php
								if($row["USER_GENDER"] == "M")
								{
									echo 'ชาย';
								} else {
									echo 'หญิง';
								}
							?>
							</div>
							</div>
							<?php echo '
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">สถานะ</label>
							</div>
							<div class="col col-md-5">
							'.$row["USER_STATUS"].'
							<input type="hidden" name="status" class="form-control" value="'.$row["USER_STATUS"].'" >
							</div>
							</div>
							';
						} else if ($row["USER_STATUS"] == "STUDENT") {
							echo '
							<input type="hidden" id="id" name="id" value="'.$row["USER_ID"].'">
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">รหัสนักศึกษา : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="user_name_show" class="form-control" value="'.$row["USER_USERNAME"].'" disabled>
							<input type="hidden" name="user_name" class="form-control" value="'.$row["USER_USERNAME"].'" >
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">ชื่อ : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="firstname" class="form-control" value="'.$row["USER_FIRSTNAME"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">นามสกุล : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="lastname" class="form-control" value="'.$row["USER_LASTNAME"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">อีเมล : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="email" class="form-control" value="'.$row["USER_EMAIL"].'">
							</div>
							</div>';?>

							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">เพศ : </label>
								</div>
								<div class="col col-md-5">
									<select id="gender" name="gender" required class="form-control"  size="">
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
							<input type="text" name="tel" class="form-control" value="'.$row["USER_TEL"].'">
							</div>
							</div>'; ?>
							
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">อาจารย์ที่ปรึกษา : </label>
								</div>
								<div class="col col-md-5">
									<?php
										$sql = "SELECT u.USER_FIRSTNAME, u.USER_LASTNAME FROM m_user as u
										LEFT JOIN mapping_student_data as mdata ON u.USER_ID = mdata.ADVISOR_ID
										WHERE student_ID = ".$id;

										$result = $conn->query($sql);
										
										if ($result->num_rows > 0) {  
											while ($row2 = $result->fetch_assoc()) {
												echo '<input type="text" name="advisor_name_show" class="form-control" 
													value="'. $row2["USER_FIRSTNAME"].' '.$row2["USER_LASTNAME"] .'" disabled>';
											}
										}
									?>
								</div>
							</div>

							<?php echo '
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">GPA : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="gpa" class="form-control" value="'.$row["USER_GPA"].'">
							</div>
							</div>
							<div class="row form-group">
							<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">GPAX : </label>
							</div>
							<div class="col col-md-5">
							<input type="text" name="gpax" class="form-control" value="'.$row["USER_GPAX"].'">
							</div>
							</div>
							<input type="hidden" id="status" name="status" value="'.$row["USER_STATUS"].'">
							';
						}
					}
					?>
		</form>
		<br>
		<div class="row form-group">
			<div class="col col-md-4">
			</div>
			<div class="col col-md-2">
            	<button type="submit" form="edituser_profile" class="btn btn-success " style = "width:10vw;">บันทึก</button>
			</div>
			<div class="col col-md-2">
				<a href="career-advice.php?career=user_profile">
					<button class="btn btn-danger" style = "width:10vw;">ยกเลิก</i></button></a>
				</a>
			</div>
			<div class="col col-md-4">
			</div>
		</div>
    </div>
</div>
</div>


<?php
}

$conn->close(); 
}
?>