<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div class = "card">
    <div class = "card-header">
        <div class = "row">
            <div class = "col-md-12" style = "padding-top: 1vh;">
                <strong class="card-title">รายงานด้านจิตทักษะ</strong>
            </div>
        </div>
    </div>
    <div class = "card-body" id = "html-content-holder" style = "padding: 20px; background-color: #FFFFFF;">
        <div id="containerSkill" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <table id="datatableSkill" class="table table">
            <thead>
                <tr>
                    <th></th>
                    <th>ร้อยละ</th>
                </tr>
            </thead>
            <?php
                $STUDENT_ID = $_SESSION["USER_ID"];

                $sql = "SELECT TOTAL_SCORE FROM MAPPING_STUDENT_REPORT AS R
                    LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
                    WHERE STUDENT_ID = $STUDENT_ID AND Q.QUESTION_PART = 'ด้านทักษะ'
                    GROUP BY R.CREATE_DATE";

                $result = $conn->query($sql);
                $total = 0;

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $total = $total + $row["TOTAL_SCORE"];
                    }   
                } 

                $sql = "SELECT SUM(RAW_SCORE) AS SUM, C.CAREER_NAME AS CAREER FROM MAPPING_STUDENT_REPORT AS R
                    LEFT JOIN M_GROUP_QUESTION AS Q ON R.QUESTION_ID = Q.QUESTION_ID
                    LEFT JOIN M_CAREER AS C ON R.CAREER_ID = C.CAREER_ID
                    WHERE STUDENT_ID = $STUDENT_ID AND Q.QUESTION_PART = 'ด้านทักษะ'
                    GROUP BY R.CAREER_ID ORDER BY SUM DESC";

                $result = $conn->query($sql); 

                $i =0 ;
                $sumMax =0 ;

                if ($result->num_rows > 0) { 
                    ?>
                    <tbody>
                        <?php
                        while($row = $result->fetch_assoc()) 
                        { 
                            $i = $i +1;  
                            if ($i <= 5) {
                                ?>
                                <tr>
                                    <th><?php echo 'อันดับ '.$i.' '.$row['CAREER']; ?></th>
                                    <?php $Max_score = ($row['SUM'] / $total ) *100; ?>
                                    <td><?php echo ' '.number_format($Max_score, 2, '.', ' '); ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                    <?php
                }
            ?> 
        </table>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
        <script type="text/javascript">
            Highcharts.chart('containerSkill', {
                data: {
                    table: 'datatableSkill'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'อาชีพที่เหมาะกับคุณ'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'ร้อยละ'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                    }
                }
            });
        </script>  
    </div>
</div>
