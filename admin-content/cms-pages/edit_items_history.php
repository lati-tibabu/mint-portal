<?php

include("session-checker.php");
include('public-relation-checker.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Items</title>
    <!-- <link rel="stylesheet" href="../styles/content-manage-style.css"> -->
    <link rel="stylesheet" href="../styles/edit_items_style.css">
    <link rel="stylesheet" href="../../style/header_styles.css">
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
</head>

<body>

    <?php
    // include("header_2.php");
    ?>

    <div class="container">
        <div class="logoPart" id="logoPart">
            <img class="logo" id="logo" src="../../logo/mint_logo_circle.svg" alt="" srcset="">
            <div id="co_name" style="color: white;">
                Ministry of Innovation and Technology<br>
                የኢኖቬሽን እና ቴክኖሎጂ ሚኒስቴር

            </div>
        </div>
        <div class="item-category">
            <i class="fa-solid fa-pencil"></i>Edit History
        </div>

        <div class="back_button">
            <a href="history.php"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <div class="item-content">
            <form action="../../../mint-portal/back_end/history-edit-post.php" method="post" enctype="multipart/form-data">
                
            <!-- <div class="search-news">
                    <form action="" method="get">
                        <input type="number" name="news_id_no" id="">
                        <button>Search</button>
                    </form>
                </div> -->
                <?php
                include("../../back_end/config.php");

                $history_id_no = $_GET['history_id_no'];

                $query = "SELECT * FROM mint_history where history_id = $history_id_no;";

                $result = mysqli_query($con, $query);

                $data = array();

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                } else {
                    echo "<script>alert('History couldn't be found');</script>";
                    header('Location: ../../admin-content/cms-pages/history.php');
                }
                ?>

                <input type="hidden" name="history_id" value="<?php echo $data[0]['history_id']; ?>" readonly>
                
                <div class="item-content-detail">
                    <label for="news-detail">History Event</label>
                    <textarea name="history-event" id="history-event" cols="30" rows="10"><?php echo $data[0]['history_event']; ?></textarea>
                </div>

                <div class="item-content-detail">
                    <label for="news_headline">History Year</label>
                    <input type="text" name="history-year" id="history-year" value="<?php echo $data[0]['history_year']; ?>">
                </div>
                <button>Update The History</button>
            </form>
        </div>
    </div>
</body>

</html>