<div class="row form-group">
  <div class="col-md-12">
    <center><strong><h4>ประวัติการทำแบบทดสอบ</h4></strong></center>
  </div>
  <div class="col-md-2">
    <br>
    <center>คำชี้แจง</center>  
  </div> 
  <div class="col-md-10"> 
    <p>
      <br>โปรดเลือก ในช่องที่ตรงกับระดับความพึงพอใจของท่าน
      <br>ระดับความพึงพอใจ : 5 = มากที่สุด  4 = มาก  3 = ปานกลาง   2 = น้อย 1 = น้อยที่สุด <br>
    </p> 
  </div> 
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">แบบทดสอบ : ด้านความชอบ ความถนัด และมีความสมารถด้านนั้นๆ เป็นพื้นฐาน</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" style="width:100%; margin-bottom: 0;">
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

                $sql = "SELECT * FROM MAPPING_STUDENT_LOG AS L
                  LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
                  LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
                  WHERE G.QUESTION_STATUS = 0 AND G.QUESTION_TYPE = 'ความคิดเห็น'
                  AND G.QUESTION_GROUP = $QUESTION_GROUP AND L.STUDENT_ID = " . $_SESSION['USER_ID'] . "
                  AND L.CREATE_DATE = '$CREATE_DATE'"; 

                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                { 
                  $i=0;
                  while($row = $result->fetch_assoc()) 
                  {
                    if ($row["MAPPING_STUDENT_LOG_ID"] != "") {
                      $i = $i + 1;
                      echo '<tr>';
                      echo '<td align="center">';
                      // echo $row["criterion_no_form"];
                      echo $i;
                      echo '</td>';
                      ?>
                      <input type="hidden" id="user_idq1" name="user_idq1" value="<?php echo $_SESSION["USER_ID"] ?>"> 
                      <input type="hidden" id="q_idq1" name="q_idq1" value="<?php echo $row["QUESTION_ID"] ?>"> 
                      <td width="70%" style="padding-left: 5px;"><?php echo $row['QUESTION_DETAIL_1']?></td>
                      <!-- <tr> -->
                        <td width="5%" align="center">
                          <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_1" disabled value="1" 
                          <?php 
                          if (isset($row["QUESTION_SELECTED"])) {
                            if ($row["QUESTION_SELECTED"] == 1) {
                              echo "checked";
                            }
                          }  
                          ?> 
                          />
                          <label for="choice<?php echo $i ?>_1"></label>
                        </td>

                        <td width="5%" align="center">
                          <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_2" disabled value="2"
                          <?php 
                          if (isset($row["QUESTION_SELECTED"])) {
                            if ($row["QUESTION_SELECTED"] == 2) {
                              echo "checked";
                            }
                          }  
                          ?> 
                          />
                          <label for="choice<?php echo $i ?>_2"></label>
                        </td>
                        <td width="5%" align="center">
                          <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_3" disabled value="3"
                          <?php 
                          if (isset($row["QUESTION_SELECTED"])) {
                            if ($row["QUESTION_SELECTED"] == 3) {
                              echo "checked";
                            }
                          }  
                          ?>
                          />
                          <label for="choice<?php echo $i ?>_3"></label>
                        </td>
                        <td width="5%" align="center">
                          <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_4" disabled value="4"
                          <?php 
                          if (isset($row["QUESTION_SELECTED"])) {
                            if ($row["QUESTION_SELECTED"] == 4) {
                              echo "checked";
                            }
                          }  
                          ?>
                          />
                          <label for="choice<?php echo $i ?>_4"></label>
                        </td>
                        <td width="5%" align="center">
                          <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_5" disabled value="5"
                          <?php 
                          if (isset($row["QUESTION_SELECTED"])) {
                            if ($row["QUESTION_SELECTED"] == 5) {
                              echo "checked";
                            }
                          }  
                          ?>
                          />
                          <label for="choice<?php echo $i ?>_5"></label>
                        </td>
                      </tr>
                      <?php
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