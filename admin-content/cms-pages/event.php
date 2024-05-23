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
                <h1><i class="fa-solid fa-calendar-days"></i>Events</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"><i class="fa-solid fa-calendar-plus"></i>Add New Event</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-gear"></i>Manage Events</button>
                </div>
            </div>
            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">
                    <form action="../../../mint-portal/back_end/event-post.php" method="post" enctype="multipart/form-data">
                        <div>
                            <span>Event Name</span>
                            <input name="event-name" class="headline" type="text" placeholder="Event name" required><br>
                        </div>

                        <div>
                            <span>Event Description</span>
                            <textarea name="event-description" id="news-detail" cols="70" rows="10" autocomplete="off" placeholder="Event description" required></textarea><br>
                        </div>

                        <div>
                            <span>Event Date</span>
                            <input name="event-happen-date" class="headline" type="date" placeholder="Event Date" required><br>
                        </div>
                        <div>
                            <span>Event Time</span>
                            <input name="event-happen-time" class="headline" type="time" placeholder="Event Time" required><br>
                        </div>

                        <div>
                            <span>Event Location</span>
                            <input name="event-location" class="headline" type="text" placeholder="Event Location" required><br>
                        </div>

                        <div>
                            <span>Event Type</span>
                            <select name="is_featured" required>
                                <option value="=">Event Type</option>
                                <option value=1>Featured</option>
                                <option value=0>Not Featured</option>
                            </select><br>
                        </div>

                        <div class="event-image-section">
                            <label for="event-image">Event Image</label>
                            <input type="file" id="image" name="image" accept="image/*" class="image-input" required>
                        </div>

                        <!-- <img id="preview" src="#" alt="Selected Photo" style="max-width: 300px; display: none;"> -->

                        <input type="submit" name="submit" id="submit" value="Upload and Add Event">
                        <!-- <button>Upload Article</button> -->
                    </form>
                </div>

                <div class="news-page manage-news" id="manage-news">
                    <h1>Manage Event</h1>
                    <div class="news-list">

                        <?php
                        include("../../back_end/config.php");
                        $query = "SELECT * FROM event;";

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
                                echo '        <img src="../../back_end/images/event/' . $data[$i]['event_image'] . '" alt="" srcset="">';
                                echo '    </div>';
                                echo '    <div class="news-headline">';
                                echo '            <p>' . $data[$i]['event_name'] . '</p>';
                                // echo '        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, suscipit quaerat.</p>';
                                echo '        <div class="date">';
                                echo '<i class="fa-solid fa-calendar-days"></i>' . substr($data[$i]["event_date"], 0, 10);

                                // echo '            August 13, 2023';
                                echo '        </div>';
                                echo '    </div>';
                                echo '    <div class="control-btn">';
                                if ($data[$i]['event_is_published'] == '0') {
                                    echo '        <button id = "publish_event' . $i . '" onclick="publish_event(' . $data[$i]['event_id'] . ')" class="edit publish">Publish</button>';
                                }
                                if ($data[$i]['event_is_published'] == '1') {
                                    echo '        <button id = "unpublish_event' . $i . '" onclick="unpublish_event(' . $data[$i]['event_id'] . ')" class="edit">Unpublish</button>';
                                }
                                echo '        <button id = "edit_event' . $i . '" onclick="edit(' . $data[$i]['event_id'] . ')" class="edit"><i class="fa-solid fa-pencil"></i>Edit</button>';
                                echo '        <button id = "delete_event' . $i . '" onclick="delete_event(' . $data[$i]['event_id'] . ')" class="delete"><i class="fa-solid fa-trash"></i>Delete</button>';
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


        function delete_event(param) {
            if (confirm("Are you sure you want to delete this event?")) {
                window.location.href = '../../back_end/delete-events.php?event_id=' + param;
            }
        }

        function publish_event(param) {
            if (confirm("Are you sure you want to publish this event?")) {
                window.location.href = '../../back_end/publish_events.php?event_id=' + param;
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