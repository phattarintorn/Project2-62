 
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
			<br>โปรดเลือก 
			<input type="radio" name="radio" id="radio" checked="">
			<label for="radio">ตัวเลือกที่ตรงกับคำตอบของท่านมากที่สุด </label>
			หรือกรณีที่ไม่ตรงเลยให้เลือกข้อที่ใกล้เคียงกับคำตอบของท่านที่สุด<br>
		</p>
	</div> 
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">เพิ่มข้อมูลแบบสอบถาม</strong>
		</div>

		<div class="card-body">
			<form action="career-advice.php?career=update_detail" method="post" class="form-horizontal" id="q2">
				<table class="table table-striped" style="width:100%">
					<thead>

					</thead>
					<tbody>
						<?php
					
						$sql = "SELECT * FROM m_group_question AS Mq LEFT JOIN mapping_question AS map ON Mq.QUESTION_ID = map.QUESTION_ID  WHERE Mq.QUESTION_ID = '".$q_id."' AND Mq.QUESTION_TYPE = '".$q_type."'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{ 
							$i=0;
							
							while($row = $result->fetch_assoc()) 
							{  
								$i = $i + 1;
								echo '
								<input type="hidden" id="q_id2'.$i.'"  name="q_id2'.$i.'" value="'.$row["QUESTION_ID"].'">
								<input type="hidden" id="q2_id'.$i.'"  name="q2_id'.$i.'" value="'.$row["QUESTION_ID"].'">
								<input type="hidden" id="q_noq2"  name="q_noq2" value="'.$row["QUESTION_NO"].'"> 
								';
								echo '<tr>'; 
								echo '<td align="center" width="10%">ข้อ  '.$row["QUESTION_NO"].'</td>';
								?>



								<td align="right">
									<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_1" value="1" disabled/>
									<label for="choice<?php echo $i ?>_1"></label>
								</td>
								<td align="center">
									<input type="text" id="q2_detail<?php echo $i ?>" name="q2_detail<?php echo $i ?>" class="form-control" value="<?php echo $row['QUESTION_DETAIL_1'] ?>">
								</td>
								<td align="right">
									<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_2" value="2" disabled/>
									<label for="choice<?php echo $i ?>_2"></label>
								</td>
								<td align="center">
									<input type="text" id="q2_detail2<?php echo $i ?>" name="q2_detail2<?php echo $i ?>" class="form-control" value="<?php echo $row['QUESTION_DETAIL_2'] ?>">
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
				<button type="submit" class="btn btn-success " form="q2">บันทึก</button>
			</center><br><br>
		</div>
	</div>
</div>


