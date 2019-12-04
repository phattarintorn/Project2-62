<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<div class="col-md-2">
</div>
<div class="col-md-2">
	<button class="btn btn-success"  data-toggle="modal" data-target="#AddCareer">เพิ่มอาชีพ</button>
</div><br>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title"><center>อาชีพ</strong></center>
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
                    <th><center>ชื่ออาชีพ</center></th>
                    <th><center>รูป</center></th> 
                    <th></th>
                  </tr>
                </thead>
                <tbody>
				<?php
				$sql = "SELECT * FROM m_career WHERE CAREER_ID";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{ 
					while($row = $result->fetch_assoc()) 
					{
					  echo "<tr>";
                      echo '<td><center>'.$row['CAREER_NAME'].'</center></td>';
                      echo '<td><center>'.$row['CAREER_IMAGE'].'</center></td>';
                      echo '<td><center>
                      <a title="รายละเอียดอาชีพ" class="btn-link ti-clipboard" href="#"> </a>
                      <a title="แก้ไข" class="btn-link ti-write" href="#"> </a>';
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



