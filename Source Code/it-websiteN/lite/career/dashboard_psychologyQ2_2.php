<?php 

$sql = "SELECT * FROM `sum_form`,data_career WHERE sum_form.career = data_career.career_name AND `user_id`= '$_SESSION_id' AND `date` = '$form_date' AND `side` = '$form_side2' ORDER BY `sum_form`.`degree` ASC";
$result = $conn->query($sql); 
$sumMax =0 ; 
if ($result->num_rows > 0) 
{ 
  $i = 0;
  ?>
  <div class="card">

    <div class="card-header">
      <strong class="card-title"><u></u> วัดด้านจิตวิทยา</strong>
    </div>

    <div class="card-body">
      <table class="table">
        <thead>
          <tr> 
            <th scope="col"><center>อันดับที่</center></th>
            <th scope="col">อาชีพ</th>
            <th scope="col"></th>
            <th scope="col">ร้อยละ</th>
            <tbody>   
              <?php  

              while($row = $result->fetch_assoc()) 
              { 
                $i = $i +1;  

                  echo "<tr>";
                  if ($i <= "5") {

                   echo '<td><center><h3><br>' .$row['degree']. '</h3></center></td>';
                   echo '<td><br><br>' .$row['career']. '</td>'; 
                   echo '<td>';
                   echo '
                   <img style="width:35%;height:45%" src="images/career/character/'.$row["career_character"].'">';
                   echo '</td>';
                   $sumMax = $row['raw_score'] + $sumMax ; 
                    //TOP 5
                   $Max_score = ($row['raw_score'] / $row['top_score'] ) *100; 
                   echo '<td><h3><br>' .number_format($Max_score, 2, '.', ' '). '</h3></td>';
                   echo "</tr>"; 
                 }


             } 
             ?>

           </tr>
         </thead>
       </tbody>
     </table>
   </div>

 </div>
 <?php    
} 
echo '<hr>';  
include("dashboard_highcharts_psychology2.php");   
?>
