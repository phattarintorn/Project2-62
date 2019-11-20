
<!-- header -->
<header class="topbar">
  <nav class="navbar top-navbar navbar-toggleable-md navbar-light " >
    <div class="navbar-header ">
      <span class="hidden-md-up"><img src="../images/logo-bird.png" width="45px"></span>

      <a class="navbar-brand " href="index.php">

        <span class="hidden-xs-down"><img src="../images/it-logo.png" width="350px"></span>

      </a>
    </div>



    <div class="navbar-collapse">
      <ul class="navbar-nav mr-auto mt-md-0">
        <!-- This is  -->
        <li class="nav-item"> 
          <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i>
          </a> 
        </li>
      </ul>
      <!-- ============================================================== -->
      <!-- User profile and search -->
      <!-- ============================================================== -->
      <ul class="navbar-nav my-lg-0">
        <!-- <li id="notifyClick" class="nav-item dropdown show">
          <a  class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> 
            <i class="mdi mdi-message"></i>
            <div class="notify">  
              <span id="heartBit"></span> 
              <span id="point"></span>
            </div>
          </a>
          <div hidden class="dropdown-menu dropdown-menu-right mailbox scale-up show">
            <ul>
              <li>
                <div class="drop-title">การแจ้งเตือน</div>
              </li>
              <li style="overflow: visible;">
                <div class="slimScrollDiv" >
                  <div id="notify" class="message-center"></div>
                  <div class="slimScrollBar" ></div>
                  <div class="slimScrollRail"></div>
                </div>
              </li>
              <li>
                <a class="nav-link text-center" href="history.php"> <strong>ดูการแจ้งเตือนทั้งหมด</strong> <i class="fa fa-angle-right"></i> </a>
              </li>
            </ul>
          </div>
        </li> -->
        <!-- ============================================================== -->
        <!-- Profile -->
        <!-- ============================================================== -->
        <li id="profileNavbar" class="nav-item dropdown show">
          <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <img id="userImageProfile"  src="../assets/images/users/user.png" class="profile-pic m-r-0" /> 
            <?php

            if (isset($_SESSION["user_id"])) {
              echo $_SESSION["user_id"];
              echo '<a href="page-logout.php" title="ออกจากระบบ"><i class="fa fa-power-off">&nbsp;&nbsp;</i></a>';
            }else{

              echo '<a href="page-login.php">';
              echo " กรุณาเข้าสู่ระบบ ";
              echo '</a>';
            }
            ?>
          </a>

          <div hidden class="dropdown-menu dropdown-menu-right scale-up show">
            <ul class="dropdown-user">
              <li>

                <div class="dw-user-box">
                  <div class="u-img"><img id="userImage" src="../assets/images/users/user.png" alt="user"></div>
                  <div class="u-text">
                    <h4 id="userProfile">ชื่อ - นามสกุล</h4>
                    <p class="text-muted" id="emailUser">อีเมลล์</p>
                    <a href="pages-profile.php" class="btn btn-rounded btn-danger btn-sm">โปรไฟล์</a>
                  </div>
                </div>
              </li>

              <li role="separator" class="divider"></li>
              <li id="btLogout"><a href="#"><i class="fa fa-power-off"></i> ออกจากระบบ</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- /header -->

<!-- aside-nav -->
<aside class="left-sidebar text-center">
  <div class="scroll-sidebar ">
    <nav class="sidebar-nav active">
      <ul id="sidebarnav" >
        <li>
          <a href="index.php" aria-expanded="false"><i class="mdi mdi-airplay"></i><span class="hide-menu">หน้าหลัก</span></a>

        </li>
        <li>
          <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">หลักสูตร</span></a>
          <ul aria-expanded="true" class="collapse">
            <li><a href="course-bachelor.php">ปริญญาตรี</a></li>
            <li><a href="course-master.php">ปริญญาโท</a></li>
            <li><a href="course-doctorate.php">ปริญญาเอก</a></li>
          </ul>
        </li>
        <li >
          <a  href="personal.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">คณาจารย์และบุคลากร</span></a>

        </li>

        <li>
          <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-trophy"></i><span class="hide-menu">ผลงานนักศึกษา</span></a>

          <ul aria-expanded="true" class="collapse">
            <li><a href="portfolio-bachelor.php">ระดับปริญญาตรี</a></li>
            <li><a href="portfolio-graduation.php">ระดับบัณฑิตศึกษา</a></li>
          </ul>


        </li>
        <li>
          <a  href="activity.php" aria-expanded="false"><i class="mdi mdi-camera"></i>กิจกรรม</a>
        </li>
        <li>
          <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">นักศึกษา</span></a>

          <ul aria-expanded="true" class="collapse">
            <li><a href="career-advice.php">แนะนำอาชีพนักศึกษา</a></li>
          </ul>


        </li>


      </ul>
      <!-- <?php //include("menu.php"); ?> -->
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!-- /aside-nav -->
