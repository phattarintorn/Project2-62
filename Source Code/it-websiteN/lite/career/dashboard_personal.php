<?php
include("db/db.php");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>
<div class="col-md-12">
  <div class="card">

    <div class="card-header">
      <strong class="card-title">หน้าแรก</strong> 
    </div> 

    <div class="col-md-12">
      <div class="animated fadeIn">
        <br> 

        <div class="row">
          <div class="col-lg-6">
            <?php
            $sql = "SELECT COUNT(`id`) as id,`user_id`,`firstname`,`lastname`,`status`,`loginstatus`,`lastupdate`,`sex`,`course`,`advisors`,`gpa`,`gpax` FROM `customer`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            { 
              while($row = $result->fetch_assoc()) 
              {
                ?>

                <div class="col-md-12"> 
                  <div class="alert  alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <center>
                      <br>
                      <p><h3><span class="badge badge-pill badge-info">จำนวนสมาชิกในระบบ</span></h3></p>
                      <p><h3>สมาชิกทั้งหมด</h3></p>
                      <p><h1><?php echo $row["id"] ?></h1></p>
                    </center>
                  </div> 
                </div>  
                <?php 
              }
            } 
            ?>
          </div> 

          <div class="col-lg-6">
            <div class="col-md-12"> 
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <br>
                  <p><h3><span class="badge badge-pill badge-success">จำนวนแบบสอบถามในระบบ</span></h3></p>
                  <p><h3>แบบสอบถามทั้งหมด</h3></p>
                  <?php
                  $sql = "SELECT COUNT(`q_id`) as c_id FROM `question` GROUP BY `q_group`";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  { 
                    $c_id = 0;
                    while($row = $result->fetch_assoc()) 
                    {
                      $c_id = $c_id +1;
                    }
                  } 
                  ?>
                  <p><h1>
                    <?php 
                    if (isset($c_id)) {
                      echo $c_id;
                    }else {
                      echo "0";
                    }
                    ?>
                  </h1></p>
                  <?php 
                  ?>
                </center>
              </div> 
            </div>  
          </div> 

          <div class="col-lg-6">
            <?php
            $sql = "SELECT COUNT(`form_id`) AS count FROM test_form GROUP BY `form_date`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {  
              $count = 0; 
              ?> 
              <div class="col-md-12"> 
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <center>
                    <br>
                    <p><h3><span class="badge badge-pill badge-danger">จำนวนแบบสอบถาม <u>ที่ทำ</u> ในระบบ</span></h3></p>
                    <p><h3>จำนวนแบบสอบถามทั้งหมด</h3></p>
                    <p> 
                      <?php
                      while($row = $result->fetch_assoc()) 
                      {
                        $count = $count +1;
                      }
                      ?>
                      <h1>
                        <?php 
                        if (isset($count)) {
                          echo $count;
                        }
                        ?> 
                      </h1> 
                    </p>
                  </center>
                </div> 
              </div>  
              <?php  
            } else {
             ?> 
             <div class="col-md-12"> 
              <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <br>
                  <p><h3><span class="badge badge-pill badge-danger">จำนวนแบบสอบถาม <u>ที่ทำ</u> ในระบบ</span></h3></p>
                  <p><h3>จำนวนแบบสอบถามทั้งหมด</h3></p>
                  <p>  
                    <h1>
                      0
                    </h1> 
                  </p>
                </center>
              </div> 
            </div>  
            <?php  
          }
          ?>
        </div> 

        <div class="col-lg-6">
          <?php
          $sql = "SELECT COUNT(`form_id`) AS count FROM test_form WHERE `form_side` ='ด้านทักษะ' GROUP BY `form_date`";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {  
            $count = 0; 
            ?> 
            <div class="col-md-12"> 
              <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <br>
                  <p><h3><span class="badge badge-pill badge-warning">จำนวนแบบสอบถาม ด้านทักษะ</span></h3></p>
                  <p><h3>แบบสอบถาม ด้านทักษะทั้งหมด</h3></p>
                  <p> 
                    <?php
                    while($row = $result->fetch_assoc()) 
                    {
                      $count = $count +1;
                    }
                    ?>
                    <h1><?php echo $count ?></h1> 
                  </p>
                </center>
              </div> 
            </div>  
            <?php  
          } else {
            ?> 
            <div class="col-md-12"> 
              <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <br>
                  <p><h3><span class="badge badge-pill badge-warning">จำนวนแบบสอบถาม ด้านทักษะ</span></h3></p>
                  <p><h3>แบบสอบถาม ด้านทักษะทั้งหมด</h3></p>
                  <p> 
                    <h1>0</h1> 
                  </p>
                </center>
              </div> 
            </div>  
            <?php 
          }
          ?>
        </div> 

        <div class="col-lg-6">
          <?php
          $sql = "SELECT COUNT(`form_id`) AS count FROM test_form WHERE `form_side` ='ด้านจิตวิทยา' GROUP BY `form_date`";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {  
            $count = 0; 
            ?> 
            <div class="col-md-12"> 
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <br>
                  <p><h3><span class="badge badge-pill badge-success">จำนวนแบบสอบถาม ด้านจิตวิทยา</span></h3></p>
                  <p><h3>แบบสอบถาม ด้านจิตวิทยาทั้งหมด</h3></p>
                  <p> 
                    <?php
                    while($row = $result->fetch_assoc()) 
                    {
                      $count = $count +1;
                    }
                    ?>
                    <h1><?php echo $count ?></h1> 
                  </p>
                </center>
              </div> 
            </div>  
            <?php  
          } else {
            ?> 
            <div class="col-md-12"> 
              <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <br>
                  <p><h3><span class="badge badge-pill badge-success">จำนวนแบบสอบถาม ด้านจิตวิทยา</span></h3></p>
                  <p><h3>แบบสอบถาม ด้านจิตวิทยาทั้งหมด</h3></p>
                  <p> 
                    <h1>0</h1> 
                  </p>
                </center>
              </div> 
            </div>  
            <?php 
          }
          ?>
        </div> 

        <div class="col-lg-6">
          <?php
          $sql = "SELECT COUNT(`career_id`) as `career_id` FROM `data_career`";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          { 
            while($row = $result->fetch_assoc()) 
            {
              ?>

              <div class="col-md-12"> 
                <div class="alert  alert-info alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <center>
                    <br>
                    <p><h3><span class="badge badge-pill badge-primary">จำนวนอาชีพที่ทำการเพิ่ม</span></h3></p>
                    <p><h3>จำนวนอาชีพทั้งหมด</h3></p>
                    <p><h1><?php echo $row["career_id"] ?></h1></p>
                  </center>
                </div> 
              </div>  
              <?php 
            }
          } 
          ?>
        </div>
      </div> <!-- ปิด -->

    </div> 
  </div> 

</div> 
</div> 


