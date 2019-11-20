 
<div class="row form-group">
	<div class="col-md-12">
		<center><strong><h3><?php echo $row["topics"] ?></h3></strong></center>
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
						$sql = "SELECT * FROM question,q2 WHERE question.q_id = q2.q_id AND q2.q_id =".$row["q_id"];
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{ 
							$i=0;
							
							while($row = $result->fetch_assoc()) 
							{  
								$i = $i + 1;
								echo '
								<input type="hidden" id="q_id2'.$i.'"  name="q_id2'.$i.'" value="'.$row["q_id"].'">
								<input type="hidden" id="q2_id'.$i.'"  name="q2_id'.$i.'" value="'.$row["q2_id"].'">
								<input type="hidden" id="q_noq2"  name="q_noq2" value="'.$row["q_no"].'"> 
								';
								echo '<tr>'; 
								echo '<td align="center" width="10%">ข้อ  '.$row["q2_no"].'</td>';
								?>



								<td align="right">
									<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_1" value="1" disabled/>
									<label for="choice<?php echo $i ?>_1"></label>
								</td>
								<td align="center">
									<input type="text" id="q2_detail<?php echo $i ?>" name="q2_detail<?php echo $i ?>" class="form-control" value="<?php echo $row['q2_detail'] ?>">
								</td>
								<td align="right">
									<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_2" value="2" disabled/>
									<label for="choice<?php echo $i ?>_2"></label>
								</td>
								<td align="center">
									<input type="text" id="q2_detail2<?php echo $i ?>" name="q2_detail2<?php echo $i ?>" class="form-control" value="<?php echo $row['q2_detail2'] ?>">
								</td>
								<?php
								echo '</tr>';
								$q_group = $row["q_group"] ;

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


