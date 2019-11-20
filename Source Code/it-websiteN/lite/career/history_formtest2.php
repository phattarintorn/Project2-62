<div class="row form-group">
  <div class="col-md-12"> 
    <?php 
    echo '<hr>';
    echo '<center><strong><h4>ประวัติการทำแบบทดสอบ</h4></strong></center>';
    // echo '<center><strong><h4>'.$row["topics"].'</h4></strong></center>'; 
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
                $sql = "SELECT * FROM test_form,question WHERE question.q_id = test_form.q_id AND `form_group` = '$q_group' AND question.status_using = '0' AND `user_id`=".$_SESSION["id"]; 
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                { 
                  $i=0;
                  while($row = $result->fetch_assoc()) 
                  {  
                    if ($row["form_id"] != "") {
                      // include("history_formtest2.php");
                      
                      $i = $i + 1;
                      ?>
                      <input type="hidden" id="user_idq2" name="user_idq2" value="<?php echo $_SESSION["id"] ?>"> 
                      <input type="hidden" id="q_idq2" name="q_idq2" value="<?php echo $row["q_id"] ?>"> 
                      <input type="hidden" id="q_noq2<?php echo $i ?>" name="q_noq2<?php echo $i ?>" value="<?php echo $i ?>"> 
                      <input type="hidden" id="q_group" name="q_group" value="<?php echo $row["q_group"] ?>"> 

                      <?php
                      echo '<tr>';

                      echo '<td align="center" width="10%">ข้อ  ' .$row["criterion_no_form"].'</td>';
                      ?>
                      <td width="5%" align="center">
                        <input type="radio" name="choice_form<?php echo $i ?>" id="choice_form<?php echo $i ?>_1" disabled value="1" 
                        <?php 
                        if (isset($row["choice_form"])) {
                          if ($row["choice_form"] == 1) {
                            echo "checked";
                          }
                        }  
                        ?>
                        />
                        <label for="choice_form<?php echo $i ?>_1"></label>
                      </td>
                      <td width="40%" style="padding-left: 5px;">
                        <?php echo $row['criterion_form']?>
                        <input type="hidden" id="q2_detail<?php echo $i ?>" name="q2_detail<?php echo $i ?>" disabled value="<?php echo $row["criterion_form"] ?>">
                      </td>


                      <td width="5%" align="center">
                        <input type="radio" name="choice_form<?php echo $i ?>" id="choice_form<?php echo $i ?>_2" disabled value="2" 
                        <?php 
                        if (isset($row["choice_form"])) {
                          if ($row["choice_form"] == 2) {
                            echo "checked";
                          }
                        }  
                        ?>
                        />
                        <label for="choice_form<?php echo $i ?>_2"></label>
                      </td> 
                      <td width="40%" style="padding-left: 5px;">
                        <?php echo $row['criterion_form']?>
                        <input type="hidden" id="q2_detail2<?php echo $i ?>" name="q2_detail2<?php echo $i ?>" value="<?php echo $row["criterion_form2"] ?>">
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