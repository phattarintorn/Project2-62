<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="col-md-2">
</div>
<div class="col-md-2">
	<button class="btn btn-success"  data-toggle="modal" data-target="#AddCourse">เพิ่มรายวิชา</button>
</div><br>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title"><center>รายวิชา</strong></center>
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
                    <th><center>รหัสรายวิชา</center></th>
                    <th><center>ชื่อรายวิชา</center></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
				<?php
				$sql = "SELECT * FROM m_course WHERE COURSE_ID ";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{ $i=0;
					while($row = $result->fetch_assoc()) 
					{
						$i++;
					  echo "<tr>";
                      echo '<td><left id=code'.$row['COURSE_ID'].'>'.$row['COURSE_CODE'].'</left></td>';
                      echo '<td><left id=name'.$row['COURSE_ID'].'>'.$row['COURSE_NAME'].'</left></td>';
                      echo '<td><center>
                      <a title="แก้ไข" class="btn-link ti-write" data-toggle="modal" data-target="#EditCourse" data-whatever="'.$row['COURSE_ID'].'" style="color:skyblue "></a>';
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



