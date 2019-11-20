<!DOCTYPE html>
<html lang="en">

<head >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <?php  include('header.php') ?>
     <?php include('import-javascript.php')?>
</head>

<body class="fix-header fix-sidebar card-no-border logo-center">

    <div class="preloader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
      </svg>
    </div>



    <?php  include('navbar.php') ?>

        <div class="page-wrapper">

          <div class="card-block">
            <div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <br>
                  <center>
                  <img src="../images/bachelor-icon.png" width="80vh">
                </center>
                  <h2 class="card-title text-center">หลักสูตร</h2>
                  <h4 class="card-subtitle text-center" >ระดับปริญญาตรี </h4><br>
                  <h4 class="text-center" >ชื่อหลักสูตร</h4>

                  <div class="table-responsive m-t-20">
                    <table class="table stylish-table">
                      <tbody id="Suggestion_work"></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12" id="branch">
            <div class="card">
              <div class="card-block">
                <div class="card-body">
                  <br>
                  <h2 class="card-title text-center">กลุ่มวิชาที่เปิดสอน</h2>
                  <h5 class="card-subtitle text-center" id="TitleStudyplan"></h5>
                </div>
                <div class="comment-widgets">
                  <div class="row" id="Branch_work"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12" id="download">
            <div class="card">
              <div class="card-block">

                <div class="card-body">
                  <br>
                  <h4 class="card-title text-center">ดาวน์โหลด แผนการศึกษาและวิชาที่เปิดสอน</h4>
                  <div class="card-body text-center">
                    <p class="card-text">รูปแบบเอกสารเป็นไฟล์ PDF</p>
                    <a class="btn btn-danger" id="downloadPlan" target="_blank">ดาวน์โหลด</a>
                  </div>
                  <br>
                  <h4 class="card-title text-center">และสามารถดาวน์โหลด เอกสารเพิ่มเติมได้ที่ด้านล้างนี้</h4>
                  <h6 class="card-subtitle text-center" id="TitleDownload"></h6>
                </div>

                <div class="comment-widgets">
                  <div class="row" id="Download_work"></div>
                </div>
              </div>
            </div>
          </div>

        <?php include('footer.php')?>

</body>
  <script src="js/course-bachelor.js"></script>
</html>
