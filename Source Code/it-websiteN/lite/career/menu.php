<div class="col-lg-3 col-xlg-3 col-md-5">
  <div class="card">
    <img class="card-img-top" src="../images/cloud.jpg" alt="Card image cap">
    <div class="card-body little-logo text-center">
      <div class="card-block">
        <div class="pro-img"><img src="../images/logo-header.gif" alt="user"></div>
        <h3 class="m-b-0">เมนู</h3><hr>
        <?php
        if (isset($_SESSION["USER_ID"])) {
          ?>
          <div align="left">
            <a href="career-advice.php">
              <i class="mdi mdi-account"></i> หน้าแรก
            </a>
            <br><br>
            <a href="career-advice.php?career=user_profile">
              <i class="mdi mdi-account-circle"></i> ข้อมูลส่วนตัว
            </a>
            <br><br>
            <?php
            if($_SESSION["USER_STATUS"] == "ADMIN") {
              ?> 
              <a href="career-advice.php?career=tables_user">
                <i class="mdi mdi-account"></i> จัดการผู้ใช้
              </a>
              <?php
            } elseif ($_SESSION["USER_STATUS"] == "PROFESSOR") {
              ?>
              <a href="career-advice.php?career=student_professor" title="ดูข้อมูลนักศึกษาและดูผลการทำแบบทดสอบ">
                <i class="mdi mdi-account-star"></i> นักศึกษาในที่ปรึกษา
              </a>
              <?php
            } elseif ($_SESSION["USER_STATUS"] == "PERSONNEL") {
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
              <a href="career-advice.php?career=add_branch">
                <i class="mdi mdi-book-plus"></i> หลักสูตร
              </a>
              <br><br>
              <a href="career-advice.php?career=add_module">
                <i class="mdi mdi-book-plus"></i> ชุดวิชา
              </a>
              <br><br>
              <a href="career-advice.php?career=add_course">
                <i class="mdi mdi-book-plus"></i> รายวิชา
              </a>
              <?php
            } elseif ($_SESSION["USER_STATUS"] == "STUDENT") {
              ?> 
              <a href="career-advice.php?career=student_module">
                <i class="mdi mdi-message-bulleted"></i> แผนการเรียน
              </a>  
              <br><br>
              <a href="career-advice.php?career=tables_q">
                <i class="mdi mdi-message-bulleted"></i> ทำแบบสอบถาม
              </a>  
              <br><br>
              <a href="career-advice.php?career=tables_history">
                <i class="mdi mdi-bulletin-board"></i> ประวัติการทำแบบทดสอบ
              </a>  
              <br><br> 
              <a href="career-advice.php?career=dashboard_career_module">
                <i class="mdi mdi-open-in-new"></i> แนะนำแผนการเรียน
              </a>
              <br><br>
              <a href="career-advice.php?career=dashboard_student_report">
                <i class="mdi mdi-chart-arc"></i> รายงาน
              </a>
              <?php
            }
              ?>
            <br><br>
            <a href="page-logout.php">
              <i class="fa fa-power-off"></i> ออกจากระบบ
            </a>  
          </div>
          <?php
        } else {
          ?>
          <div align="left">
            <a href="page-login.php">
              <i class="fa fa-user"></i> เข้าสู่ระบบ
            </a>
            <br><br>
            <a href="page-registerstudent.php">
              <i class="fa fa-plus-circle"></i> สมัครสมาชิก
            </a><br>
            <hr><br>
            ระบบแนะนำอาชีพที่เหมาะสมกับนักศึกษา
          </div>
          <?php
        }
        ?>
        <div class="row text-center m-t-20"> 
        </div>
      </div>
    </div>
  </div>
</div>