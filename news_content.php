<div class="news">
    <div class="news-content">

        <?php
        include("../mint-portal/back_end/config.php");
        $query = "SELECT * FROM news;";

        $result = mysqli_query($con, $query);

        $data = array();

        $count = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
                $count = $count + 1;
            }
        }

        if ($count != 0) {

            for ($i = $count-1; $i >= 0; $i--) {
                echo '<div class="news-part">';
                echo '    <div class="news-image">';
                echo '        <img class="newsImage" src="back_end/images/' . $data[$i]['news_image'] . '" onclick="show_news_detail(this)" alt="news-image" srcset="">';
                echo '    </div>';
                echo '    <div class="news-text">';
                echo '        <div class="headline" onclick="appear(this)">';
                echo '            <p>' . $data[$i]['news_headline'] . '</p>';
                echo '        </div>';
                echo '        <div class="news-detail" style="display: none;">';
                echo $data[$i]['news_detail'];
                echo '        </div>';
                echo '        <div class="news-published-day" id="news_date">';
                echo $data[$i]["news_date"];
                echo '        </div>';
                echo '    </div>';
                echo '</div>';

            }
        } else {
            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No News</h1><br><hr>";
        }
        ?>
    </div>
    <div id="newsData" style="display: none;"></div>
</div>

</div>