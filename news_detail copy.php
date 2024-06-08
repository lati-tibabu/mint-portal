<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>News Details</title>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
</head>

<body>
    <?php
    include("../mint-portal/back_end/config.php");
    // include("back_end/config.php");

    // $news_id = $_GET['news_id'];
    $news_id = 31;

    $query = "SELECT * FROM news where news_id = $news_id;";

    $result = mysqli_query($con, $query);

    $data = array();

    // $count = 0;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
            // $count = $count + 1;
        }
    } ?>

    <?php
    include('header.php');
    ?>

    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->
    <div class="page">
        <div class="backButton">
            <a href="news.php">
                <i class="fa-solid fa-chevron-left"></i> Back to News
            </a>
        </div>
        <div class="detailed-news">
            <div class="detailed-headline">
                <!-- New AI Suit Sparks Breakthrough in Spinal Cord Injury Rehabilitation -->
                <?php echo $data[0]['news_headline']; ?>
            </div>
            <div class="detailed-news-content">
                <div class="news-photo-headline">
                    <!-- <img src="images/news3.jpg" alt=""> -->
                    <?php echo '<img src="back_end/images/' . $data[0]['news_image'] . '" alt="">'; ?>
                    <div class="date-author">
                        <div class="detailed-date">
                            <!-- Jul 30, 2023 -->
                            <?php echo substr($data[0]["news_date"], 0, 10); ?>
                        </div>
                        <div class="detailed-author">
                            <span>By </span>
                            MinT News
                        </div>
                    </div>
                </div>

                <div class="detailed-description">
                    <?php echo $data[0]['news_detail']; ?>
                </div>
            </div>

        </div>
    </div>

    <!-- <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script> -->
    <?php
    include('footer.php');
    ?>
    <script src="js/news.js"></script>
    <script src="js/behavior.js"></script>
</body>

</html>