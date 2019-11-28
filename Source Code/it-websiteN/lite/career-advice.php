<!DOCTYPE html>
<html lang="en">
  <head>
    <?php session_start(); ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php include('header.php') ?>
  </head>

  <body class="fix-header fix-sidebar card-no-border logo-center">
  
    <?php include('navbar-system.php') ?>

    <div class="page-wrapper">
      <div class="card-block">
        <div class="row">
          <?php include("career/menu.php")?>
          <?php include("career/container.php")?> 
          <?php include("career/modal.php"); ?>
        </div>
      </div>
    </div>

    <?php include('import-javascript.php')?>

    <script src="js/index.js"></script>
    <script src="chart-js/Chart.bundle.js"></script>
  </body>
</html>
