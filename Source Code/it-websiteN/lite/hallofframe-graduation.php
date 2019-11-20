<!DOCTYPE html>
<html lang="en">

<head >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <?php  include('header.php') ?>

</head>

<body class="fix-header fix-sidebar card-no-border logo-center">

    <div class="preloader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">

    <?php  include('navbar.php') ?>

      <div class="page-wrapper">
        <div class="container-fluid">

          <div class="row page-titles">
            <h1
          </div>

          <div  class="row el-element-overlay">
            <div class="card">
              <div class="card-block">
                <h2 class="card-title text-center"><i class="fa fa-trophy"></i> ผลงานดีเด่นของบัณฑิตศึกษา</h2>
                <h4 class="card-subtitle text-center"> วิทยานิพนธ์ ดุษฎีนิพนธ์และผลงานอื่นๆ</h4><br/>
                <div id="showPort"  class="row">

               </div>
             </div>
          </div>
        </div>

      </div>
    </div>

            <footer class="footer">Copyright © Information Technology 2017</footer>
        </div>
    </div>

    <?php include('import-javascript.php')?>
    <script src="js/GraduateHallofFame.js"></script>
</body>
<!--====================================  portfolio Modal ====================================================-->

<div class="modal fade" id="portfolioModal" role="dialog" aria-labelledby="Message" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id=""><p id="namePort"></p></h4>
      </div>
      <div class="modal-body">
          <div  class="container tab-pane active" id="Detail">
          <p> </p>
          <p><strong><li>รายละเอียด</li></strong></p>
          <p id="portDetail">

          </p>

          <p><strong><li>ประเภทผลงาน</li></strong></p>
          <p id="portType">

          </p>

          <p><strong><li>ปีที่ได้รับรางวัล</li></strong></p>
          <p id="portYear">

          </p>

          <p><strong><li>รูปภาพ</li></strong></p>
          <div class="col-md-12" align="center" id="portImage">

          </div>
      </div>
    </div>

      <div class="modal-footer">
        <button id="btClose" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--===========================================================================================================-->

</html>
