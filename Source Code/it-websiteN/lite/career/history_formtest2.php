<div class="row form-group">
  <div class="col-md-12"> 
    <?php 
    echo '<hr>';
    echo '<center><strong><h4>ประวัติการทำแบบทดสอบ</h4></strong></center>';
    ?>
  </div>
  <div class="col-md-2">
    <br>

    <center>คำชี้แจง</center>  
  </div> 
  <div class="col-md-10"> 
    <p>
      <br>โปรดเลือก 
      <input type="radio" name="radio" id="radio" checked="">
      <label for="radio">ตัวเลือกที่ตรงกับคำตอบของท่านมากที่สุด </label>
      หรือกรณีที่ไม่ตรงเลยให้เลือกข้อที่ใกล้เคียงกับคำตอบของท่านที่สุด<br>
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
            <table class="table table-striped" style="width:100%">
              <thead> 
              </thead>
              <tbody>
                <?php
                // $sql = "SELECT * FROM test_form,question WHERE question.q_id = test_form.q_id AND `form_group` = '$q_group' AND question.status_using = '0' AND `user_id`=".$_SESSION["id"]; 
                $sql = "SELECT * FROM MAPPING_STUDENT_LOG AS L
                  LEFT JOIN MAPPING_QUESTION AS Q ON L.MAPPING_QUESTION_ID = Q.MAPPING_QUESTION_ID
                  LEFT JOIN M_GROUP_QUESTION AS G ON Q.QUESTION_ID = G.QUESTION_ID
                  WHERE G.QUESTION_STATUS = 0 AND G.QUESTION_GROUP = $QUESTION_GROUP 
                  AND G.QUESTION_TYPE = 'เปรียบเทียบ' AND L.STUDENT_ID = " . $_SESSION['USER_ID'] . "
                  AND L.CREATE_DATE = '$CREATE_DATE'"; 

                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                { 
                  $i=0;
                  while($row = $result->fetch_assoc()) 
                  {  
                    if ($row["MAPPING_STUDENT_LOG_ID"] != "") {                      
                      $i = $i + 1;
                      ?>
                      <input type="hidden" id="user_idq2" name="user_idq2" value="<?php echo $_SESSION["USER_ID"] ?>"> 
                      <input type="hidden" id="q_idq2" name="q_idq2" value="<?php echo $row["QUESTION_ID"] ?>"> 
                      <input type="hidden" id="q_noq2<?php echo $i ?>" name="q_noq2<?php echo $i ?>" value="<?php echo $i ?>"> 
                      <input type="hidden" id="q_group" name="q_group" value="<?php echo $row["QUESTION_GROUP"] ?>"> 

                      <?php
                      echo '<tr>';

                      echo '<td align="center" width="10%">ข้อ  ' .$row["QUESTION_NO"].'</td>';
                      ?>
                      <td width="5%" align="center">
                        <input type="radio" name="choice_form<?php echo $i ?>" id="choice_form<?php echo $i ?>_1" disabled value="1" 
                        <?php 
                        if (isset($row["QUESTION_SELECTED"])) {
                          if ($row["QUESTION_SELECTED"] == 1) {
                            echo "checked";
                          }
                        }  
                        ?>
                        />
                        <label for="choice_form<?php echo $i ?>_1"></label>
                      </td>
                      <td width="40%" style="padding-left: 5px;">
                        <?php echo $row['QUESTION_DETAIL_1']?>
                        <input type="hidden" id="q2_detail<?php echo $i ?>" name="q2_detail<?php echo $i ?>" disabled value="<?php echo $row["QUESTION_DETAIL_1"] ?>">
                      </td>


                      <td width="5%" align="center">
                        <input type="radio" name="choice_form<?php echo $i ?>" id="choice_form<?php echo $i ?>_2" disabled value="2" 
                        <?php 
                        if (isset($row["QUESTION_SELECTED"])) {
                          if ($row["QUESTION_SELECTED"] == 2) {
                            echo "checked";
                          }
                        }  
                        ?>
                        />
                        <label for="choice_form<?php echo $i ?>_2"></label>
                      </td> 
                      <td width="40%" style="padding-left: 5px;">
                        <?php echo $row['QUESTION_DETAIL_2']?>
                        <input type="hidden" id="q2_detail2<?php echo $i ?>" name="q2_detail2<?php echo $i ?>" value="<?php echo $row["QUESTION_DETAIL_2"] ?>">
                      </td>

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