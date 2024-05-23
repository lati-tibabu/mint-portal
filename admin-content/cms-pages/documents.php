<?php
// include("session-checker.php");
?>

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
    include('document-manager-checker.php');
    ?>

    <main id="main">
        <div class="container">
            <div class="header">
                <!-- <ul>
                    <li><a href="" onclick="post_news()">Post News</a></li>
                    <li><a href="" onclick="manage_news()">Manage News</a></li>
                </ul> -->
                <h1><i class="fa-solid fa-file"></i>Documents</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"><i class="fa-solid fa-calendar-plus"></i>Upload New Document</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-gear"></i>Manage Documents</button>
                </div>
            </div>
            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">
                    <form action="../../../mint-portal/back_end/upload-document.php" method="post" enctype="multipart/form-data">
                        <input name="document-name" class="headline" type="text" placeholder="Document name" required><br>
                        <textarea name="document-description" id="news-detail" cols="70" rows="10" autocomplete="off" placeholder="Document description" required></textarea><br>
                        <div class="event-image-section">
                            <label for="event-image">Select Document</label>
                            <input type="file" id="document" name="document" class="image-input" required>
                        </div>
                        <br>

                        <!-- <img id="preview" src="#" alt="Selected Photo" style="max-width: 300px; display: none;"> -->

                        <input type="submit" name="submit" id="submit" value="Upload Document">
                        <!-- <button>Upload Article</button> -->
                    </form>
                </div>

                <div class="news-page manage-news" id="manage-news">
                    <h1>Manage Documents</h1>
                    <div class="news-list">

                        <?php
                        include("../../back_end/config.php");
                        $query = "SELECT * FROM documents;";

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
                                // echo '        <img src="../../logo/mint_logo_circle.svg" alt="" srcset="">';
                                echo '        <i class="fa-solid fa-file-pdf"></i>';

                                echo '    </div>';

                                echo '    <div class="news-headline">';
                                echo '            <p>' . $data[$i]['document_name'] . '</p>';
                                // echo '        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, suscipit quaerat.</p>';
                                echo '        <div class="date">';
                                echo '<i class="fa-solid fa-calendar-days"></i>' . substr($data[$i]["document_upload_date"], 0, 10);

                                // echo '            August 13, 2023';
                                echo '        </div>';
                                echo '    </div>';
                                echo '    <div class="control-btn">';
                                echo '        <button id = "edit_event' . $i . '" onclick="edit(' . $data[$i]['document_id'] . ')" class="edit">Edit</button>';
                                echo '        <button id = "delete_event' . $i . '" onclick="delete_document(' . $data[$i]['document_id'] . ')" class="delete">Delete</button>';
                                echo '    </div>';
                                // echo '<input type="hidden" value="' . $data[$i]['news_id'] . '" style="width:30px; display:none;"';
                                echo '</div>';
                            }
                        } else {
                            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No document</h1><br><hr>";
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


        function delete_document(param) {
            if (confirm("Are you sure you want to delete this document?")) {
                window.location.href = '../../back_end/delete-document.php?document_id=' + param;
            }
        }

        function edit(param) {
            window.location.href = 'edit_items_document.php?document_id_no=' + param;
        }
    </script>
</body>

</html>