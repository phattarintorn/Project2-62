<div class="row form-group">
	<div class="col-md-12">

		<center>
			<strong><h5>หัวข้อ : <?php echo $row["topics"] ?></h5></strong>
		</center>
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
		<!-- <input type="text" name="explanation" class="form-control" placeholder="คำชี้แจง" value="<?php //echo $row["explanation"]; ?>"> -->
	</div> 
</div> 
<hr>
<table class="table table-striped" style="width:100%">
	<thead>
		<th rowspan="3"><center>ข้อ</center></th>
		<th rowspan="3"><center>เกณฑ์</center></th>
		<th colspan="5"><center>ระดับความคิดเห็น</center></th>
		<?php $choose_no = $row['QUESTION_CHOOSE']; ?>
		<tr align="center">
			<?php
			for ($level = 1; $level <= 5 ; $level++) { 
				echo '<td>' .$level.'</td>';
	 		}
			?>
		</tr>

	</thead>
	<tbody>
		<?php $q_no = $row['QUESTION_CHOISE'];
		for ($q1 = 1; $q1 <= $q_no ; $q1++) { 
			echo '<tr>';
			echo '<td align="center">'.$q1.'</td>'; 
			echo '<td align="center" width="700">
			<input type="text"  id="q1_detail'.$q1.'" name="q1_detail'.$q1.'" class="form-control" value="" required>
			<input type="hidden"  id="choose_nonq1" name="choose_nonq1" class="form-control" value="5">  
			</td>'; 

			for ($level = 1; $level <= 5 ; $level++) { 
				echo '<td align="center">';
				echo '<input type="radio" id="choiceq1'.$q1.'['.$level.']" name="choiceq1['.$q1.']" value="'.$level.'" disabled>
				<label for="choiceq1'.$q1.'['.$level.']"></label>';
				echo '</td>';
			}
			echo '</tr>';
		}
		?>
	</tbody>
</table> 
<?php $q_id = $row['QUESTION_ID']; ?>
<input type="hidden" id="q_idq1" name="q_idq1" value="<?php echo $q_id?>">
<input type="hidden" id="q_noq1" name="q_noq1" value="<?php echo $q_no?>">
