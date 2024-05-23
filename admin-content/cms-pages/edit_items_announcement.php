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
            <i class="fa-solid fa-pencil"></i>Edit Announcement
        </div>

        <div class="back_button">
            <a href="announcements.php"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <div class="item-content">
            <form action="../../../mint-portal/back_end/announcement-edit-post.php" method="post" enctype="multipart/form-data">
                <!-- <div class="search-news">
                    <form action="" method="get">
                        <input type="number" name="news_id_no" id="">
                        <button>Search</button>
                    </form>
                </div> -->
                <?php
                include("../../back_end/config.php");

                $announcement_id_no = $_GET['announcement_id_no'];

                $query = "SELECT * FROM announcements where announcement_id = $announcement_id_no;";

                $result = mysqli_query($con, $query);

                $data = array();

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                } else {
                    echo "<script>alert('Announcement couldn't be found');</script>";
                    header('Location: ../../admin-content/cms-pages/announcement.php');
                }
                ?>

                <input type="hidden" name="announcement_id" value="<?php echo $data[0]['announcement_id']; ?>" readonly>
                <div class="item-content-detail">
                    <label for="news_headline">Announcement Name</label>
                    <input type="text" name="announcement-name" id="announcement-name" value="<?php echo $data[0]['announcement_name']; ?>">
                </div>
                <div class="item-content-detail">
                    <label for="news-detail">Announcement Description</label>
                    <!-- <textarea name="news-detail" id="news-detail" cols="30" rows="6"></textarea> -->
                    <textarea name="announcement-description" id="announcement-description" cols="30" rows="10"><?php echo $data[0]['announcement_description']; ?></textarea>
                </div>

                <div class="item-content-detail">
                    <label>Announcement Date</label>
                    <input name="announcement-date" type="date" placeholder="Event Date" required value="<?php echo $data[0]['announcement_date']; ?>">
                </div>

                <button>Update The Announcement</button>
            </form>
        </div>
    </div>
</body>

</html>