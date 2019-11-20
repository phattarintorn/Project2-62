
<div class="col-lg-3 col-xlg-3 col-md-5">
  <div class="card">
    <img class="card-img-top" src="../images/cloud.jpg" alt="Card image cap">
    <div class="card-body little-logo text-center">
      <div class="card-block">
        <div class="pro-img"><img src="../images/logo-header.gif" alt="user"></div>
        <h3 class="m-b-0">เมนู</h3><hr>
        <h4><a href="career-advice.php">หน้าแรก</a></h4><br>


        <div align="left">
          <?php
          if (isset($_SESSION["user_id"])) {
            if($_SESSION["status"] == "admin")
            {
              ?> 
              <a href="career-advice.php?career=tables_user">
                <i class="mdi mdi-account"></i> จัดการผู้ใช้
              </a>
              <br><br><hr>
              <a href="career-advice.php?career=user_profile">
                <i class="mdi mdi-account-circle"></i> ข้อมูลส่วนตัว
              </a>  
              <br>


              <?php
            }elseif ($_SESSION["status"] == "personnel") {
              ?>
              <a href="career-advice.php?career=q_topics&Line=1">
                <i class="mdi mdi-message-bulleted"></i> สร้างแบบทดสอบ
              </a>
              <br><br>
              <a href="career-advice.php?career=tables_q">
                <i class="mdi mdi-developer-board"></i> แบบทดสอบทั้งหมด
              </a>
              <br><br>
              <a href="career-advice.php?career=add_career">
                <i class="mdi mdi-account-convert"></i> อาชีพ
              </a>
              <br><br>
              <hr>
              <a href="career-advice.php?career=user_profile">
                <i class="mdi mdi-account-circle"></i> ข้อมูลส่วนตัว
              </a>  
              <br> 

              <?php
            }elseif ($_SESSION["status"] == "student") {
              ?> 
              <a href="career-advice.php?career=tables_q">
                <i class="mdi mdi-message-bulleted"></i> ทำแบบสอบถาม
              </a>  
              <br><br>
              <a href="career-advice.php?career=tables_history">
                <i class="mdi mdi-bulletin-board"></i> ประวัติการทำแบบทดสอบ
              </a>  
              <br><br> 
              <a href="career-advice.php?career=plan_Photo">
                <i class="mdi mdi-open-in-new"></i> แนะนำแผนการเรียน
              </a>  <br><br>
              <a href="career-advice.php?career=dashboard_student">
                <i class="mdi mdi-chart-arc"></i> รายงาน
              </a>  <br><br>
              <br><hr>
              <a href="career-advice.php?career=user_profile">
                <i class="mdi mdi-account-circle"></i> ข้อมูลส่วนตัว
              </a>  
              <br><hr>
              <?php
            }elseif ($_SESSION["status"] == "professor") {
              ?>
              <!-- <h5 class="m-b-0">ผลการทำแบบสอบถามของนักศึกษา</h5><br>  -->
              <a href="career-advice.php?career=student_professor" title="ดูข้อมูลนักศึกษาและดูผลการทำแบบทดสอบ">
                <i class="mdi mdi-account-star"></i> นักศึกษาในที่ปรึกษา
              </a>  
              <br><br> <hr>
              <a href="career-advice.php?career=user_profile">
                <i class="mdi mdi-account-circle"></i> ข้อมูลส่วนตัว
              </a>  
              <br>
              <?php
            }
          }else{
            ?> 
            ระบบแนะนำอาชีพที่เหมาะสมกับนักศึกษา
            <br><br>
            <br><br>
            
            <?php
          }
          ?>
        </div>     
        <div class="row text-center m-t-20"> 
        </div>

      </div>
    </div>
  </div>
</div>