<div class="row form-group">
	<div class="col-md-12">
		<center><strong><h3><?php echo $row["q_side"] ?></h3></strong></center>
	</div>
	<div class="col-md-2">
		<center><u>คำชี้แจง</u></center>  
	</div> 
	<div class="col-md-10"> 
		<p>
			โปรดเลือก<input type="radio" name="radior1" id="radior1" checked="">
			<label for="radior1">ในช่องที่ตรงกับระดับความพึงพอใจของท่าน</label>
			<br>ระดับความพึงพอใจ : 5 = มากที่สุด  4 = มาก  3 = ปานกลาง	 2 = น้อย 1 = น้อยที่สุด <br>
		</p> 
	</div> 
</div>  

<div class="col-md-12">
	<div class="card"> 
		<div class="card-body">
			<table class="table table-striped" style="width:100%">
				<thead>
					<th rowspan="3"><center>ข้อ</center></th>
					<th rowspan="3"><center>เกณฑ์</center></th>
					<th colspan="5"><center>ระดับความคิดเห็น</center></th>

					<?php $choose_no = $row['choose_no']; ?>
					<tr align="center">
						<?php
						for ($level = 1; $level <= 5 ; $level++) { 
							echo '<td>' .$level.'</td>';
						}
						?>
					</tr>
				</thead>
				<tbody>
					<?php 

					$sql = "SELECT * FROM question,q1 WHERE question.q_id = q1.q_id AND question.q_group =".$q_group;
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{ 
						$i = 0;
						while($row = $result->fetch_assoc()) 
						{  
							$i = $i + 1;
							echo '<tr>';
							echo '<td align="center">';
							echo $row["q1_no"];
							echo '</td>'; 

							?>
							<td width="70%" style="padding-left: 5px;"><?php echo $row['q1_detail']?></td>
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
							
						}
					} 
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>