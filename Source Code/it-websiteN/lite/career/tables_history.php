
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
            <strong class="card-title">ประวัติ แบบสอบถามทั้งหมด</strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>



                  <?php
                  if ($_SESSION["status"] == "personnel") {
                    echo '
                    <th><center>วันที่สร้างแบบทดสอบ</center></th>
                    <th><center>กลุ่มแบบทดสอบ</center></th>
                    <th><center>หมวด</center></th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>';
                  // $sql = "SELECT * FROM `question` WHERE `q_id` "; 
                    $sql = "SELECT * FROM question GROUP BY `q_group` "; 
                    $result = $conn->query($sql);
                    include("tablesform_q.php");

                  } elseif ($_SESSION["status"] == "student") {
                    // <th><center>วันที่สร้างแบบทดสอบ</center></th>
                    echo '
                    <th><center>กลุ่มแบบทดสอบ</center></th>
                    <th><center>หมวด</center></th>
                    <th><center>ทำแบบทดสอบเมื่อ</center></th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>';
                    // $sql = "SELECT * FROM `test_form` WHERE `tested_status` = 0 GROUP BY `form_group`"; 
                    $sql = "SELECT * FROM `test_form` WHERE `tested_status` = 0 GROUP BY `form_group`"; 

// $sql = "SELECT * FROM `question` WHERE `status_using`=0 ORDER BY `question`.`q_day` DESC"; 

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    { 
                      while($row = $result->fetch_assoc()) 
                      {  
                        if ($row["user_id"] == $_SESSION["id"]) {
                          echo '<tr>';
                          echo '<td align="center">';
                          echo $row["form_group"];  
                          echo '</td>';
                          echo '<td align="center">';
                          echo $row["form_side"];  
                          echo '</td>';
                          echo '<td align="center">';
                          echo $row["form_date"];  
                          echo '</td>';
                          echo '</td>';
                          echo '<td align="center">';
                          echo '<a title="ดูรายละเอียด"  class="btn-link ti-bookmark-alt" href="career-advice.php?career=tables_history2&q_group='.$row['form_group'].'"></a>'; 
                          // echo '<a title="ดูรายละเอียด"  class="btn-link ti-bookmark-alt" href="career-advice.php?career=tables_history2&q_group='.$row['form_group'].'&form_type='.$row['form_type'].'"></a>';  
                          echo '</td>';
                          echo '</tr>';
                        }
                      }    
                    }

                  }else{
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