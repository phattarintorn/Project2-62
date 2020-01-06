<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php include('header.php')?>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
                  <h4 class="card-title m-t-15"><h2>สมัครสมาชิกนักศึกษา</h2></h4><hr><br>
                </center></class="card-title"></center>
                  <form action="../lite/page-register_selectdb.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="รหัสนักศึกษา">person</i></span>
                      <input id="username" type="text" class="form-control" name="username" placeholder="รหัสนักศึกษา " pattern="[A-Z0-9]{8}" required maxlength="8">
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="รหัสผ่าน">lock</i></span>
                      <input id="password" type="password" class="form-control" name="password" placeholder="รหัสผ่าน" required maxlength="10">
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="ชื่อ">account_box</i></span>
                      <input id="firstname" type="text" class="form-control" name="firstname" placeholder="ชื่อ" required>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="นามสกุล">more</i></span>
                      <input id="lastname" type="text" class="form-control" name="lastname" placeholder="นามสกุล" required>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="เพศ">wc</i></span>
                      <select id="gender" name="gender" required class="form-control"  size="">
                        <option value="" >-- กรุณาเลือกเพศ --</option>
                        <option value="M"><h5>ชาย</h5></option>
                        <option value="F"><h5>หญิง</h5></option>
                      </select>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="แผนการเรียน">assignment</i></span>
                      <select id="plan" name="plan" required class="form-control"  size="">
                        <option value="" >-- กรุณาเลือกแผนการเรียน --</option>
                        <option value="GENERAL"><h5>แผนการเรียนทั่วไป</h5></option>
                        <option value="LIFE"><h5>แผนการเรียนตลอดชีวิต</h5></option>
                      </select>
                      <button  type="button" class="btn btn-link" title="แผนการเรียน คือ ?" data-toggle="modal" data-target="#PLAN">
                        <i class="mdi mdi-help"></i><small> คือ?</small>
                      </button>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="แผนการเรียน">list</i></span>
                      <select id="type" name="type" required class="form-control"  size="">
                        <option value="" >-- กรุณาเลือกหลักสูตรการเรียน --</option>
                        <option value="MAJOR"><h5>หลักสูตรเอก</h5></option>
                        <option value="MINOR"><h5>หลักสูตรโท</h5></option>
                      </select>
                      <button  type="button" class="btn btn-link" title="หลักสูตรการเรียน คือ ?" data-toggle="modal" data-target="#MAJOR">
                        <i class="mdi mdi-help"></i><small> คือ?</small>
                      </button>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="หลักสูตร">class</i></span>
                      <select id="branch" name="branch" required class="form-control"  size="">
                        <option value="" >-- กรุณาเลือกหลักสูตร --</option>
                        <?php
                        include("db/db.php"); 
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM M_BRANCH";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) 
                        {  
                          while($row = $result->fetch_assoc()) 
                          {   
                            ?>
                            <option value="<?php echo $row["BRANCH_ID"];?>"><?php echo ("[ " . $row["BRANCH_INITIAL"] . " ] " . $row["BRANCH_NAME"]);?></option>  
                            <?php
                          }
                        }   
                        ?>
                      </select>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="ชื่ออาจารย์ที่ปรึกษา">perm_contact_calendar</i></span>
                      <select id="advisor" name="advisor" required class="form-control"  size="">
                        <option value="" >-- กรุณาเลือกชื่ออาจารย์ที่ปรึกษา --</option>
                        <?php
                        include("db/db.php"); 
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM M_USER WHERE USER_STATUS = 'PROFESSOR'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) 
                        {  
                          while($row = $result->fetch_assoc()) 
                          {   
                            ?>
                            <option value="<?php echo $row["USER_ID"];?>"><?php echo $row["USER_FIRSTNAME"].' '.$row["USER_LASTNAME"];?></option>  
                            <?php
                          }
                        }   
                        ?>
                      </select>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons">email</i></span>
                      <input id="email" type="text" class="form-control" name="email" placeholder="อีเมล" required>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons">call</i></span>
                      <input id="tel" type="text" class="form-control" name="tel" placeholder="หมายเลขโทรศัพท์" pattern="[0-9]{10}" required>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="GPA">school</i></span>
                      <input id="gpa" type="text" class="form-control" name="gpa" placeholder="เกรดเฉลี่ยเทอมล่าสุด" required>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="material-icons" title="GPAX">school</i></span>
                      <input id="gpax" type="text" class="form-control" name="gpax" placeholder="เกรดเฉลี่ยรวม" required>
                    </div>
                    <br>

                    <div class="text-center">
                     <button class="btn btn-info">สมัครสมาชิก</button></a> 
                     <input type="hidden" name="status" value="STUDENT" >
                     <div class="register-link m-t-15 text-center">
                      <p> <center>มีบัญชีผู้ใช้อยู่แล้ว? <a href="page-login.php">เข้าสู่ระบบ</a></p></center>
                    </div>
                  </div>
                </div>
              </div>
            </form>
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

