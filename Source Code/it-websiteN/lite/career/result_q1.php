
<div class="row form-group">
	<div class="col-md-12">
		<center><strong><h3>แบบสอบถาม <?php echo $row["QUESTION_PART"] ?></h3></strong></center>
	</div> 
</div>  

<form name="Form" action="career-advice.php?career=define_variables" method="POST"enctype="multipart/form-data" id="Form">	 
	<div class="col-md-12">
		<div class="card"> 
			<div class="card-header">
				<strong class="card-title">การกำหนดตัวแปร</strong> 
				<small>กรุณากำหนดว่าคำถามในแต่ละข้อให้ผลลัพธ์เป็นอาชีพใด</small>
			</div>
			<div class="card-body">
				<br> 
				<div class="col-md-12">
					<u>คำชี้แจง</u> เมื่อกำหนดครบทุกตัวเลือก ท่านจะไม่สารถเลือกได้อีก ถือเป็นการเสร็จสิ้นการสร้างแบบสอบถาม 
				</div>
				<br>
				<br>
				<table class="table table-striped" style="width:100%">
					<thead>
						<th rowspan="3"><center> </center></th>
						<th rowspan="3"><center>ข้อ</center></th>
						<th rowspan="3"><center>เกณฑ์</center></th> 
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM m_group_question AS Mq LEFT JOIN mapping_question AS map ON Mq.QUESTION_ID = map.QUESTION_ID  WHERE  Mq.QUESTION_GROUP = '".$q_group."' AND Mq.QUESTION_TYPE = '".$q_type."'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{ 
							$i = 0;
							while($row = $result->fetch_assoc()) 
							{  
								$i = $i + 1;
								echo '<tr>'; 
								if ($row["CAREER_ID_1"] != "") {

								}else{  
									
									echo '
									<input type="hidden" name="q1_group" value="'.$row["QUESTION_GROUP"].'">
									<input type="hidden" name="q_id" value="'.$row["QUESTION_ID"].'">
									<input type="hidden" name="q_no" value="'.$row["QUESTION_NO"].'">'; 
									$question_no = $row["QUESTION_NO"];
									if ($row["QUESTION_NO"] == $question_no) {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice'.$question_no.'" id="choice'.$question_no.'" value="'. $question_no.'"/>
										<label for="choice'.$question_no.'" ></label></br> ';
										echo '<td align="center">';
										echo $row["QUESTION_NO"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["QUESTION_DETAIL_1"];
										echo '</td>';  
									} 
									echo '</tr>';
								}  
							}
						} 
						?>
					</tbody>
				</table> 

				<center>
					<div class="row form-group">
						<div class="col col-md-1"> 
						</div>
						<div class="col col-md-2">
							<label for="text-input" class="form-control-label">อาชีพ</label>
						</div>
						<div class="col col-md-8">
							<select class="form-control" name="career" required=""> 
								<option></option>
								<?php  
								$sql = "SELECT * FROM `m_career` WHERE `career_id`";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) 
								{  
									while($row = $result->fetch_assoc()) 
									{  
										?>
										<option value="<?php echo $row["CAREER_ID"];?>"><?php echo $row["CAREER_NAME"];?></option>  
										<?php
									}
								} 
								?>	 
							</select> 
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-1"> 
						</div>
					</div>
					<div class="form-group"> 
						<center>
							<button type="submit" class="btn btn-success">บันทึก</button> 
						</center> 
					</div>
				</div> 
			</center>
		</div>
	</div>
</div>  
</form> 


