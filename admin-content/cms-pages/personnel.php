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
    include('header_2.php');
    ?>

    <?php
    include('human-resource-checker.php');
    ?>

    
    <?php
    include("../../back_end/config.php");
    $desk_query = "SELECT * FROM desk;";

    $desk_result = mysqli_query($con, $desk_query);

    $desk_data = array();

    $desk_count = 0;

    if (mysqli_num_rows($desk_result) > 0) {
        while ($row = mysqli_fetch_assoc($desk_result)) {
            $desk_data[] = $row;
            $desk_count = $desk_count + 1;
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
                <h1><i class="fa-regular fa-newspaper"></i>Personnel</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"></i><i class="fa-solid fa-plus"></i>Upload Personnel</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-gear"></i>Manage Personnels</button>
                </div>
            </div>
            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">
                    <form action="../../../mint-portal/back_end/personnel-upload.php" method="post" enctype="multipart/form-data">
                        <div>
                            <span>Personnel Name</span>
                            <input name="personnel-name" class="headline" type="text" placeholder="Personnel Name" required><br>
                        </div>

                        <div>
                            <span>Job Title</span>
                            <input name="job-title" class="headline" type="text" placeholder="Job Title" required><br>
                        </div>

                        <div>
                            <span>Department</span>
                            <input name="department" class="headline" type="text" placeholder="Department" required><br>
                        </div>

                        <div>
                            <span>Personnel Desk</span>
                            <select name="personnel-desk" id="personnel-desk">
                                <option value="0">Select Desk</option>
                                <?php
                                for ($i = $desk_count - 1; $i >= 0; $i--) {
                                    echo '<option value="' . $desk_data[$i]['desk_id'] . '">' . $desk_data[$i]['desk_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div>
                            <span>Personnel Image</span>
                            <input type="file" id="image" name="image" accept="image/*" class="image-input" required>
                        </div>
                        <!-- <img id="preview" src="#" alt="Selected Photo" style="max-width: 300px; display: none;"> -->

                        <input type="submit" name="submit" id="submit" value="Add Personnel">
                        <!-- <button type="submit">Upload Article</button> -->
                    </form>
                </div>

                <div class="news-page manage-news" id="manage-news">
                    <h1>Manage Sectors</h1>
                    <div class="news-list">

                        <?php
                        include("../../back_end/config.php");
                        $query = "SELECT * FROM personnel;";

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
                                echo '        <img src="../../back_end/personnel_images/' . $data[$i]['personnel_image'] . '"  alt="" srcset="">';
                                // echo '        <img src="../../back_end/images/mint_logo_circle.svg" alt="" srcset="">';
                                echo '    </div>';
                                echo '    <div class="news-headline">';
                                echo '            <p>' . $data[$i]['name'] . '</p>';
                                // echo '        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, suscipit quaerat.</p>';
                                echo '        <div class="date">';
                                echo  $data[$i]["job_title"];

                                // echo '            August 13, 2023';
                                echo '        </div>';
                                echo '    </div>';
                                echo '    <div class="control-btn">';
                                echo '        <button id = "edit_news' . $i . '" onclick="edit(' . $data[$i]['personnel_id'] . ')" class="edit">Edit</button>';
                                echo '        <button id = "delete_news' . $i . '" onclick="delete_news(' . $data[$i]['personnel_id'] . ')" class="delete">Delete</button>';
                                echo '    </div>';
                                // echo '<input type="hidden" value="' . $data[$i]['news_id'] . '" style="width:30px; display:none;"';
                                echo '</div>';
                            }
                        } else {
                            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Personnel</h1><br><hr>";
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
                window.location.href = '../../back_end/delete_personnel.php?personnel_id=' + param;
            }
        }

        function edit(param) {
            window.location.href = 'edit_items_personnel.php?personnel_id_no=' + param;
        }
    </script>
</body>

</html>