 
<?php  include("db/db.php"); ?>
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">

      <div class="col-md-12">
        <a href="index.php?page=page1">
          <!-- <button type="button" class="btn btn-success btn-sm"></button> -->
        </a>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">ข้อมูลนักศึกษา</strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th><center>รหัสนักศึกษา</center></th>
                  <th><center>ชื่อ</center></th>
                  <th><center>เกรดเฉลี่ย</center></th>
                  <th><center>เกรดเฉลี่ยรวม</center></th>
                  <th><center>สถานะแผนการเรียน</center></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $advisor_id = $_SESSION["USER_ID"];
                if ($_SESSION["USER_STATUS"] == "PROFESSOR") { 
                  $sql = "SELECT * FROM m_user 
                  LEFT JOIN mapping_student_data ON m_user.USER_ID = mapping_student_data.STUDENT_ID
                  LEFT JOIN mapping_student_plan AS std_p ON m_user.USER_ID = std_p.STUDENT_ID
                  WHERE m_user.USER_STATUS = 'STUDENT' AND mapping_student_data.ADVISOR_ID = $advisor_id";
                  
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  { 
                    while($row = $result->fetch_assoc()) 
                    { 
                      echo '<tr>';
                      echo '<td>'.$row['USER_USERNAME'].'</td>';
                      echo '<td>'.$row['USER_FIRSTNAME'].' '.$row['USER_LASTNAME'].'</td>';
                      echo '<td>'.$row['USER_GPA'].'</td>';
                      echo '<td>'.$row['USER_GPAX'].'</td>';
                      if ($row['PLAN_STATUS'] == 0) {
                        if ($row['STUDENT_PLAN'] == 'LIFE'){
                          echo '<td align="center">ตลอดชีวิต</td>';
                        } else {
                          echo '<td align="center">ยังไม่ผ่าน</td>';
                        }
                      } else {
                        echo '<td align="center">ผ่านแล้ว</td>';
                      }
                      echo '<td align="center">
                      <a title="แผนการเรียน"  class="btn-link ti-write" href="career-advice.php?career=student_professor_view_module&id='.$row['USER_ID'].'"></a>
                      <a title="รายงาน"  class="btn-link ti-bar-chart" href="career-advice.php?career=student_professor_view&id='.$row['USER_ID'].'"></a>
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

