<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="col-md-2">
</div>
<div class="col-md-2">
	<button class="btn btn-success"  data-toggle="modal" data-target="#AddModule">เพิ่มชุดวิชา</button>
</div><br>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title"><center>ชุดวิชา</strong></center>
		</div>

		<div class="card-body">
				<?php
				include("db/db.php"); 

				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				?>

				<table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th><center>รหัสชุดวิชา</center></th>
                    <th><center>ชื่อชุดวิชา</center></th>
					<th><center>สถานะ</center></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
				<?php
				$sql = "SELECT * FROM m_module WHERE MODULE_ID ";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{ $i=0;
					while($row = $result->fetch_assoc()) 
					{
						$i++;
					  echo "<tr>";
                      echo '<td><left>'.$row['MODULE_CODE'].'</left></td>';
					  echo '<td><left>'.$row['MODULE_NAME'].'</left></td>';
					  if($row["MODULE_STATUS"]=="0"){
						echo '<td><left>เปิดใช้งาน</left></td>';
					  }else{
						echo '<td><left>ปิดใช้งาน</left></td>';
					  }
                      echo '<td><center>
                      <a title="รายละเอียดชุดวิชา" class="btn-link ti-clipboard" href="career-advice.php?career=detail_module&module_id='.$row['MODULE_ID'].'"> </a>
                      <a title="แก้ไข" class="btn-link ti-write" href="career-advice.php?career=edit_module&module_id='.$row['MODULE_ID'].'"> </a>';
					  if ($row["MODULE_STATUS"]=="0") { 
                        echo '<input type="hidden" name="status_using" value="1">';
                        echo '<a title="ปิดการใช้"  class="btn-link ti-power-off" href="career-advice.php?career=upsta_module&module_id='.$row['MODULE_ID'].'&status_using=1"> </a> ';
                      }else{
                        echo '<input type="hidden" name="status_using" value="0">';
                        echo '<a title="เปิดการใช้"  class="btn-link ti-power-off" href="career-advice.php?career=upsta_module&module_id='.$row['MODULE_ID'].'&status_using=0"> </a> ';
                      } 
					  echo '</center></td>'; 
					  echo "</tr>";
					
                    }   
                  } ?>
                </tbody>
              </table>			 
		</div>
	</div>
</div>

<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/lib/data-table/datatables-init.js"></script>



