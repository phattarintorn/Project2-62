 
<?php  include("db/db.php"); ?>
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">แบบสอบถามทั้งหมด</strong>
          </div>
          <div class="card-body">
            <?php
            if ($_SESSION["status"] == "personnel") {
              ?>
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th><center>วันที่สร้างแบบทดสอบ</center></th>
                    <th><center>กลุ่มแบบทดสอบ</center></th> 
                    <th>สถานะ</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM question WHERE choose_no != '' GROUP BY `q_group`"; 
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  { 
                    while($row = $result->fetch_assoc()) 
                    { 
                      echo "<tr>";
                      echo '<td><center>'.$row['q_day'].'</center></td>';
                      echo '<td><center>'.$row['q_group'].'</center></td>';
                      echo '<td>'; 
                      include("checkQstatus_using.php"); 
                      echo '</td>';
                      echo '<td><center>
                      <a title="รายละเอียดแบบสอบถาม" class="btn-link ti-clipboard" href="career-advice.php?career=check_Qresult3&q_group='.$row['q_group'].'"> </a>

                      <a title="แก้ไข" class="btn-link ti-write" href="career-advice.php?career=in_Qgroup&q_group='.$row['q_group'].'"> </a>';

                      if ($row["status_using"]=="0") { 
                        echo '<input type="hidden" name="status_using" value="1">';
                        echo '<a title="ปิดการใช้"  class="btn-link ti-power-off" href="career-advice.php?career=upsta_using&q_group='.$row['q_group'].'&status_using=1"> </a> ';
                      }else{
                        echo '<input type="hidden" name="status_using" value="0">';
                        echo '<a title="เปิดการใช้"  class="btn-link ti-power-off" href="career-advice.php?career=upsta_using&q_group='.$row['q_group'].'&status_using=0"> </a> ';
                      }
                      echo "</tr>"; 
                    }   
                  } ?>
                </tbody>
              </table>
              <?php
            } 
            ?>

            <?php
            if ($_SESSION["status"] == "student") {
              ?>
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th><center>วันที่สร้างแบบทดสอบ</center></th>
                    <th><center>กลุ่มแบบทดสอบ</center></th> 
                    <th><center>หัวข้อ</center></th>
                    <th><center>รูปแบบ</center></th> 
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM `question` WHERE `status_using`=0 AND choose_no != ''  GROUP BY `q_group` DESC"; 
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  { 
                    while($row = $result->fetch_assoc()) 
                    { 
                      echo "<tr>"; 
                      echo '<td><center>' . $row['q_day'] . '</center></td>';
                      echo '<td><center>' . $row['q_group'] . '</center></td>';
                      echo '<td><center>' . $row['q_side'] . '</center></td>';
                      echo '<td><center>'; 
                      include("checkQtype.php"); 
                      echo '</center></td>';
                      echo '<td><center>
                      <a title="ทำแบบทดสอบ"  class="btn-link ti-write" href="career-advice.php?career=check_formtest&q_group='.$row['q_group'].'"></a>
                      </center></td>'; 
                      echo "</tr>"; 
                    }   
                  } ?>
                </tbody>
              </table>
              <?php
            } 
            ?>
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
 