<?php


include("db/db.php"); 


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$q_group = $_REQUEST['q_group'];

$sql = "SELECT * FROM `m_group_question` WHERE `QUESTION_GROUP`=".$q_group;

$result = $conn->query($sql);

?>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">แบบสอบถาม</strong>
		</div>
		<div class="card-body">
			<table id="bootstrap-data-table" class="table table-striped table-bordered">
				<thead>
					<tr>

						<th><center>กลุ่มแบบทดสอบ</center></th>
						<th><center>วันที่สร้างแบบทดสอบ</center></th>
						<th><center>แบบสอบถามด้าน</center></th>
						<th><center>ประเภทคำถาม</center></th>
						<th><center>สถานะการใช้</center></th>
						<th><center></center></th>

					</tr>
				</thead>
				<tbody>
					<?php
					if ($result->num_rows > 0) 
					{ 
						while($row = $result->fetch_assoc()) 
						{

							echo "<tr>";
							echo '<td><center>' . $row['QUESTION_GROUP'] . '</center></td>';
							echo '<td><center>' . $row['CREATE_DATE'] . '</center></td>';
							echo '<td><center>' . $row['QUESTION_PART'] . '</center></td>';
							echo '<td><center>'; 
							include("checkQtype.php"); 
							echo '</td>';
							
							echo '<td>'; 
							include("checkQstatus_using.php"); 
							echo '</td>';
							echo '<td><center>
							<a title="แก้ไข"  class="btn-link ti-write" href="career-advice.php?career=in_Q&id='.$row['QUESTION_ID'].'"></a>
							';

							echo '</center></td>';

							echo "</tr>"; 	
						}
					}		
					?>
				</tbody>
			</table>
		</div>
	</div>
	<CENTER >
		<a href="career-advice.php?career=tables_q">
			<button class="btn btn-danger">ย้อนกลับ</button>
		</a>			
	</CENTER>
</div>

