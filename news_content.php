<div class="news">
    <div class="page_name news-head">
        News
    </div>

    <div class="news-content">

        <?php
        // echo "hello";
        include("../mint-portal/back_end/config.php");
        $query = "SELECT * FROM news;";

        $result = mysqli_query($con, $query);

        $data = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row;
                $data[] = $row;

                // $json = json_encode($data);
                // header('Content-type: application/json');
                // echo $json;

            }
        }
        // echo $data["news_headline"];
        
        $json = json_encode($data);

        header('Content-type: application/json');
        // echo $json[0]['news_headline'];
        ?>
        <div id="newsData" style="display: none;"><?php echo $json; ?></div>
    </div>

</div>
<script>
    // Retrieve JSON data from the hidden div
    var jsonData = JSON.parse(document.getElementById('newsData').textContent);
    
    // Example: Displaying the first news headline
    var firstNewsHeadline = jsonData[0].news_headline;
    var newsContent = document.querySelector('.news-content');
    newsContent.innerHTML = "<p>" + firstNewsHeadline + "</p>";
</script>