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
                $sql = "SELECT * FROM `question`,`test_form` WHERE question.q_id = test_form.q_id AND question.status_using= 0 AND test_form.tested_status =0 AND test_form.form_type = question.q_type AND test_form.form_type = 'Q1'   AND test_form.form_group = '$q_group' AND test_form.user_id=".$_SESSION["id"]; 
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                { 
                  $i=0;
                  while($row = $result->fetch_assoc()) 
                  {  
                    if ($row["form_id"] != "") {
                      $i = $i + 1;
                      echo '<tr>';
                      echo '<td align="center">';
                      echo $row["criterion_no_form"];
                      echo '</td>';
                      ?>
                      <input type="hidden" id="user_idq1" name="user_idq1" value="<?php echo $_SESSION["id"] ?>"> 
                      <input type="hidden" id="q_idq1" name="q_idq1" value="<?php echo $row["q_id"] ?>"> 
                      <td width="70%" style="padding-left: 5px;"><?php echo $row['criterion_form']?></td>
                      <!-- <tr> -->
                        <td width="5%" align="center">
                          <input type="radio" name="choice<?php echo $i ?>" id="choice<?php echo $i ?>_1" disabled value="1" 
                          <?php 
                          if (isset($row["choice_form"])) {
                            if ($row["choice_form"] == 1) {
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
                          if (isset($row["choice_form"])) {
                            if ($row["choice_form"] == 2) {
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
                          if (isset($row["choice_form"])) {
                            if ($row["choice_form"] == 3) {
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
                          if (isset($row["choice_form"])) {
                            if ($row["choice_form"] == 4) {
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
                          if (isset($row["choice_form"])) {
                            if ($row["choice_form"] == 5) {
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