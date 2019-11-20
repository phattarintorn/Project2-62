
<?php
include("db/db.php"); 

?>
<?php
if(isset($_SESSION["status"])){
  if ($_SESSION["status"] == "admin") {
    echo '<input type="hidden" name="skills_id" value="'.$id.'">';
    echo '<td>"'.$row["skills_detail"].'"</td>';
    echo '<td>
    <a title="แก้ไข"  class="btn-link ti-write" href="career-advice.php?career=editskills&id='.$id.'"></a>
    <a title="ลบ"  class="btn-link ti-trash" href="career-advice.php?career=deleteskills&id='.$id.'"> </a>
    </td>';
  }
  ?>
  <form action="career-advice.php?career=insert_page1" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="content mt-3">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">แบบทดสอบ : ด้านความชอบ ความถนัด และมีความสมารถด้านนั้นๆ เป็นพื้นฐาน</strong>
              </div>
              <div class="card-body">
                <table class="table table-striped datatable" style="width:100%">
                  <thead>
                    <tr align="center"> 
                      <th rowspan="3"><center>ข้อ<br></center>
                      </th>
                      <th rowspan="3"><center>เกณฑ์การเลือกอาชีพ<br></center>
                      </th>
                      <th colspan="5"><center>ระดับความคิดเห็น<br>
                      </th>
                    </tr>
                    <tr align="center"><td><b>1<b></td> <td><b>2<b></td> <td><b>3<b></td> <td><b>4<b></td><td><b>5<b></td>
                    </tr>

                  </thead>
                  <tbody>
                    <tr>
                      <div class="form-check">
                        <div class="checkbox">
                          <label for="checkbox" class="form-check-label" >

                            <!-- <input type="hidden" name="id" value="<?php //echo $row["user_id"];?>"> -->
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"];?>" >

                            <?php
                            $sql = "SELECT * FROM `skills` WHERE `skills_id` "; 
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                $id = $row["skills_id"];
                                echo '<input type="hidden" name="skills_id" value="'.$id.'">';
                                echo '<td>"'.$row["skills_detail"].'"<br></td>';
                                echo '<td>
                                <a title="แก้ไข"  class="btn-link ti-write" href="career-advice.php?career=editskills&id='.$id.'"></a>
                                <a title="ลบ"  class="btn-link ti-trash" href="career-advice.php?career=deleteskills&id='.$id.'"> </a>
                                </td>';
                                // echo '<td>
                                // <button  type="button" class="btn btn-link ti-write editskillsdetail" title="แก้ไข"  data-toggle="modal" data-target="#editskillsdetail"></button>
                                // </td>';

                              } 
                            }  
                            $id++; 
                          }
                          $conn->close(); 
                          ?>    
                        </label>
                      </div>
                    </div>
                  </tr>
                </tbody>
              </table>
            </div>

            <center>
             <button type="submit" value="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
           </center>
           <br>
         </div>
       </div>
       <table border="1" style="width:80%">
       </div>
     </div>
   </div>
 </div>
</form>
