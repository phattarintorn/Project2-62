
<div class="row form-group">
	<div class="col-md-12">
		<center><strong><h3>แบบสอบถาม <?php echo $row["q_side"] ?></h3></strong></center>
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
						$sql = "SELECT * FROM question,q2 WHERE question.q_id = q2.q_id AND question.q_group =".$q_group;
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{ 
							$i = 0;
							while($row = $result->fetch_assoc()) 
							{  
								$i = $i + 1;
								
								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "1") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice1" id="choice1" value="1" disabled/>
										<label for="choice1" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "1") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice1" id="choice1" value="1"/>
										<label for="choice1" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "1") {
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice2" id="choice2" value="2" disabled/>
										<label for="choice2" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "1") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice2" id="choice2" value="2" />
										<label for="choice2" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 1 

								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "2") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice3" id="choice3" value="1" disabled/>
										<label for="choice3" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "2") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice3" id="choice3" value="1"/>
										<label for="choice3" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "2") { 
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice4" id="choice4" value="2" disabled/>
										<label for="choice4" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "2") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice4" id="choice4" value="2" />
										<label for="choice4" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 2

								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "3") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice5" id="choice5" value="1" disabled/>
										<label for="choice5" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "3") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice5" id="choice5" value="1"/>
										<label for="choice5" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "3") {
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice6" id="choice6" value="2" disabled/>
										<label for="choice6" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "3") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice6" id="choice6" value="2" />
										<label for="choice6" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 3

								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "4") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice7" id="choice7" value="1" disabled/>
										<label for="choice7" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "4") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice7" id="choice7" value="1"/>
										<label for="choice7" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "4") { 
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice8" id="choice8" value="2" disabled/>
										<label for="choice8" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "4") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice8" id="choice8" value="2" />
										<label for="choice8" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 4 

								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "5") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice9" id="choice9" value="1" disabled/>
										<label for="choice9" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "5") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice9" id="choice9" value="1"/>
										<label for="choice9" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "5") { 
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice10" id="choice10" value="2" disabled/>
										<label for="choice10" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "5") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice10" id="choice10" value="2" />
										<label for="choice10" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 5

								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "6") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice11" id="choice11" value="1" disabled/>
										<label for="choice11" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "6") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice11" id="choice11" value="1"/>
										<label for="choice11" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "6") { 
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice12" id="choice12" value="2" disabled/>
										<label for="choice12" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "6") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice12" id="choice12" value="2" />
										<label for="choice12" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 6

								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "7") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice13" id="choice13" value="1" disabled/>
										<label for="choice13" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "7") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice13" id="choice13" value="1"/>
										<label for="choice13" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "7") { 
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice14" id="choice14" value="2" disabled/>
										<label for="choice14" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "7") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice14" id="choice14" value="2" />
										<label for="choice14" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 7
								
								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "8") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice15" id="choice15" value="1" disabled/>
										<label for="choice15" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "8") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice15" id="choice15" value="1"/>
										<label for="choice15" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "8") { 
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice16" id="choice16" value="2" disabled/>
										<label for="choice16" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "8") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice16" id="choice16" value="2" />
										<label for="choice16" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 8

								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "9") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice17" id="choice17" value="1" disabled/>
										<label for="choice17" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "9") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice17" id="choice17" value="1"/>
										<label for="choice17" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "9") { 
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice18" id="choice18" value="2" disabled/>
										<label for="choice18" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "9") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice18" id="choice18" value="2" />
										<label for="choice18" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 9 

								echo '<tr>'; 
								if ($row["career"] != "") {
									if ($row["q2_no"] == "10") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice19" id="choice19" value="1" disabled/>
										<label for="choice19" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "10") {  
										echo '<td align="center">';
										echo $row["q2_no"];
										echo '</td>';  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice19" id="choice19" value="1"/>
										<label for="choice19" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail"];
										echo '</td>';  
									} 
								}
								//------------c1 end
								if ($row["career2"] != "") {
									if ($row["q2_no"] == "10") { 
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice20" id="choice20" value="2" disabled/>
										<label for="choice20" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}else{  
									echo '
									<input type="hidden" name="q2_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q2_id" value="'.$row["q2_id"].'">
									<input type="hidden" name="q2_id'.$i.'" value="'.$row["q2_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q2_no'.$i.'" value="'.$row["q2_no"].'">';

									if ($row["q2_no"] == "10") {  
										echo '<td width="10%" align="center">
										<input type="checkbox" name="choice20" id="choice20" value="2" />
										<label for="choice20" ></label></br> ';
										echo '<td align="left">';
										echo $row["q2_detail2"];
										echo '</td>';  
									} 
								}
								//------------c2 end
								echo '</tr>'; 
								//------------num end 10

								
							}
						} 
						?>
					</tbody>
				</table> 
				<hr>

				<br>
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
								$sql = "SELECT * FROM `data_career` WHERE `career_id`";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) 
								{  
									while($row = $result->fetch_assoc()) 
									{  
										?>
										<option value="<?php echo $row["career_name"];?>"><?php echo $row["career_name"];?></option>  
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
						<div class="col col-md-2">
							<label for="text-input" class="form-control-label">เพิ่มเติม</label>
						</div>
						<div class="col col-md-8">
							<input type="text" name="subject" id="subject" placeholder="" class="form-control" >
							<!-- <textarea type="text" rows="2" id="subject" name="subject" class="form-control" placeholder="" required>  
							</textarea>  -->
							<small> 
								<table>
									<tr>
										<td>**  เพิ่มเติม เช่น  </td> 
										<td>คำถามด้านทักษะ </td>
										<td>อาชีพ: โปรแกรมเมอร์</td> 
										<td>เพิ่มเติม: ทักษะการเขียนโปรแกรม</td>
									</tr>
									<tr>
										<td></td> 
										<td>คำถามด้านจิตวิทยา </td>
										<td>อาชีพ: โปรแกรมเมอร์</td> 
										<td>เพิ่มเติม: กระตือรือร้นและหนักแน่น</td>
									</tr> 
								</table> 
							</small>
						</div> 
					</div>
					<input type="hidden" name="q_group" value="<?php echo $q_group ?>">
					<div class="form-group"> 
						<center>
							<button type="submit" class="btn btn-success">บันทึก</button> 
						</center> 
					</div>
				</div> 
			</center>
		</div>
	</div>
</form> 

