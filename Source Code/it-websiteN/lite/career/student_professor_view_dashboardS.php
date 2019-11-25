<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="containerSkill" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table id="datatableSkill" class="table table">
    <thead>
        <tr>
            <th></th>
            <th>ร้อยละ</th>
        </tr>
    </thead>
    <?php
    $sql = "SELECT SUM(RAW_SCORE) AS raw,
    m_career.CAREER_NAME AS career,
    m_question.QUESTION_PART AS part
    FROM MAPPING_STUDENT_REPORT AS m_report
    LEFT JOIN M_GROUP_QUESTION AS m_question ON m_report.QUESTION_ID	= m_question.QUESTION_ID	
    LEFT JOIN M_CAREER AS m_career ON m_report.CAREER_ID = m_career.CAREER_ID
    LEFT JOIN M_USER AS m_user ON m_report.STUDENT_ID = m_user.USER_ID
    WHERE m_user.USER_ID = $id AND m_question.QUESTION_ID = 1 GROUP BY career ORDER BY raw DESC";

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
                        <th><?php echo 'อันดับ '.$i.' '.$row['career']; ?></th> 

                        <?php $Max_scoreS = ($row['raw'] / $sum_rawS)*100; ?>
                        <td><?php echo number_format($Max_scoreS, 2, '.', ' ') ?></td>
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
    Highcharts.chart('containerSkill', {
        data: {
            table: 'datatableSkill'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'อาชีพที่เหมาะกับคุณจากด้านทักษะ'
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
