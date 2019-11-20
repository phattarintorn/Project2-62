
<?php  
include("db/db.php"); 
$q_group = $_REQUEST['q_group'];

?>
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">

      <div class="col-md-12">
        <a href="index.php?page=page1">
        </a>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">ประวัติ แบบสอบถามกลุ่มที่ <?php echo $q_group; ?></strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr> 
                  <th><center>ทำแบบทดสอบเมื่อ</center></th>
                  <th><center>กลุ่มแบบทดสอบ</center></th>
                  <th><center>หมวด</center></th>
                  <th><center>รูปแบบ</center></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php

                $sql = "SELECT * FROM `test_form` WHERE `tested_status` = 0 AND `form_group` = '$q_group' GROUP BY `form_date`,`form_type`"; 

                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                { 
                  while($row = $result->fetch_assoc()) 
                  {  
                    if ($row["user_id"] == $_SESSION["id"]) {
                      echo '<tr>';
                      echo '<td align="center">';
                      echo $row["form_date"];  
                      echo '</td>';

                      echo '<td align="center">';
                      echo $row["form_group"];  
                      echo '</td>';
                      
                      echo '<td align="center">';
                      echo $row["form_side"];  
                      echo '</td>';

                      echo '<td align="center">';
                      if ($row["form_type"] == "Q1") { 
                        echo "ถามระดับความคิดเห็น";
                      }elseif ($row["form_type"]  == "Q2") { 
                        echo "ถามเปรียบเทียบ";
                      }else{} 
                      echo '</td>';


                      echo '<td align="center">';
                      echo '<a title="ดูประวัติ"  class="btn-link ti-write" href="career-advice.php?career=check_form&q_group='.$row['form_group'].'"></a>';  
                      echo '</td>';
                      echo '<td align="center">'; 
                      echo '<a title="ดูรายงาน"  class="btn-link ti-book" href="career-advice.php?career=action&q_id='.$row['q_id'].'&form_date='.$row['form_date'].'&form_type='.$row['form_type'].'&form_side='.$row['form_side'].'"></a>';  
                      echo '</td>';
                      echo '</tr>';
                    }
                  }    
                }


                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-2"> 
  <a href="career-advice.php?career=tables_history">
    <button class="btn btn-secondary">กลับ</i></button></a>
  </a> 
</div>

 
