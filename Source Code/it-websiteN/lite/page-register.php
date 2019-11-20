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
    <br><br>
    <div class="row align-center">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-block">
            <div class="row text-center">
              <div class="col-12 ">
                <center class="m-t-6 ">
                  <h4 class="card-title m-t-15"><h2>สมัครสมาชิกอาจารย์</h2></h4><hr><br>
                </center></class="card-title"></center>
                <!-- <form name="form-login" method="post" action="check_login.php" id="login"> -->
                  <form action="page-register_selectdb.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons">person</i></span>
                      <input id="user_id" type="text" class="form-control" name="user_id"  placeholder="รหัสอาจารย์ " required maxlength="8">
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons">lock</i></span>
                      <input id="password" type="password" class="form-control" name="password" placeholder="รหัสผ่าน" required maxlength="10">
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons">email</i></span>
                      <input id="email" type="text" class="form-control" name="email" placeholder="อีเมล" required>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons">perm_contact_calendar</i></span>
                      <input id="firstname" type="text" class="form-control" name="firstname" placeholder="ชื่อ" required>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons">more</i></span>
                      <input id="lastname" type="text" class="form-control" name="lastname" placeholder="นามสกุล" required>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="เพศ">wc</i></span>
                      <!-- <input id="sex" type="text" class="form-control" name="sex" placeholder="เพศ" required> -->
                      <select id="sex" name="sex" required class="form-control"  size="">
                        <option value="" >--กรุณาเลือกเพศ--</option>
                        <option value="ชาย"><h5>ชาย</h5></option>
                        <option value="หญิง"><h5>หญิง</h5></option>
                      </select>
                    </div>
                    <br>

                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="สถานะ">wc</i></span> 
                      <select id="status" name="status" required class="form-control"  size="">
                        <option value="" >--กรุณาสถานะ--</option>
                        <option value="professor"><h5>อาจารย์</h5></option>
                        <option value="personnel"><h5>เจ้าหน้าที่</h5></option>
                      </select>
                    </div>
                    <br>
                    <div class="text-center">
                     <button class="btn btn-info">สมัครสมาชิก</button></a> 
                     
                     <div class="register-link m-t-15 text-center">
                     </form>
                     <p> <center>Already have account ? <a href="page-login.php">ลงชื่อเข้าใช้ระบบ</a></p></center>
                   </div>
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
