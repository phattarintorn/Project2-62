  <html lang="en">

<head >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <?php  include('header.php') ?>
     <link href="css/hover-staff.css" rel="stylesheet">

     <style>



#list_teacher .showToolTip {
    position: relative;
    display: inline-block;
}

#list_teacher .showToolTip .tooltipButton{
    visibility: hidden;
    width: 200px;
    background-color: #fff;
    color: #000;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -100px;
    opacity: 0;
    transition: opacity 0.3s;
}

#list_teacher .showToolTip .tooltipButton::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

#list_teacher .showToolTip:hover .tooltipButton {
    visibility: visible;
    opacity: 1;
}

.avatar {
width:230px;
border-radius: 500px;
-webkit-border-radius: 500px;
-moz-border-radius: 500px;
}

</style>

</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>


    <?php  include('navbar.php') ?>

    <div class="page-wrapper">
      <div class="card-block">
        <div class="card">
            <div class="card-block">
        <div class="row text-center">

        <div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12 ">
            <img src="../images/teacher-icon.png" width="80vh">
            <h2 class="card-title text-center"> คณาจารย์ </h2>

        </div>
      </div>
      </div>
    </div>
          <div class="card">
            <div class="card-block">
              <br>
  <div class="row text-center" id="list_teacher">

  </div>
</div>
</div>


<div class="card">
    <div class="card-block">
<div class="row text-center">

<div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12 ">
    <img src="../images/admin-icon.png" width="80vh">
    <h2 class="card-title text-center"> เจ้าหน้าที่บริหารงานทั่วไป </h2>

</div>
</div>
</div>
</div>

        <div class="card">
          <div class="card-block">
            <br>
  <div class="row" id="list_admin">
  </div>
</div>
</div>


<div class="card">
    <div class="card-block">
<div class="row text-center">

<div class="col-xlg-12 col-lg-12 col-md-12 col-sm-12 ">
    <img src="../images/ta-icon.png" width="80vh">
    <h2 class="card-title text-center"> ผู้ช่วยสอนและวิจัย </h2>

</div>
</div>
</div>
</div>

        <div class="card">
          <div class="card-block">
            <br>
  <div class="row" id="list_ta">
  </div>




  </div>
  </div>
</div>

</div>
</div>
<?php include('footer.php')?>


  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8Mg5Fex-2rEgnmve3DCccIAokXhcqmpA" type="text/javascript"></script>

    <?php include('modal-personal.php')?>
  <?php include('import-javascript.php')?>
  <script src="js/personal.js"></script>
</body>
</html>
