 
<div class="row form-group">
	<div class="col-md-12">
		<center><strong><h3></h3></strong></center>
	</div>
	<div class="col-md-2">
		<br>

		<center>คำชี้แจง</center>  
	</div> 
	<div class="col-md-10"> 
		<p>
			<br>โปรดเลือก <input type="radio" name="radio" id="radio" checked="">
			<label for="radio">ในช่องที่ตรงกับระดับความพึงพอใจของท่าน</label>
			<br>ระดับความพึงพอใจ : 5 = มากที่สุด  4 = มาก  3 = ปานกลาง	 2 = น้อย 1 = น้อยที่สุด <br>
		</p>  
	</div> 
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">เพิ่มข้อมูลแบบสอบถาม</strong>
		</div>

		<div class="card-body">
			<form action="career-advice.php?career=update_detail" method="post" class="form-horizontal" id="q1">
				<table class="table table-striped" style="width:100%">
					<thead>
						<th rowspan="3"><center>ข้อ</center></th>
						<th rowspan="3"><center>เกณฑ์</center></th>
						<th colspan="5"><center>ระดับความคิดเห็น</center></th>

						
						<tr align="center"> 
							<td>1</td> 
							<td>2</td> 
							<td>3</td> 
							<td>4</td> 
							<td>5</td> 
						</tr>
					</thead>
					<tbody>
						<?php
						
 						$sql = "SELECT * FROM m_group_question AS Mq LEFT JOIN mapping_question AS map ON Mq.QUESTION_ID = map.QUESTION_ID  WHERE Mq.QUESTION_ID = '".$q_id."' AND Mq.QUESTION_TYPE = '".$q_type."'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{ 
							$i = 0;
							while($row = $result->fetch_assoc()) 
							{  
								$i = $i + 1;
								echo '
								<input type="hidden" id="q_id'.$i.'"  name="q_id'.$i.'" value="'.$row["QUESTION_ID"].'">
								<input type="hidden" id="q_noq1"  name="q_noq1" value="'.$row["QUESTION_NO"].'">
								<input type="hidden" id="choose_nonq1"  name="choose_nonq1" value="'.$row["QUESTION_CHOICE"].'">
								';
								
								echo '<tr>';
								echo '<td align="center">';
								echo $row["QUESTION_NO"];
								echo '</td>'; 

								?>
								<td width="75%" style="padding-left: 5px;">
									<input type="text"  id="q1_detail<?php echo $i ?>" name="q1_detail<?php echo $i ?>" class="form-control" value="<?php echo $row['QUESTION_DETAIL_1']?>">
								</td>
								<td width="5%" align="center">
									<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_1" value="1" disabled/>
									<label for="choice<?php echo $i ?>_1"></label>
								</td>
								<td width="5%" align="center">
									<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_2" value="2" disabled/>
									<label for="choice<?php echo $i ?>_2"></label>
								</td>
								<td width="5%" align="center">
									<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_3" value="3" disabled/>
									<label for="choice<?php echo $i ?>_3"></label>
								</td>
								<td width="5%" align="center">
									<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_4" value="4" disabled/>
									<label for="choice<?php echo $i ?>_4"></label>
								</td>
								<td width="5%" align="center">
									<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_5" value="5" disabled/>
									<label for="choice<?php echo $i ?>_5"></label>
								</td>
								<?php
								echo '</tr>';
								$q_group = $row["QUESTION_GROUP"] ;
							}
						} 
						?>
					</tbody>
				</table>

			</form>

			<center>
				<a href="career-advice.php?career=in_Qgroup&q_group=<?php echo $q_group ?>">
					<button class="btn btn-danger">ยกเลิก</i></button></a>
				</a>
				<button type="submit" class="btn btn-success " form="q1">บันทึก</button>
			</center><br><br>
		</div>
	</div>
</div>


