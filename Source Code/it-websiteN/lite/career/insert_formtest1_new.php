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
              <strong class="card-title">แบบทดสอบ : <?php echo $row["q_side"]; ?></strong> 
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
                  // include("db/db.php"); 

                  $sql = "SELECT * FROM `question`,`q1` WHERE question.q_id =  q1.q_id  AND  question.status_using= 0 AND question.q_group= ".$q_group; 
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) 
                  {
                    $i=0;
                    while($row = $result->fetch_assoc()) 
                    { 

                      ?>
                      <input type="hidden" id="user_idq1" name="user_idq1" value="<?php echo $_SESSION["id"] ?>"> 
                      <input type="hidden" id="q_idq1" name="q_idq1" value="<?php echo $row["q_id"] ?>"> 
                      <input type="hidden" id="q_group" name="q_group" value="<?php echo $row["q_group"] ?>"> 
                      <input type="hidden" id="q_sideq1" name="q_sideq1" value="<?php echo $row["q_side"] ?>"> 
                      <input type="hidden" id="q1_no" name="q1_no" value="<?php echo $row["q_no"] ?>"> 

                      <?php
                      $i = $i + 1;
                      echo '<tr>';
                      echo '<td align="center">';
                      echo $row["q1_no"];
                      echo '</td>';

                      ?> 
                      <input type="hidden" id="q_noq1<?php echo $i ?>" name="q_noq1<?php echo $i ?>" value="<?php echo $i ?>"> 
                      <input type="hidden" id="q1_detailq1<?php echo $i ?>" name="q1_detailq1<?php echo $i ?>" value="<?php echo $row["q1_detail"] ?>"> 
                      <input type="hidden" id="career<?php echo $i ?>" name="career<?php echo $i ?>" value="<?php echo $row["career"] ?>"> 
                      <input type="hidden" id="form_date<?php echo $i ?>" name="form_date<?php echo $i ?>" value="<?php date_default_timezone_set('asia/bangkok'); echo date('y-m-d H:i:s'); ?>"> 

                      <td width="70%" style="padding-left: 5px;"><?php echo $row['q1_detail']?></td>
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
  <!-- </form> -->