<!-- Modal PLAN -->
<div class="modal fade" id="PLAN" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">รายละเอียด : แผนการเรียน</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form>
            <center>
              <div class="col-md-12">
                <h4>แผนการเรียนทั่วไป</h4>
              </div>
              <div class="col-md-12">
                </br>
                <h5 align="left"><p>&nbsp;&nbsp;&nbsp;&nbsp;โครงสร้างของเนื้อหาวิชา หรือประสบการณ์ต่างๆ หรือศาสตร์ต่างๆ ที่กำหนดให้ผู้เรียนได้ศึกษาหาความรู้ทั้ง</p>
                <p>ภาคทฤษฎี ภาคปฏิบัติ รวมทั้งการมีส่วนร่วมกิจกรรมเสริมสร้างประสบการณ์ ตามแผนการศึกษาในสาขาวิชานั้นๆ</p></h5>
                </br>
              </div>
              <hr>
              <div class="col-md-12">
                <h4>แผนการเรียนตลอดชีวิต</h4>
              </div>
              <div class="col-md-12">
                </br>
                <h5 align="left"><p>&nbsp;&nbsp;&nbsp;&nbsp;จัดขึ้นเพื่อสนองความต้องการและความจำเป็นของบุคคลต่อเนื่องจากฐานความรู้เดิม และเพื่อเสริมเติมเต็มและ</p>
                  <p>พัฒนาศักยภาพของผู้เรียน โดยไม่แบ่งเป็นระดับชั้นในรูปของกิจกรรมการเรียนรู้หรือหลักสูตรการเรียนรู้ ประเภท</p> 
                  <p>มีหน่วยกิตและไม่มีหน่วยกิตซึ่งมิใช่การศึกษาตามระบบปกติ</p></h5>
                </br>
              </div> 
            </div>
          </center>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal MAJOR -->
<div class="modal fade" id="MAJOR" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">รายละเอียด : หลักสูตรการเรียน</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form>
            <center>
              <div class="col-md-12">
                <h4>หลักสูตรเอก</h4>
              </div>
              <div class="col-md-12">
                </br>
                <h5 align="left">สาขาหลักที่เข้าไปเรียน และจะจบมาโดยระบุไว้ในใบปริญญาว่า จบสาขาอะไร พอดูในส่วนวิชาเอก บางทีก็จะมี</h5>
                <h5 align="left">&nbsp; -   วิชาเอกบังคับ (เอกสาขานั้นต้องเรียนให้ครบทุกตัวที่กำหนด)</h5>
                <h5 align="left">&nbsp; -   วิชาเอกเลือก  (สามารถเลือกลงตามสนใจได้ โดยกำหนดหน่วยกิตไว้ว่า ต้องผ่านกี่หน่วยถึงครบหลักสูตร)</h5>
                </br>
              </div>
              <hr>
              <div class="col-md-12">
                <h4>หลักสูตรโท</h4>
              </div>
              <div class="col-md-12">
                </br>
                <h5 align="left" ><p>ความสนใจรอง เป็นหลักสูตรเล็กๆ ตามแต่มหาวิทยาลัยจะระบุ อาจจะมีเงื่อนไขเล็กๆ เช่น ไม่สามารถเลือกวิชาโท</p><p>ที่อยู่ในหมวดวิชาเอกได้ ตัวอย่างเช่น</p></h5>
                <h5 align="left"><p>&nbsp; -  วิชาเอกเป็นเทคโนโลยีสารสนเทศแล้ว วิชาโท ไม่สามารถลงในกลุ่มเทคโนโลยีสารสนเทศได้ ต้องไปลงวิชาโท</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;ในหมวดอื่นแทน อาจจะเป็น ภาษา บริหาร นิติศาสตร์ พัฒนามนุษย์ ก็ได้</p></h5>
                </br>
              </div> 
            </div>
          </center>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</html>





