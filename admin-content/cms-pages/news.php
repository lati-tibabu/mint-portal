<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/content-manage-style.css">
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
</head>

<body>

    <!-- <div id="adminHeader"></div>
    <script src="../js/adminHeader.js"></script> -->
    <?php
    include("header_2.php");
    ?>

    <?php
    include('public-relation-checker.php');
    ?>

    <?php
    include("../../back_end/config.php");
    $sector_query = "SELECT * FROM sector;";

    $sector_result = mysqli_query($con, $sector_query);

    $sector_data = array();

    $sector_count = 0;

    if (mysqli_num_rows($sector_result) > 0) {
        while ($row = mysqli_fetch_assoc($sector_result)) {
            $sector_data[] = $row;
            $sector_count = $sector_count + 1;
        }
    }
    ?>

    <main id="main">
        <div class="container">
            <div class="header">
                <!-- <ul>
                    <li><a href="" onclick="post_news()">Post News</a></li>
                    <li><a href="" onclick="manage_news()">Manage News</a></li>
                </ul> -->
                <h1><i class="fa-regular fa-newspaper"></i>News</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"></i><i class="fa-solid fa-plus"></i>Post News</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-gear"></i>Manage News</button>
                </div>
            </div>
            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">

                    <form action="../../../mint-portal/back_end/news-post.php" method="post" enctype="multipart/form-data">
                        <div>
                            <span>News Headline</span>
                            <input name="headline" class="headline" type="text" placeholder="Enter the news headline" required>
                        </div>

                        <div>
                            <span>News Detail</span>
                            <textarea name="news_detail" id="news-detail" cols="80" rows="6" autocomplete="off" placeholder="Enter the news detail" required></textarea><br>
                        </div>

                        <div>
                            <span>News Category</span>
                            <select name="category" required>
                                <option value="">Select a news category</option>
                                <option value="Technology">Technology</option>
                                <option value="Education">Education</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Health">Health</option>
                            </select><br>
                        </div>

                        <div>
                            <span>News Sector</span>
                            <!-- <input type="file" id="image" name="image" accept="image/*" class="image-input" required> -->
                            <select name="news-sector" id="news-sector" required>
                                <option value="">Select Sector</option>
                                <?php
                                for ($i = $sector_count - 1; $i >= 0; $i--) {
                                    echo '<option value="' . $sector_data[$i]['sector_id'] . '">' . $sector_data[$i]['sector_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="image-upload-section">
                            <span>Upload News Image</span>
                            <input type="file" id="image" name="image" accept="image/*" class="image-input" required>
                        </div>

                        <input type="submit" name="submit" id="submit" value="Upload Article">

                    </form>

                </div>

                <div class="news-page manage-news" id="manage-news">
                    <h1>Manage News</h1>
                    <div class="news-list">

                        <?php
                        include("../../back_end/config.php");
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

                            for ($i = $count - 1; $i >= 0; $i--) {
                                echo '<div class="news">';
                                echo '    <div class="news-image">';
                                echo '        <img src="../../back_end/images/' . $data[$i]['news_image'] . '" alt="" srcset="">';
                                echo '    </div>';
                                echo '    <div class="news-headline">';
                                echo '            <p>' . $data[$i]['news_headline'] . '</p>';
                                // echo '        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, suscipit quaerat.</p>';
                                echo '        <div class="date">';
                                echo '<i class="fa-solid fa-calendar"></i>' . substr($data[$i]["news_date"], 0, 10);

                                // echo '            August 13, 2023';
                                echo '        </div>';
                                echo '    </div>';
                                echo '    <div class="control-btn">';
                                echo '        <button id = "edit_news' . $i . '" onclick="edit(' . $data[$i]['news_id'] . ')" class="edit">Edit</button>';
                                echo '        <button id = "delete_news' . $i . '" onclick="delete_news(' . $data[$i]['news_id'] . ')" class="delete">Delete</button>';
                                echo '    </div>';
                                // echo '<input type="hidden" value="' . $data[$i]['news_id'] . '" style="width:30px; display:none;"';
                                echo '</div>';
                            }
                        } else {
                            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No News</h1><br><hr>";
                        }
                        ?>





                    </div>
                </div>


            </div>
        </div>
    </main>
    <footer>
        <div class="footer-text">
            &copy;Copyright 2023, MinT
        </div>
    </footer>

    <script src="../../js/behavior.js"></script>
    <script>
        function post() {
            const post_news = document.getElementById("post-news");
            const manage_news = document.getElementById("manage-news");
            const add_btn = document.getElementById("add-btn");
            const manage_btn = document.getElementById("manage-btn");

            post_news.style.transform = "translateX(50%)";
            manage_news.style.transform = "translateX(100%)";
            // add_btn.style.backgroundColor = "rgba(230, 148, 60, 0.585)";
            add_btn.style.borderBottom = "4px solid rgba(230, 148, 60, 0.585)";
            // add_btn.style.color = "white";
            // manage_btn.style.backgroundColor = "white";
            manage_btn.style.borderBottom = "none";
            // manage_btn.style.color = "black";
        }

        function manage() {
            const post_news = document.getElementById("post-news");
            const manage_news = document.getElementById("manage-news");
            const add_btn = document.getElementById("add-btn");
            const manage_btn = document.getElementById("manage-btn");

            post_news.style.transform = "translateX(-100%)";
            manage_news.style.transform = "translateX(-50%)";
            // manage_btn.style.backgroundColor = "rgba(230, 148, 60, 0.585)";
            manage_btn.style.borderBottom = "4px solid rgba(230, 148, 60, 0.585)";
            // manage_btn.style.color = "white";
            // add_btn.style.backgroundColor = "white";
            add_btn.style.borderBottom = "none";
            // add_btn.style.color = "black";

        }

        function delete_news(param) {
            if (confirm("Are you sure you want to delete this news?")) {
                window.location.href = '../../back_end/delete_news.php?news_id=' + param;
            }
        }

        function edit(param) {
            window.location.href = 'edit_items_news.php?news_id_no=' + param;
        }
    </script>
</body>

</html>