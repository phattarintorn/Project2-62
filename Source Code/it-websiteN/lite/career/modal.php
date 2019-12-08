<h5>
  <!-- Modal EX -->
  <div class="modal fade" id="EX" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">ภาพตัวอย่าง : รูปแบบการตอบแบบสอบถาม</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form>
            <center>
              <div class="col-md-12">
                <h4>ถามระดับความคิดเห็น</h4>
              </div>
              <div class="col-md-12">
                <br><img src="images/career/Q1.png" style="width:100%;max-width:700px">
              </div>
              <hr>
              <div class="col-md-12">
                <h4>ถามเปรียบเทียบ</h4>
              </div>
              <div class="col-md-12">
                <br><img src="images/career/Q2_ex.png" style="width:100%;max-width:700px">
              </div> 
              <hr>
            </div>
          </center>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</h5>
<!-- ------------------------------------------------------------------------------------------- -->
<?php
include("db/db.php"); 
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>
<!-- Modal AddCareer -->
<div class="modal fade" id="AddCareer" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มอาชีพ</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="career-advice.php?career=insert_career" method="POST" class="form-horizontal" enctype="multipart/form-data"> 
          <div class="col-md-12">
            <div class="row form-group">
              <div class="col-md-12">
                อาชีพ
              </div>
              <div class="col-md-12">
                <input type="text" name="career_name" class="form-control" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                Module
              </div>
              <div class="col-md-12">
                <?php
                  $sql = "SELECT * FROM m_module WHERE MODULE_ID";
                  $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    { $i=0;
                      while($row = $result->fetch_assoc()) 
                      {
                        $i = $i+1;
                        echo ' 
                        <div class="row ">
                          <div class="col-md-1 center-block">
                            <input type="checkbox" name="choice_module'.$i.'" id="choice_module'.$i.'" value="'. $row["MODULE_ID"].'"/>
                            <label for="choice_module'.$i.'" ></label></br>
                          </div>';
                        echo '<div class="col">';
                        echo $row["MODULE_CODE"]." ".$row["MODULE_NAME"];
                        echo '</div>';  
                        echo '</div>';  
                      }
                      echo '<input type="hidden" name="count_career" value="'.$i.'">';
                    }
                ?>
              </div>
            </div>
            <!-- <div class="row form-group">
              <div class="col-md-12">
                หลักสูตร
              </div>
              <div class="col-md-12">
                <input type="file" name="career_course" class="form-control" required>
              </div>
            </div> -->
            <div class="row form-group">
              <div class="col-md-12">
                ภาพประกอบ อาชีพ
              </div>
              <div class="col-md-12">
                <input type="file" name="career_character" class="form-control" required>
              </div>
            </div>
          </div> 
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type="submit" class="btn btn-info">บันทึก</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</h5>
<!-- ------------------------------------------------------------------------------------------- -->


