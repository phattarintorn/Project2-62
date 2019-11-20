<div class="col-md-2">
</div>
<div class="col-md-2">
	<button class="btn btn-success"  data-toggle="modal" data-target="#AddCareer">เพิ่มอาชีพ</button>
</div><br>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title"><center>อาชีพ</strong></center>
		</div><br><br>

		<div class="card-body">
			<div class="row">
				
				<?php
				include("db/db.php"); 


				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}


				$sql = "SELECT * FROM `data_career` WHERE `career_id`";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{ 
					while($row = $result->fetch_assoc()) 
					{
						?>	
						<div class="col-xs-3 col-sm-3">
							<div class="card">
								<center>
									<br><strong><!-- อาชีพ:  --><?php echo $row["career_name"]; ?><hr></strong>
									<img src="images/career/character/<?php echo $row["career_character"]; ?>" title="<?php echo $row["career_detail"]; ?>"	  style="width:80%;max-width:180px;height:80%;max-height:280px" >
									<br><br>

									<button type="submit"class="btn btn-success btn-sm" onclick="window.location='career-advice.php?career=detail_career&career_id=<?php echo $row["career_id"] ?>'">ดูรายละเอียด</button>
									<button type="submit" value="submit" name="submit" class="btn btn-danger btn-sm" onclick="window.location='career-advice.php?career=delete_career&career_id=<?php echo $row["career_id"] ?>'">ลบข้อมูล</button><br><br>
								</center>
							</div>

						</div>
						<?php

					}
				}	

				?>
			</div>
		</div>
	</div>
</div>




