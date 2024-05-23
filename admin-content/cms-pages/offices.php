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
</head>

<body>

    <!-- <div id="adminHeader"></div>
    <script src="../js/adminHeader.js"></script> -->
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

    <?php
    include('header_2.php');
    ?>

    <?php
    include('human-resource-checker.php');
    ?>

    <main id="main">
        <div class="container">
            <div class="header">
                <!-- <ul>
                    <li><a href="" onclick="post_news()">Post News</a></li>
                    <li><a href="" onclick="manage_news()">Manage News</a></li>
                </ul> -->
                <h1><i class="fa-regular fa-office"></i>Offices</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"></i><i class="fa-solid fa-plus"></i>Upload Office</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-gear"></i>Manage Offices</button>
                </div>
            </div>
            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">
                    <form action="../../../mint-portal/back_end/office-post.php" method="post" enctype="multipart/form-data">
                        <div>
                            <span>Office Name</span>
                            <input name="office-name" class="headline" type="text" placeholder="Office Name" required><br>
                        </div>

                        <div>
                            <span>Office Description</span>
                            <textarea name="office-description" id="office-description" cols="70" rows="6" autocomplete="off" placeholder="Office Description" required></textarea><br>
                        </div>

                        <div>
                            <span>Office Sector</span>
                            <!-- <input type="file" id="image" name="image" accept="image/*" class="image-input" required> -->
                            <select name="office-sector" id="office-sector">
                                <option value="0">Select Sector</option>
                                <?php
                                for ($i = $sector_count - 1; $i >= 0; $i--) {
                                    echo '<option value="' . $sector_data[$i]['sector_id'] . '">' . $sector_data[$i]['sector_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <img id="preview" src="#" alt="Selected Photo" style="max-width: 300px; display: none;"> -->

                        <input type="submit" name="submit" id="submit" value="Add Office">
                        <!-- <button type="submit">Upload Article</button> -->
                    </form>
                </div>

                <div class="news-page manage-news" id="manage-news">
                    <h1>Manage Offices</h1>
                    <div class="news-list">

                        <?php
                        include("../../back_end/config.php");
                        $query = "SELECT * FROM office;";

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
                                echo '        <img src="../../logo/mint_logo_circle.svg" alt="" srcset="">';
                                // echo '        <img src="../../back_end/images/mint_logo_circle.svg" alt="" srcset="">';
                                echo '    </div>';
                                echo '    <div class="news-headline">';
                                echo '            <p>' . $data[$i]['office_name'] . '</p>';
                                // echo '        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, suscipit quaerat.</p>';
                                echo '        <div class="date">';
                                echo  $data[$i]["description"];

                                // echo '            August 13, 2023';
                                echo '        </div>';
                                echo '    </div>';
                                echo '    <div class="control-btn">';
                                echo '        <button id = "edit_news' . $i . '" onclick="edit(' . $data[$i]['office_id'] . ')" class="edit">Edit</button>';
                                echo '        <button id = "delete_news' . $i . '" onclick="delete_office(' . $data[$i]['office_id'] . ')" class="delete">Delete</button>';
                                echo '    </div>';
                                // echo '<input type="hidden" value="' . $data[$i]['news_id'] . '" style="width:30px; display:none;"';
                                echo '</div>';
                            }
                        } else {
                            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Office</h1><br><hr>";
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

        function delete_office(param) {
            if (confirm("Are you sure you want to delete this office?")) {
                window.location.href = '../../back_end/delete_office.php?office_id=' + param;
            }
        }

        function edit(param) {
            window.location.href = 'edit_items_office.php?office_id_no=' + param;
        }
    </script>
</body>

</html>