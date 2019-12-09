
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
                $sql = "SELECT L.STUDENT_ID, L.CREATE_DATE, G.QUESTION_GROUP, G.QUESTION_PART, G.QUESTION_TYPE, 
                G.QUESTION_GROUP, G.QUESTION_ID FROM MAPPING_STUDENT_LOG AS L
                LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
                LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
                WHERE G.QUESTION_STATUS = 0 AND G.QUESTION_GROUP = $q_group 
                GROUP BY L.CREATE_DATE, G.QUESTION_TYPE";

                $result = $conn->query($sql);

                  if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) 
                    {  
                      if ($row["STUDENT_ID"] == $_SESSION["USER_ID"]) {
                        echo '<tr>';
                        echo '<td align="center">';
                        echo $row["CREATE_DATE"];  
                        echo '</td>';

                        echo '<td align="center">';
                        echo $row["QUESTION_GROUP"];  
                        echo '</td>';
                        
                        echo '<td align="center">';
                        echo $row["QUESTION_PART"];  
                        echo '</td>';

                        echo '<td align="center">';
                        echo $row["QUESTION_TYPE"]; 
                        echo '</td>';


                        echo '<td align="center">';
                        echo '<a title="ดูประวัติ"  class="btn-link ti-write" href="career-advice.php?career=check_form&QUESTION_GROUP='.$row['QUESTION_GROUP'].'&QUESTION_TYPE='.$row['QUESTION_TYPE'].'&CREATE_DATE='.$row['CREATE_DATE'].'"></a>';  
                        echo '</td>';
                        echo '<td align="center">'; 
                        echo '<a title="ดูรายงาน"  class="btn-link ti-book" href="career-advice.php?career=action&q_id='.$row['QUESTION_ID'].'&form_date='.$row['CREATE_DATE'].'&form_type='.$row['QUESTION_TYPE'].'&form_side='.$row['QUESTION_PART'].'"></a>';  
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

 
