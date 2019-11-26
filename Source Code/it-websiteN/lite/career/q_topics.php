<script language="JavaScript" type="text/JavaScript">
function AddQ(topics,selObj,restore){ //v3.0
	eval(topics+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	if (restore) selObj.selectedIndex=0;
}
</script>

<form action="career-advice.php?career=insert_Qtopics" method="post" enctype="multipart/form-data" name="frmAdd" class="form-horizontal">
	<div class="content mt-3">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<strong class="card-title">สร้างแบบสอบถาม</strong>
						</div>
						<div class="card-body">
							<br>
							<div class="row form-group">
								<div class="col-md-3">
								</div>
								<div class="col-md-3">
									จำนวนหัวข้อแบบสอบถาม : 
								</div>
								<div class="col-md-3">
									<select name="menu1" onChange="AddQ('parent',this,0)" class="form-control">

										<?php
										for($i=1;$i<=2;$i++)
										{
											if($_GET["Line"] == $i)
											{
												$sel = "selected";
											}
											else
											{
												$sel = "1";
											}

											?>
											<option value="<?php echo $_SERVER["PHP_SELF"];?>?career=q_topics&Line=<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
											<?php
										}
										?>
									</select>
								</div>
							</div> 
							<hr>
							<?php

							$line = $_GET["Line"];
							if($line == 0){$line=1;}
							for($i=1;$i<=$line;$i++)
							{

								?>
								<br>
								<div class="row form-group">
									<div class="col-md-2">
									</div>
									<div class="col-md-3">
										หมวดแบบสอบถาม <?php echo ' '.$i ?>
									</div>
									<div class="col-md-5">
										<select class="form-control" name="q_side<?php echo $i;?>" required>	
											<option></option>
											<option value="ด้านทักษะ" title="">วัดผลด้านทักษะ</option>
											<option value="ด้านจิตวิทยา" title="">วัดผลด้านจิตวิทยา</option>
										</select> 
						 			</div>
								</div> 

								<div class="row form-group">
									<div class="col-md-2">
									</div>
									<div class="col-md-3">
										รูปแบบการตอบแบบสอบถาม<?php echo ' '.$i ?>
									</div>
									<div class="col-md-5">
										<select class="form-control" name="q_type<?php echo $i;?>" required>	
											<option></option>
											<option value="ความคิดเห็น">ถามระดับความคิดเห็น</option>
											<option value="เปรียบเทียบ">ถามเปรียบเทียบ</option>
											<!-- <option value="Q3">เลือกเพียงหนึ่งคำตอบ</option> -->
											<!-- <option value="Q4">เลือกหลายคำตอบ</option> -->
										</select> 
										<?php
										if ($i == "1") {

										}else{
											echo '<center><small>*** หมายเหตุ *** กรุณาอย่าเลือกรูปแบบซ้ำกับหัวข้อก่อนหน้า</small></center>';
										}
										?>
										
									</div>
									<div class="col-md-2">
										
										<button  type="button" class="btn btn-link" title="ภาพตัวอย่าง" data-toggle="modal" data-target="#EX">
											<i class="mdi mdi-compare"></i><small> ตัวอย่าง</small>
										</button>
									</div>
								</div> 

								<div class="row form-group">
									<div class="col-md-2">
									</div>
									<div class="col-md-3">
										จำนวนข้อคำถาม 
									</div>
									<div class="col-md-5">
										<input type="number" class="form-control" name="q_no<?php echo $i;?>" placeholder="จำนวนข้อคำถาม" min="3" max="50" required> 
									</div>
								</div>
								<!-- <input type="hidden" class="form-control" name="choose_no<?php echo $i;?>" value="">   -->

								<!-- <div class="row form-group">
									<div class="col-md-2">
									</div>
									<div class="col-md-3">
										จำนวนตัวเลือกคำถาม 
									</div>
									<div class="col-md-5">
										<input type="number" class="form-control" name="choose_no<?php// echo $i;?>" placeholder="จำนวนตัวเลือก" min="2" max="5" required>  
									</div>
								</div> -->
								<hr>
								<?php

								include("db/db.php"); 

								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								} 

								$sql = "SELECT * FROM m_group_question WHERE QUESTION_ID ORDER BY QUESTION_GROUP DESC";

								$result = mysqli_query($conn, $sql);

								if (mysqli_num_rows($result) > 0) {
									$row = mysqli_fetch_assoc($result)
									?>
									<?php 
									$q_group = $row["QUESTION_GROUP"];
									$q_group++;
									if (!isset($q_group)) {
										echo "0";
									}
									
									echo '<input type="hidden" name="q_group'.$i.'" value="'.$q_group.'">';
									?>
									<?php

								}else{
									echo '<input type="hidden" name="q_group'.$i.'" value="1">';
									
								}
								$conn->close(); 
								?> 
								<?php
							}
							?>

							<input type="hidden" name="hdnLine" value="<?php echo $i;?>">
							<input type="hidden" name="q_day" value="<?php date_default_timezone_set('asia/bangkok'); echo date('y-m-d H:i:s'); ?>">
							<center>
								<button type="submit" value="submit" name="submit" class="btn btn-success">ต่อไป</button>
								<button type="submit" class="btn btn-danger">ยกเลิก</button>
							</center>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>