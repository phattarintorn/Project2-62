<div class="col-lg-9 col-md-7">
  <div class="card">
    <div class="card-block">
      <div class="card-body">
        <h4 class="card-title text-center">ระบบแนะนำอาชีพที่เหมาะสมกับนักศึกษา</h4>
        <h6 class="card-subtitle text-center"></h6>
      </div>
      <h5>
        <div class="comment-widgets">
          <?php
            if (!isset($_GET['career'])) { 
              if (isset($_SESSION["USER_STATUS"])) {
                if ($_SESSION["USER_STATUS"]  == "ADMIN") {
                  include("career/dashboard_admin.php"); 
                } elseif ($_SESSION["USER_STATUS"]  == "PROFESSOR") {
                  include("career/dashboard_professor.php");
                } elseif ($_SESSION["USER_STATUS"]  == "PERSONNEL") {
                  include("career/dashboard_personal.php");
                } elseif ($_SESSION["USER_STATUS"]  == "STUDENT") {
                  include("career/dashboard_student.php");
                }
              } else {
                include("career/dashboard_introduction.php");
              }
            } else {
              $career = $_GET['career'];
              include("career/".$career.".php"); 
            }
          ?>
        </div>
      </h5>
    </div>
  </div>
</div>