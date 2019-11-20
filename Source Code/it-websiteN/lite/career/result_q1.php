
<div class="row form-group">
	<div class="col-md-12">
		<center><strong><h3>แบบสอบถาม <?php echo $row["q_side"] ?></h3></strong></center>
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
						$sql = "SELECT * FROM question,q1 WHERE question.q_id = q1.q_id AND question.q_group =".$q_group;
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{ 
							$i = 0;
							while($row = $result->fetch_assoc()) 
							{  
								$i = $i + 1;
								echo '<tr>'; 
								if ($row["career"] != "") {

								}else{  
									echo '
									<input type="hidden" name="q1_group" value="'.$row["q_group"].'">
									<input type="hidden" name="q_id" value="'.$row["q_id"].'">
									<input type="hidden" name="q1_id" value="'.$row["q1_id"].'">
									<input type="hidden" name="q1_id'.$i.'" value="'.$row["q1_id"].'">
									<input type="hidden" name="q_no" value="'.$row["q_no"].'"> 
									<input type="hidden" name="q1_no'.$i.'" value="'.$row["q1_no"].'">';

									if ($row["q1_no"] == "1") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice1" id="choice1" value="1"/>
										<label for="choice1" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "2") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice2" id="choice2" value="2"/>
										<label for="choice2" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									}
									if ($row["q1_no"] == "3") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice3" id="choice3" value="3"/>
										<label for="choice3" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									}
									if ($row["q1_no"] == "4") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice4" id="choice4" value="4"/>
										<label for="choice4" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									}
									if ($row["q1_no"] == "5") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice5" id="choice5" value="5"/>
										<label for="choice5" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									}
									if ($row["q1_no"] == "6") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice6" id="choice6" value="6"/>
										<label for="choice6" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									}
									if ($row["q1_no"] == "7") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice7" id="choice7" value="7"/>
										<label for="choice7" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									}
									if ($row["q1_no"] == "8") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice8" id="choice8" value="8"/>
										<label for="choice8" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									}
									if ($row["q1_no"] == "9") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice9" id="choice9" value="9"/>
										<label for="choice9" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									}
									if ($row["q1_no"] == "10") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice10" id="choice10" value="10"/>
										<label for="choice10" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									}
									if ($row["q1_no"] == "11") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice11" id="choice11" value="11"/>
										<label for="choice11" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "12") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice12" id="choice12" value="12"/>
										<label for="choice12" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "13") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice13" id="choice13" value="13"/>
										<label for="choice13" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "14") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice14" id="choice14" value="14"/>
										<label for="choice14" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "15") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice15" id="choice15" value="15"/>
										<label for="choice15" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "16") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice16" id="choice16" value="16"/>
										<label for="choice16" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "17") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice17" id="choice17" value="17"/>
										<label for="choice17" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "18") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice18" id="choice18" value="18"/>
										<label for="choice18" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "19") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice19" id="choice19" value="19"/>
										<label for="choice19" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "20") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice20" id="choice20" value="19"/>
										<label for="choice20" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "21") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice21" id="choice21" value="19"/>
										<label for="choice21" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "22") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice22" id="choice22" value="19"/>
										<label for="choice22" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "23") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice23" id="choice23" value="19"/>
										<label for="choice23" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "24") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice24" id="choice24" value="19"/>
										<label for="choice24" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "25") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice25" id="choice25" value="19"/>
										<label for="choice25" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "26") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice26" id="choice26" value="19"/>
										<label for="choice26" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "27") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice27" id="choice27" value="19"/>
										<label for="choice27" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "28") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice28" id="choice28" value="19"/>
										<label for="choice28" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "29") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice29" id="choice29" value="19"/>
										<label for="choice29" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "30") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice30" id="choice30" value="19"/>
										<label for="choice30" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "31") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice31" id="choice31" value="19"/>
										<label for="choice31" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "32") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice32" id="choice32" value="19"/>
										<label for="choice32" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "33") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice33" id="choice33" value="19"/>
										<label for="choice33" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "34") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice34" id="choice34" value="19"/>
										<label for="choice34" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "35") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice35" id="choice35" value="19"/>
										<label for="choice35" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "36") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice36" id="choice36" value="19"/>
										<label for="choice36" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "37") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice37" id="choice37" value="19"/>
										<label for="choice37" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "38") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice38" id="choice38" value="19"/>
										<label for="choice38" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "39") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice39" id="choice39" value="19"/>
										<label for="choice39" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "40") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice40" id="choice40" value="19"/>
										<label for="choice40" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "41") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice41" id="choice41" value="19"/>
										<label for="choice41" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "42") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice42" id="choice42" value="19"/>
										<label for="choice42" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "43") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice43" id="choice43" value="19"/>
										<label for="choice43" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "44") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice44" id="choice44" value="19"/>
										<label for="choice44" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "45") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice45" id="choice45" value="19"/>
										<label for="choice45" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "46") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice46" id="choice46" value="19"/>
										<label for="choice46" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "47") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice47" id="choice47" value="19"/>
										<label for="choice47" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "48") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice48" id="choice48" value="19"/>
										<label for="choice48" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "49") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice49" id="choice49" value="19"/>
										<label for="choice49" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
										echo '</td>';  
									} 
									if ($row["q1_no"] == "50") {  
										echo ' 
										<td width="10%" align="center">
										<input type="checkbox" name="choice50" id="choice50" value="19"/>
										<label for="choice50" ></label></br> ';
										echo '<td align="center">';
										echo $row["q1_no"];
										echo '</td>';  
										echo '<td align="left">';
										echo $row["q1_detail"];
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
							<!-- <textarea type="text" rows="2" id="subject" name="subject" class="form-control" placeholder=""> 
							</textarea>  -->
							<small> 
								<table>
									
									<tr>
										<td><font color="red">***  เพิ่มเติม เช่น  </font></td> 
										<td><font color="red">คำถามด้านทักษะ </font></td>
										<td><font color="red">อาชีพ: โปรแกรมเมอร์ </font></td> 
										<td><font color="red">เพิ่มเติม: ทักษะการเขียนโปรแกรม </font></td>
									</tr>
									<tr>
										<td></td> 
										<td><font color="red">คำถามด้านจิตวิทยา </font></td>
										<td><font color="red">อาชีพ: โปรแกรมเมอร์ </font></td> 
										<td><font color="red">เพิ่มเติม: กระตือรือร้นและหนักแน่น ***</font></td>
									</tr> 

								</table> 
							</small>
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


<!-- <button type="submit" class="btn btn-secondary">ยกเลิก</button>
	<button type="submit" value="submit" name="submit" class="btn btn-primary">ต่อไป</button> -->