 
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
                $firstname = $_SESSION["firstname"];
                if ($_SESSION["status"] == "professor") { 
                  $sql = "SELECT * FROM `customer` WHERE `status`='student' AND`advisors` LIKE '%".$firstname."%' ";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) 
                  { 
                    while($row = $result->fetch_assoc()) 
                    { 
                      echo "<tr>";
                      echo '<td>'.$row['user_id'].'</td>';
                      echo '<td>'.$row['firstname'].' '.$row['lastname'].'</td>';
                      echo '<td>'.$row['gpa'].'</td>';
                      echo '<td>'.$row['gpax'].'</td>';
                      echo '<td align="center">
                      <a title="ดูรายละเอียด"  class="btn-link ti-bookmark-alt" href="career-advice.php?career=student_professor_view&id='.$row['id'].'"></a>
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
