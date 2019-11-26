<?php  include("db/db.php"); ?>
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>หน้าแรก</strong>
    </div>

    <table>
      <tr>
        <br>  
        <div class="col-lg-12">
          <?php
          $sql = "SELECT COUNT(USER_ID) as id FROM M_USER";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          { 
            while($row = $result->fetch_assoc()) 
            {
              ?>

              <div class="col-md-12"> 
                <div class="alert  alert-info alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  จำนวนสมาชิกในระบบ  
                  <span class="badge badge-pill badge-info"> <?php echo $row["id"] ?> </span>
                </div> 
              </div>  
              <?php 
            }
          } 
          ?>
        </div>  
      </tr> 
    </table>
    <center>
      <?php  
      include("db/db_dashboard_admin.php"); 
     //ดึงฐานข้อมูล
      $query = "SELECT USER_STATUS, count(*) as number FROM M_USER GROUP BY USER_STATUS";  
      $result = mysqli_query($connect, $query);  
      ?>   
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
      </script>  
      <script type="text/javascript">  
       google.charts.load('current', {'packages':['corechart']});  
       google.charts.setOnLoadCallback(drawChart);  
       function drawChart()  
       {  
        var data = google.visualization.arrayToDataTable([  
          ['Status', 'Number'],  
          <?php  
          while($row = mysqli_fetch_array($result))  
          {  
           echo "['".$row["USER_STATUS"]."', ".$row["number"]."],";  
         }  
         ?>  
         ]);  
        var options = 
        {  
          title: '',   
          //is3D:true,  
          pieHole: 0.4  
        };  
        var chart = new google.visualization.PieChart(document.getElementById('piechart11'));  
        chart.draw(data, options);  
      }  
    </script>  
    <hr>  

    <h4 align="center">
      แสดงสถานะผู้เข้าใช้งานะบบแนะนำอาชีพที่เหมาะสมให้กับนักศึกษา <br><br> 
    </h4>  
    เปอร์เซ็นต์ของสถานะผู้ใช้ระบบ
    <div id="piechart11" style="width: 800px; height: 300px;"></div> 

  </center>
</div> 
</div>  

