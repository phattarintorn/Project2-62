
<div class="row form-group">
	<div class="col-md-12">
		<center><strong><h3>แบบสอบถาม <?php echo $row["QUESTION_PART"] ?></h3></strong></center>
	</div> 
</div>

<form name="Form" action="career-advice.php?career=define_variables2" method="POST"enctype="multipart/form-data" id="Form">	 
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
						<th rowspan="3"><center>ข้อ</center></th>
						<th rowspan="3"><center>ตัวเลือก</center></th>
						<th rowspan="3"><center>คำถาม</center></th>
						<th rowspan="3"><center>ตัวเลือก</center></th>
						<th rowspan="3"><center>คำถาม</center></th>
					</thead>
					<tbody>
						<?php 
						$count_C1 = 0;
						$count_C2 = 0;
						$sql = "SELECT * FROM m_group_question AS Mq LEFT JOIN mapping_question AS map ON Mq.QUESTION_ID = map.QUESTION_ID  WHERE  Mq.QUESTION_GROUP = '".$q_group."' AND Mq.QUESTION_TYPE = '".$q_type."'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{ 
							$i = 0;
							
							while($row = $result->fetch_assoc()) 
							{  
								$i = $i + 1;
								$question_no = $row["QUESTION_NO"];	
								$question_num = $question_no;
								echo '<tr>'; 
								if ($row["CAREER_ID_1"] != "") {
									if ($row["QUESTION_NO"] == $question_no) {  
										echo '<td align="center">';
										echo $row["QUESTION_NO"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="q2_choice'.$i.'" id="q2_choice'.$i.'" value="'.$i.'" disabled/>
										<label for="q2_choice'.$i.'" ></label></br> ';
										echo '<td align="left">';
										echo $row["QUESTION_DETAIL_1"];
										echo '</td>'; 
										
										
									} 
								}else{  
									$count_C1++;
									echo '
									<input type="hidden" name="q2_group" value="'.$row["QUESTION_GROUP"].'">
									<input type="hidden" name="q_id" value="'.$row["QUESTION_ID"].'">
									<input type="hidden" name="q_no" value="'.$row["QUESTION_NO"].'">
									<input type="hidden" name="q_no'.$i.'" value="'.$row["QUESTION_NO"].'">
									<input type="hidden" name="career_1" value="career_1">'
									;

									if ($row["QUESTION_NO"] == $question_no) {
										
										echo '<td align="center">';
										echo $row["QUESTION_NO"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="q2_choice'.$i.'" id="q2_choice'.$i.'" value="'.$i.'"/>
										<label for="q2_choice'.$i.'" ></label></br> ';
										echo '<td align="left">';
										echo $row["QUESTION_DETAIL_1"];
										echo '</td>';  
										
										 
									} 
								}
								$i = $i + 1;
								//------------c1 end
								if ($row["CAREER_ID_2"] != "") {
									if ($row["QUESTION_NO"] == $question_no) {
										
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="q2_choice'.$i.'" id="q2_choice'.$i.'" value="'.$i .'" disabled/>
										<label for="q2_choice'.$i .'" ></label></br> ';
										echo '<td align="left">';
										echo $row["QUESTION_DETAIL_2"];
										echo '</td>';  
										$question_num++;
										
									} 
								}else{  
									$count_C2++;
									echo '
									<input type="hidden" name="q2_group" value="'.$row["QUESTION_GROUP"].'">
									<input type="hidden" name="q_id" value="'.$row["QUESTION_ID"].'">
									<input type="hidden" name="q_no" value="'.$row["QUESTION_NO"].'">
									<input type="hidden" name="q_no'.$i.'" value="'.$row["QUESTION_NO"].'">
									<input type="hidden" name="career_2" value="career_2">';


									if ($row["QUESTION_NO"] == $question_no) {  
										
										echo '<td width="10%" align="center">
										<input type="checkbox" name="q2_choice'.$i.'" id="q2_choice'.$i .'" value="'.$i.'" />
										<label for="q2_choice'.$i.'" ></label></br> ';
										echo '<td align="left">';
										echo $row["QUESTION_DETAIL_2"];
										echo '</td>';  
										$question_num++;
										
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 1 								
							}
						} 
						?>
					</tbody>
				</table> 
				<hr>

				<br>
				<center id='career_Q2'>
					<div class="row form-group">
						<div class="col col-md-1"> 
						</div>
						<div class="col col-md-2">
							<label for="text-input" class="form-control-label" >อาชีพ</label>
						</div>
						<div class="col col-md-8">
							<select class="form-control" name="career" required=""> 
								<option></option>
								<?php  
								$sql = "SELECT * FROM m_career ";
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
					<input type="hidden" name="q_group" value="<?php echo $q_group ?>">
					<div class="form-group"> 
						<center>
							<button type="submit" id="saveDataQ2"class="btn btn-success">บันทึก</button> 
						</center> 
					</div>
				</div> 
			</center>
		</div>
		<?php 
			if($count_C1==0 && $count_C2==0)
				echo ("<script = 'javascript'>
					document.getElementById('career_Q2').remove();
				</script>");
		?>
	</div>
</form> 

