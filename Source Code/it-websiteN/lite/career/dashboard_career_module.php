<div class = "row">
    <?php
        include("db/db.php");
        $conn->query("SET NAMES UTF8");

        $sql = "SELECT * FROM M_CAREER";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class = "col-md-4">';
                echo '<div class = "card" align = "center">';
                echo '<div class = "card-header">';
                echo $row["CAREER_NAME"];
                echo '</div>';
                echo '<div class = "card-body" style = "padding: 15px;">';
                echo '<img style="width:35%; height:45%; margin-bottom: 10px;" src="images/career/character/' . $row["CAREER_IMAGE"] . '">';
                echo '<br>';
                echo '<a href="#" class="btn btn-success" style = "width:80%;">See Profile</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }

    ?>
</div>