<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="containerPsychology" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table id="datatablePsychology" class="table table">
    <thead>
        <tr>
            <th></th>
            <th>ร้อยละ</th>
        </tr>
    </thead>
    <?php
    $sql = "SELECT * FROM MAPPING_STUDENT_REPORT AS R
        LEFT JOIN M_CAREER AS C ON R.CAREER_ID = C.CAREER_ID
        LEFT JOIN M_GROUP_QUESTION AS G ON R.QUESTION_ID = G.QUESTION_ID
        WHERE R.STUDENT_ID = " . $_SESSION['USER_ID'] . " AND R.CREATE_DATE = '$form_date' 
        AND G.QUESTION_PART = '$form_side2' AND G.QUESTION_TYPE = '$form_type2'
        ORDER BY R.MAPPING_STUDENT_REPORT_ID";

    $result = $conn->query($sql); 
    $i =0 ;
    $sumMax =0 ;
    if ($result->num_rows > 0) 
    { 
        ?>
        <tbody>
            <?php
            while($row = $result->fetch_assoc()) 
            { 
                $i = $i +1;  
                if ($i <= 5) {
                    ?>
                    <tr>
                        <!-- <th><?php //echo $row['degree']; ?></th> -->
                        <th><?php echo 'อันดับ '.$i.' '.$row['CAREER_NAME']; ?></th>
                        <?php $sumMax = $row['RAW_SCORE'] + $sumMax ; 
                        $Max_score = ($row['RAW_SCORE'] / $row['TOTAL_SCORE'] ) *100; ?>
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
<hr>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<script type="text/javascript">
    Highcharts.chart('containerPsychology', {
        data: {
            table: 'datatablePsychology'
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
