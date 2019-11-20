<div class="row form-group">
	<div class="col-md-12">
		<center><strong><h3><?php echo $row["q_side"] ?></h3></strong></center>
	</div>
	<div class="col-md-2">
		<center><u>คำชี้แจง</u></center>  
	</div> 
	<div class="col-md-10"> 
		<p>
			โปรดเลือก 
			<input type="radio" name="radio" id="radio" checked="">
			<label for="radio">ตัวเลือกที่ตรงกับคำตอบของท่านมากที่สุด </label>
			หรือกรณีที่ไม่ตรงเลยให้เลือกข้อที่ใกล้เคียงกับคำตอบของท่านที่สุด<br>
		</p>
	</div> 
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title"><?php echo $row["q_side"] ?></strong>
		</div>

		<div class="card-body">
			<table class="table table-striped" style="width:100%">
				<thead>


				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM question,q2 WHERE question.q_id = q2.q_id AND question.q_group =".$q_group;
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{ 
						$i = 0;
						while($row = $result->fetch_assoc()) 
						{  
							$i = $i + 1;
							echo '<tr>';

							echo '<td align="center" width="10%">ข้อ  ' .$row["q2_no"].'</td>';
							?>
							<td width="5%" align="center">
								<input type="radio" name="choice7<?php echo $i ?>" id="choice7<?php echo $i ?>_1" value="1" disabled/>
								<label for="choice7<?php echo $i ?>_1"></label>
							</td>
							<td width="40%" style="padding-left: 5px;"><?php echo $row['q2_detail']?></td>


							<td width="5%" align="center">
								<input type="radio" name="choice7<?php echo $i ?>" id="choice7<?php echo $i ?>_2" value="2" disabled/>
								<label for="choice7<?php echo $i ?>_2"></label>
							</td> 
							<td width="40%" style="padding-left: 5px;"><?php echo $row['q2_detail2']?></td>

							<?php
							echo '</tr>';
						}
					} 
					?>
				</tbody>
			</table>
			<?php $q_id = $row['q_id']; ?>
			<input type="hidden" id="q_id"  name="q_id" value="<?php echo $q_id?>">
		</div>
	</div>
</div>