<div class = "card">
    <div class = "card-header">
        <div class = "row">
            <div class = "col-md-6" style = "padding-top: 1vh;">
                <strong class="card-title">แผนการเรียน</strong>
            </div>
            <div class = "col-md-3">
                <a href="#" class="btn btn-success" id="btn-Convert-Html2Image" style = "width:100%;">ดาวน์โหลด</a>
                <!-- <a id="btn-Convert-Html2Image" href="#">Download</a>  -->
            </div>
            <div class = "col-md-3">
                <a href="career-advice.php?career=student_manage_module" class="btn btn-success" style = "width:100%;">จัดการแผนการเรียน</a>
            </div>
        </div>
    </div>
    <div class = "card-body" id = "html-content-holder" style = "background-color: #FFFFFF;">
        <?php
            include("db/db.php");

            echo '<div class = "row" style = "margin: 20px;">';

            for ($i = 0; $i <= 3; $i++) {
                if ($i == 0) {
                    echo '<div class = "col-md-3"></div>';
                } else {
                    echo '<div class = "col-md-3"><strong class = "card-title">Semester ' . $i . '</strong></div>';
                }
            }

            echo '</div>';
            
            for ($year = 1; $year <= 4; $year++) {
                $x = 1;
                for ($no = 1; $no <= 4; $no++) {
                    $sql = 'SELECT * FROM MAPPING_STUDENT_MODULE AS SM
                        LEFT JOIN M_MODULE AS M ON SM.MODULE_ID = M.MODULE_ID
                        WHERE SM.STUDENT_ID = ' . $_SESSION["USER_ID"] . ' AND SM.MODULE_YEAR = ' . $year . '
                        AND SM.MODULE_NO = ' . $no;

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<div class = "row" style = "margin: 20px;">';
                        if ($x % 4 == 1) {
                            echo '<div class = "col-md-3"><strong class = "card-title">Year ' . $year . '</strong></div>';
                            $x++;
                        } else {
                            echo '<div class = "col-md-3"></div>';
                        }

                        while($row = $result->fetch_assoc()) {
                            if ($row["MODULE_ID"] == 0) {
                                echo '<div class = "col-md-3"></div>';
                            } else {
                                echo '<div class = "col-md-3">' . $row["MODULE_CODE"] . ' - ' . $row["MODULE_NAME"] . '</div>';
                            }
                        }
                        echo '</div>';
                    }
                }
            }
        ?>
    </div>
</div>
<div id = "previewImage" style = "display: none;"></div>

<script> 
    $(document).ready(function() { 
        
        // Global variable 
        var element = $("#html-content-holder");  
        
        // Global variable 
        var getCanvas;  

        // $("#btn-Preview-Image").on('click', function() { 
            html2canvas(element, {
                onrendered: function(canvas) { 
                    $("#previewImage").html(canvas); 
                    getCanvas = canvas; 
                } 
            });
        // });

        $("#btn-Convert-Html2Image").on('click', function() { 
            var imgageData =  
                getCanvas.toDataURL("image/png"); 
            
            // Now browser starts downloading  
            // it instead of just showing it 
            var newData = imgageData.replace( 
            /^data:image\/png/, "data:application/octet-stream"); 
            
            $("#btn-Convert-Html2Image").attr( 
            "download", "GeeksForGeeks.png").attr( 
            "href", newData); 
        }); 
    }); 
</script>