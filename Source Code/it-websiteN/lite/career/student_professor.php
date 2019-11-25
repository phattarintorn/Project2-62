 
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
            <strong class="card-title">ข้อมูลผู้ใช้</strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>รหัสนักศึกษา</th>
                  <th>ชื่อ</th>
                  <th>เกรดเฉลี่ย</th>
                  <th>เกรดเฉลี่ยรวม</th>
                  <th><center>ผลการทำแบบสอบถาม</center></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $advisor_id = $_SESSION["USER_ID"];
                if ($_SESSION["USER_STATUS"] == "PROFESSOR") { 
                  $sql = "SELECT * FROM m_user 
                  LEFT JOIN mapping_student_data
                  ON m_user.USER_ID = mapping_student_data.STUDENT_ID
                  WHERE m_user.USER_STATUS = 'STUDENT' AND mapping_student_data.ADVISOR_ID = $advisor_id";
                  
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  { 
                    while($row = $result->fetch_assoc()) 
                    { 
                      echo "<tr>";
                      echo '<td>'.$row['USER_USERNAME'].'</td>';
                      echo '<td>'.$row['USER_FIRSTNAME'].' '.$row['USER_LASTNAME'].'</td>';
                      echo '<td>'.$row['USER_GPA'].'</td>';
                      echo '<td>'.$row['USER_GPAX'].'</td>';
                      echo '<td align="center">
                      <a title="ดูรายละเอียด"  class="btn-link ti-bookmark-alt" href="career-advice.php?career=student_professor_view&id='.$row['USER_ID'].'"></a>
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
<?php 
?> 
