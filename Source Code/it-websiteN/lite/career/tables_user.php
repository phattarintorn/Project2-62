 
<?php  include("db/db.php"); ?>
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">

      <div class="col-md-12">
        <a href="page-register.php">
          <button type="button" class="btn btn-success">เพิ่มบัญชีบุคลากร</button>
        </a> 
      </div>
      <br>
      <br>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">ข้อมูลผู้ใช้</strong><br>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>รหัสผู้ใช้</th>
                  <th>ชื่อ</th>
                  <th>เพศ</th>
                  <th>สถานนะ</th>
                  <th>อีเมล</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                // if (isset($_SESSION["levels_train"])) {
                if ($_SESSION["status"] == "admin") {
                  $sql = "SELECT * FROM `customer` WHERE `id` ORDER BY `customer`.`status` ASC"; 
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  { 
                    while($row = $result->fetch_assoc()) 
                    { 
                      echo "<tr>";
                      echo '<td>'.$row['user_id'].'</td>';
                      echo '<td>'.$row['firstname'].' ' .$row['lastname'].'</td>';
                      echo '<td>'.$row['sex'].'</td>';
                      echo '<td>'.$row['status'].'</td>';
                      echo '<td>'.$row['email'].'</td>';
                      echo '<td>
                      <a title="แก้ไข"  class="btn-link ti-write" href="career-advice.php?career=edituser_ad&id='.$row['id'].'"></a>
                      <a title="ลบ"  class="btn-link ti-trash" href="career-advice.php?career=deleteadmin_profile&id='.$row['id'].'"> </a>
                      </td>';
                      echo "</tr>"; 
                    }   
                  }
                } 
                $conn->close(); 
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--.ontent -->
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

