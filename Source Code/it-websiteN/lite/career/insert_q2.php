<div class="row form-group">
	<div class="col-md-12">

		<center>
			<strong><h5>หัวข้อ : <?php echo $row["QUESTION_PART"] ?></h5></strong>
		</center>
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
<hr>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title"><?php echo $row["QUESTION_PART"] ?></strong>
		</div>

		<div class="card-body">
			<table class="table table-striped" style="width:100%">
				<thead>
					<input type="hidden"  id="choose_nonq2" name="choose_nonq1" class="form-contro2" value="2">
				</thead>
				<tbody>

					<?php
					$q_no = $row['QUESTION_CHOICE'];
					// $choose_no = $row['choose_no'];
					

					for ($q2 = 1; $q2 <= $q_no ; $q2++) { 
						echo '<tr>';
						echo '<td align="center">ข้อ  '.$q2.'</td>';
						echo '<input type="hidden" id="q2'.$q2.'" name="q2'.$q2.'" value="'.$q2.'">';
						echo '<td align="right">
							<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_1" value="1" disabled/>
							<label for="choice<?php echo $i ?>_1"></label>
							</td>';
						echo '<td align="center">
							<input type="text" id="q2_detail'.$q2.'" name="q2_detail'.$q2.'" class="form-control" value="" required>
							</td>';
						echo '<td align="right">
							<input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_2" value="2" disabled/>
							<label for="choice<?php echo $i ?>_2"></label>
							</td>';
						echo '<td align="center">
							<input type="text" id="q2_detail2'.$q2.'" name="q2_detail2'.$q2.'" class="form-control" value="" required>
							</td>';
						echo '</tr>';
					}
					?>

				</tbody>
			</table>
			<?php $q_id = $row['QUESTION_ID']; ?>
			<input type="hidden" name="q_idq2" value="<?php echo $q_id?>">
			<input type="hidden" name="q_noq2" value="<?php echo $q_no?>">

		</div>
	</div>
</div>