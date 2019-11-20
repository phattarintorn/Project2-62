
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title"><center>รายละเอียดอาชีพ</strong>
			</div><br>
			<div class="card-body">
				<div class="row">
					<div class="col-md-9">
						<div class="input-group"> 
							<br>
							<div class="left"> 
								<?php
								$career_id = $_REQUEST["career_id"];
								include("db/db.php"); 
								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}
								$sql = "SELECT * FROM `data_career` WHERE `career_id` =".$career_id;
								$result = $conn->query($sql);
								if ($result->num_rows > 0) 
								{ 
									while($row = $result->fetch_assoc()) 
									{
										?>
										<div class="modal-body">
											<strong>ชื่ออาชีพ :</strong> &nbsp; &nbsp; &nbsp;
											<?php echo $row["career_name"];?> 
											<br><hr>
											<strong>รายละเอียด :</strong> &nbsp; &nbsp; &nbsp;
											<?php echo $row["career_detail"];?> 
											<br><hr>
											<strong>หลักสูตร :</strong> &nbsp; &nbsp; &nbsp;
											<img style="width:30%;height:30%" src="images/career/course/<?php echo $row["career_course"];?>">
											<br><hr>
											<strong>รูปภาพอาชีพ :</strong> &nbsp; &nbsp; &nbsp;
											<img style="width:20%;height:20%" src="images/career/character/<?php echo $row["career_character"];?>">
											<br><hr>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				} 
				?>
				<br>
				<br>
				<div class="col-md-2">
					<button class="btn btn-secondary btn-sm" onclick="window.location='career-advice.php?career=add_career'">กลับ</button><br><br></div>

				
			</div>
			</div>
			</div>
			
				