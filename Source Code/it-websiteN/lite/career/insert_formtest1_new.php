<div class="row form-group">
  <div class="col-md-12"> 
    <?php 
    echo '<hr>';
    echo '<center><strong><h4>แบบทดสอบ '.$row["QUESTION_PART"].'</h4></strong></center>';
    ?>
  </div>
  <div class="col-md-2">
    <br>
    <center><u>คำชี้แจง</u></center>  
  </div> 
  <div class="col-md-10"> 
    <p>
      <br>โปรดเลือก<input type="radio" name="radior1" id="radior1" checked="">
      <label for="radior1">ในช่องที่ตรงกับระดับความพึงพอใจของท่าน</label>
      <br>ระดับความพึงพอใจ : 5 = มากที่สุด  4 = มาก  3 = ปานกลาง   2 = น้อย 1 = น้อยที่สุด <br>
    </p> 
  </div> 
</div>

<!-- <form action="career-advice.php?career=insert_formtestdb" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="row"> 
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <strong class="card-title">แบบทดสอบ : <?php echo $row["QUESTION_PART"]; ?></strong> 
            </div>
            <div class="card-body">
              <table class="table table-striped" style="width:100%">
                <thead>
                  <th rowspan="3"><center>ข้อ</center></th>
                  <th rowspan="3"><center>เกณฑ์</center></th>
                  <th colspan="5"><center>ระดับความคิดเห็น</center></th>
                  <tr align="center">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                  </tr>

                </thead>
                <tbody>
                  <?php
                  // $sql = "SELECT * FROM `question`,`q1` WHERE question.q_id =  q1.q_id  AND  question.status_using= 0 AND question.q_group= ".$q_group; 
                  $sql = "SELECT * FROM MAPPING_QUESTION AS Q
                  LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
                  WHERE QUESTION_TYPE = 'ความคิดเห็น' AND G.QUESTION_GROUP = " . $QUESTION_GROUP;
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) 
                  {
                    $i=0;
                    while($row = $result->fetch_assoc()) 
                    { 

                      ?>
                      <input type="hidden" id="user_idq1" name="user_idq1" value="<?php echo $_SESSION["USER_ID"] ?>"> 
                      <input type="hidden" id="q_idq1" name="q_idq1" value="<?php echo $row["QUESTION_ID"] ?>"> 
                      <input type="hidden" id="q_group" name="q_group" value="<?php echo $row["QUESTION_GROUP"] ?>"> 
                      <input type="hidden" id="q_typeq1" name="q_typeq1" value="<?php echo $row["QUESTION_TYPE"] ?>"> 
                      <input type="hidden" id="q1_no" name="q1_no" value="<?php echo $row["QUESTION_NO"] ?>"> 

                      <?php
                      $i = $i + 1;
                      echo '<tr>';
                      echo '<td align="center">';
                      echo $row["QUESTION_NO"];
                      echo '</td>';

                      ?> 
                      <input type="hidden" id="q_idq1_<?php echo $i ?>" name="q_idq1_<?php echo $i ?>" value="<?php echo $row["MAPPING_QUESTION_ID"] ?>"> 
                      <input type="hidden" id="q_noq1<?php echo $i ?>" name="q_noq1<?php echo $i ?>" value="<?php echo $i ?>"> 
                      <input type="hidden" id="q1_detailq1<?php echo $i ?>" name="q1_detailq1<?php echo $i ?>" value="<?php echo $row["QUESTION_DETAIL_1"] ?>"> 
                      <input type="hidden" id="career<?php echo $i ?>" name="career<?php echo $i ?>" value="<?php echo $row["CAREER_ID_1"] ?>"> 
                      <input type="hidden" id="form_date<?php echo $i ?>" name="form_date<?php echo $i ?>" value="<?php date_default_timezone_set('asia/bangkok'); echo date('y-m-d H:i:s'); ?>"> 

                      <td width="70%" style="padding-left: 5px;"><?php echo $row['QUESTION_DETAIL_1']?></td>
                      <td width="5%" align="center">
                        <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_1" value="1" required />
                        <label for="choice<?php echo $i ?>_1"></label>
                      </td>
                      <td width="5%" align="center">
                        <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_2" value="2"/>
                        <label for="choice<?php echo $i ?>_2"></label>
                      </td>
                      <td width="5%" align="center">
                        <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_3" value="3"/>
                        <label for="choice<?php echo $i ?>_3"></label>
                      </td>
                      <td width="5%" align="center">
                        <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_4" value="4"/>
                        <label for="choice<?php echo $i ?>_4"></label>
                      </td>
                      <td width="5%" align="center">
                        <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_5" value="5"/>
                        <label for="choice<?php echo $i ?>_5"></label>
                      </td>

                      <?php
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
  <!-- </form> -->


