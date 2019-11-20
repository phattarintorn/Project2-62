<div class="row form-group">
  <div class="col-md-12"> 
    <?php  
    echo '<hr>';
    echo '<center><strong><h4>แบบทดสอบ '.$row["q_side"].'</h4></strong></center>';
    ?>
  </div>
  <div class="col-md-2">
    <br>

    <center><u>คำชี้แจง</u></center>  
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
            <strong class="card-title">แบบทดสอบ : <?php echo $row["q_side"]; ?> </strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" style="width:100%">
              <thead>

              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM question,q2 WHERE question.q_id = q2.q_id AND question.q_group =".$q_group;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                { 
                  $i = 0;
                  while($row = $result->fetch_assoc()) 
                  {  
                    $i = $i + 1;
                    ?>
                    <input type="hidden" id="user_idq2" name="user_idq2" value="<?php echo $_SESSION["id"] ?>"> 
                    <input type="hidden" id="q_idq2" name="q_idq2" value="<?php echo $row["q_id"] ?>"> 
                    <input type="hidden" id="q_noq2<?php echo $i ?>" name="q_noq2<?php echo $i ?>" value="<?php echo $i ?>"> 
                    <input type="hidden" id="q_group" name="q_group" value="<?php echo $row["q_group"] ?>"> 
                    <input type="hidden" id="q_sideq2" name="q_sideq2" value="<?php echo $row["q_side"] ?>"> 
                    <input type="hidden" id="q2_no" name="q2_no" value="<?php echo $row["q_no"] ?>"> 
                    <input type="hidden" id="form_date<?php echo $i ?>" name="form_date<?php echo $i ?>" value="<?php date_default_timezone_set('asia/bangkok'); echo date('y-m-d H:i:s'); ?>"> 
 
                    <?php
                    echo '<tr>';

                    echo '<td align="center" width="10%">ข้อ  ' .$row["q2_no"].'</td>';
                    ?>
                    <td width="5%" align="center">
                      <input type="radio" name="choice_form<?php echo $i ?>" id="choice_form<?php echo $i ?>_1" value="1" required="กรุณากรอกข้อมูลให้ครบ"/>
                      <label for="choice_form<?php echo $i ?>_1"></label>
                    </td>
                    <td width="40%" style="padding-left: 5px;">
                      <?php echo $row['q2_detail']?>
                      <?php //echo $row['career']?>
                      <input type="hidden" id="q2_detail<?php echo $i ?>" name="q2_detail<?php echo $i ?>" value="<?php echo $row["q2_detail"] ?>">
                      <input type="hidden" id="career<?php echo $i ?>" name="career<?php echo $i ?>" value="<?php echo $row["career"] ?>">  
                    </td>


                    <td width="5%" align="center">
                      <input type="radio" name="choice_form<?php echo $i ?>" id="choice_form<?php echo $i ?>_2" value="2" />
                      <label for="choice_form<?php echo $i ?>_2"></label>
                    </td> 
                    <td width="40%" style="padding-left: 5px;">
                      <?php echo $row['q2_detail2']?>
                      <?php //echo $row['career2']?>
                      <input type="hidden" id="q2_detail2<?php echo $i ?>" name="q2_detail2<?php echo $i ?>" value="<?php echo $row["q2_detail2"] ?>">
                      <input type="hidden" id="career2<?php echo $i ?>" name="career2<?php echo $i ?>" value="<?php echo $row["career2"] ?>"> 
                    </td>

                    <?php
                    echo '</tr>';
                  }
                } 
                ?>
              </tbody>
            </table>
           <!--  <center>
              <br>
              <button type="submit" value="submit" name="submit" class="btn btn-info btn-sm">Send</button>
            </center><br><br> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
