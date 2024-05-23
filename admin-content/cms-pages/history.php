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

    <main id="main">
        <div class="container">
            <div class="header">
                <!-- <ul>
                    <li><a href="" onclick="post_news()">Post News</a></li>
                    <li><a href="" onclick="manage_news()">Manage News</a></li>
                </ul> -->
                <h1><i class="fa-solid fa-bullhorn"></i>History</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"><i class="fa-solid fa-plus"></i>Add History</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-gear"></i>Manage History</button>
                </div>
            </div>
            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">

                    <form action="../../back_end/add_history.php" method="post" enctype="multipart/form-data">
                        <div>
                            <span>History Year</span>
                            <input name="history-year" class="headline" type="text" placeholder="History Year" required><br>
                        </div>

                        <div>
                            <span>History Event</span>
                            <textarea name="history-event" id="history-event" cols="70" rows="6" autocomplete="off" placeholder="History Event" required></textarea><br>
                        </div>

                        <input type="submit" name="submit" id="submit" value="Add History">
                        <!-- <button type="submit">Upload Article</button> -->
                    </form>
                </div>

                <div class="news-page manage-news" id="manage-news">
                    <h1>Manage History</h1>
                    <div class="news-list">

                        <?php
                        include("../../back_end/config.php");
                        $query = "SELECT * FROM mint_history;";

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

                                echo '    <div class="news-headline">';
                                echo '            <p>' . $data[$i]['history_event'] . '</p>';
                                echo '        <div class="date">';
                                echo '<i class="fa-solid fa-calendar-days"></i>' . substr($data[$i]["history_year"], 0, 10);
                                echo '        </div>';
                                echo '    </div>';

                                echo '    <div class="control-btn">';
                                echo '        <button id = "edit_event' . $i . '" onclick="edit(' . $data[$i]['history_id'] . ')" class="edit"> <i class="fa-solid fa-pencil"></i> Edit</button>';
                                echo '        <button id = "delete_event' . $i . '" onclick="delete_history(' . $data[$i]['history_id'] . ')" class="delete"> <i class="fa-solid fa-trash"></i> Delete</button>';
                                echo '    </div>';

                                echo '</div>';
                            }
                        } else {
                            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No History</h1><br><hr>";
                        }
                        mysqli_close($con);
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


        function delete_history(param) {
            if (confirm("Are you sure you want to delete this history?")) {
                window.location.href = '../../back_end/delete-history.php?history_id=' + param;
            }
        }

        function edit(param) {
            window.location.href = 'edit_items_history.php?history_id_no=' + param;
        }
    </script>
</body>

</html>