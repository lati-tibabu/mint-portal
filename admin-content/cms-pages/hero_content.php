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

    <?php
    include("header_2.php");
    ?>

    <?php
    include('public-relation-checker.php');
    ?>

    <main id="main">
        <div class="container">
            <div class="header">
                <h1><i class="fa-solid fa-picture"></i>Hero</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"><i class="fa-solid fa-calendar-plus"></i>Hero Content</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-gear"></i>Manage Hero</button>
                </div>
            </div>
            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">
                    <form action="../../../mint-portal/back_end/hero_post.php" method="post">
                        <div>
                            <span>Hero Image Link</span>
                            <input name="hero_image_link" class="headline" type="url" placeholder="Hero Image Link" required>
                        </div>

                        <div>
                            <span>Hero Text</span>
                            <input name="hero_text" class="headline" type="text" placeholder="Hero Text" required>
                        </div>

                        <input type="submit" name="submit" value="Submit">
                    </form>

                </div>

                <div class="news-page manage-news" id="manage-news">
                    <h1>Manage Hero</h1>
                    <div class="news-list">

                        <?php
                        include("../../back_end/config.php");
                        $query = "SELECT * FROM hero_image;";

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
                                echo '        <img src="' . $data[$i]['image_link'] . '" alt="" srcset="">';
                                echo '    </div>';
                                echo '    <div class="news-headline">';
                                echo '            <p>' . substr($data[$i]["image_link"], 0, 30) . '...</p>';
                                // echo '        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, suscipit quaerat.</p>';
                                echo '        <div class="date">';
                                echo '<i class="fa-solid fa-calendar-days"></i>' . $data[$i]['hero_text'];

                                // echo '            August 13, 2023';
                                echo '        </div>';
                                echo '    </div>';
                                echo '    <div class="control-btn">';
                                echo '        <button id = "use_hero' . $i . '" onclick="use(' . $data[$i]['hero_id'] . ')" class="edit"><i class="fa-solid fa-circle-check"></i>Use</button>';
                                echo '        <button id = "edit_hero' . $i . '" onclick="edit(' . $data[$i]['hero_id'] . ')" class="edit"><i class="fa-solid fa-pencil"></i>Edit</button>';
                                echo '        <button id = "delete_hero' . $i . '" onclick="delete_hero(' . $data[$i]['hero_id'] . ')" class="delete"><i class="fa-solid fa-trash"></i>Delete</button>';
                                echo '    </div>';
                                // echo '<input type="hidden" value="' . $data[$i]['news_id'] . '" style="width:30px; display:none;"';
                                echo '</div>';
                            }
                        } else {
                            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No events</h1><br><hr>";
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


        function delete_hero(param) {
            if (confirm("Are you sure you want to delete this hero?")) {
                window.location.href = '../../back_end/delete-hero.php?hero_id=' + param;
            }
        }

        function use(param) {
            if (confirm("Are you sure you want to use this hero_content?")) {
                window.location.href = '../../back_end/use_hero.php?hero_id=' + param;
            }
        }

        function unpublish_event(param) {
            if (confirm("Are you sure you want to unpublish this event?")) {
                window.location.href = '../../back_end/unpublish_events.php?event_id=' + param;
            }
        }

        function edit(param) {
            window.location.href = 'edit_items_events.php?event_id_no=' + param;
        }
    </script>
</body>

</html>