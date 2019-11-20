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
        <div class="card-block">
          <div class="card text-center">
            <div class="card-block">
            <img src="../images/aitivity.png" width="60vh">
              <h3>กิจกรรมของนักศึกษา</h3>


            </div>
          </div>
        <div class="card ">
          <div class="card-block">
            <center>
              <h3>ปริญญาตรี</h3>
              <h5 class="card-title text-center ">o o o</h5>

            </center>
            <div id="showActivityBachelor" class="row">

            </div>
          </div>
        </div>
            <div class="card ">
              <div class="card-block">
            <center>
              <h3>บัณฑิตศึกษา</h3>
              <h5 class="card-title text-center ">o o o</h5>

            </center>
            <div id="showActivityGraduation" class="row">

            </div>
          </div>
        </div>



        </div>
      </div>

      <?php include('footer.php')?>
    </div>

    <?php include('import-javascript.php')?>
    <script src="js/activity.js"></script>

    <!--==================================== Show Video ====================================================-->

    <div class="modal fade" id="showVideoModal" role="dialog" aria-labelledby="Message" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header  bg-black">
            <h4 class="modal-title" >วิดีโอ</h4>
          </div>
          <div class="modal-body bg-black">

            <div id="list_video" class="row">
            </div>

          </div>
        </div>
      </div>
    </div>

    <!--===========================================================================================================-->



</body>
</html>
