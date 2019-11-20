<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php include('header.php')?>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

  <header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">
          <span class="hidden-xs-down"><img src="../images/it-logo.png" alt="homepage" class="light-logo" width="300px" /></span>
        </a>
        <span class="hidden-md-up"><img src="../images/logo-bird.png" alt="homepage" class="light-logo" width="35px" /></span>
      </div>
    </nav>
  </header>

  <div class="container">
    <br><br><br><br><br><br>
    <div class="row align-center">
      <div class="col-sm-4 ">
      </div>
      <div class="col-sm-4  ">
        <div class="card">
          <div class="card-block">
            <div class="row text-center">
              <div class="col-12 ">
                <center class="m-t-5 ">
                  <h4 class="card-title m-t-10">เข้าสู่ระบบ</h4>
                </center>
                <form name="form-login" method="post" action="check_login.php" id="login">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="material-icons">person</i></span>
                    <input id="user_id" type="text" class="form-control" name="user_id" placeholder="รหัสนักศึกษา" maxlength="8" required>
                  </div>
                  <br>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="material-icons">lock</i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="รหัสผ่าน"required>
                  </div>
                  <br>
                </form>

                <div class="text-center">
                  <button type="submit" class="btn btn-success" form="login">เข้าสู่ระบบ</button>
                   <!-- <a href="page-register.php"><button class="btn btn-danger">สมัครสมาชิก</button></a><br><br>  -->
                   <a href="page-registerstudent.php"><button class="btn btn-danger">สมัครสมาชิก</button></a><br><br> 

                  <!-- <a href="page-registerstudent.php"><button class="btn btn-info">สมัครสมาชิกนักศึกษา</button></a><br><br> 
                  <a href="page-registerprofessor.php"><button class="btn btn-warning">สมัครสมาชิกอาจารย์</button></a>  -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4  ">

      </div>
    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="messageModal" role="dialog" aria-labelledby="Message" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="messageModalLabel">Message</h4>
        </div>
        <div class="modal-footer">
          <button id="btClose" class="btn btn-danger" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="errorModal" role="dialog" aria-labelledby="Message" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" >อีเมล์หรือรหัสผ่านผิด กรุลองใหม่อีกครั้ง</h4>
        </div>
        <div class="modal-footer">
          <button id="btClose" class="btn btn-danger" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container container-fluid bg-4 text-center">
      <br>
      <div class="row-lg-12">
        <div class="col-lg-12 ">
          <a target="_blank" href="https://wrappixel.com/demos/free-admin-templates/material-pro-lite/lite/"><img src="../images/logo-icon.png" width="20px"></a>
          <a target="_blank" href="https://git-scm.com/"><img src="../images/git.png" width="20px"></a>
          <a target="_blank" href="https://firebase.google.com/"><img src="../images/firebase.png" width="20px"></a>
          <a target="_blank" href="https://github.com/"><img src="../images/github.png" width="20px"></a>
        </div>
      </div>
      <br>
      <div class="row-lg-12">
        <div class="col-lg-12 ">
          <p style="color:#808080; font-size:10px;">Copyright © Information of Technology 2017</p>
        </div>
      </div><br>

    </div>
  </footer>

  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
  <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="js/jquery.slimscroll.js"></script>
  <!--Wave Effects -->
  <script src="js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="js/sidebarmenu.js"></script>
  <!--stickey kit -->
  <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
  <!--Custom JavaScript -->
  <script src="js/custom.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugins -->

  <!--c3 JavaScript -->
  <script src="../assets/plugins/d3/d3.min.js"></script>
  <script src="../assets/plugins/c3-master/c3.min.js"></script>
  <!-- Include Firebase Library -->
  <script src="https://www.gstatic.com/firebasejs/4.8.0/firebase.js"></script>

<!-- <script src="../js/login.js"></script>
  <script src="../js/check_logined.js"></script> -->
</body>
</html>
