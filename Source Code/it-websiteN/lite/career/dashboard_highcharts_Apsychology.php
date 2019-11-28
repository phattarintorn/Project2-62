<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="containerpsychology" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table id="datatablepsychology" class="table table">
    <thead>
        <tr>
            <th></th>
            <th>ร้อยละ</th>
        </tr>
    </thead>
    <?php
    // $sql = "SELECT SUM(raw_score) AS raw,`career`,`side`,`type` FROM `sum_form` 
    // WHERE `user_id` = '$_SESSION_id' AND `side` = 'ด้านจิตวิทยา' GROUP BY `career`,`side` ORDER BY raw DESC";

    $sql = "SELECT SUM(R.RAW_SCORE) AS RAW, C.CAREER_NAME, G.QUESTION_PART FROM MAPPING_STUDENT_REPORT AS R
    LEFT JOIN M_CAREER AS C ON R.CAREER_ID = C.CAREER_ID
    LEFT JOIN M_GROUP_QUESTION AS G ON R.QUESTION_ID = G.QUESTION_ID
    WHERE STUDENT_ID = " . $_SESSION['USER_ID'] . " AND G.QUESTION_PART = 'ด้านจิตวิทยา' 
    GROUP BY C.CAREER_NAME, G.QUESTION_PART ORDER BY RAW DESC";

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
                        <th><?php echo 'อันดับ '.$i.' '.$row['CAREER_NAME']; ?></th> 
                        <?php $Max_scoreP = ($row['RAW'] / $sum_rawP)*100; ?>
                        <td><?php echo number_format($Max_scoreP, 2, '.', ' ') ?></td>
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
    Highcharts.chart('containerpsychology', {
        data: {
            table: 'datatablepsychology'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'อาชีพที่เหมาะกับคุณจากด้านจิตวิทยา'
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
