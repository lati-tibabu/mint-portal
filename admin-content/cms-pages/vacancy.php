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
    include("header_2.php");
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
                <h1><i class="fa-regular fa-newspaper"></i>Vacancy</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"></i><i class="fa-solid fa-plus"></i>Post Vacancy</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-gear"></i>Manage Vacancies</button>
                </div>
            </div>
            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">
                    <form action="../../../mint-portal/back_end/vacancy-post.php" method="post" enctype="multipart/form-data">
                        <div>
                            <span>Job Title</span>
                            <input name="job-title" class="headline" type="text" placeholder="Job Title" required><br>
                        </div>

                        <div>
                            <span>Department/Division</span>
                            <input name="department-division" class="headline" type="text" placeholder="Department/Division" required><br>
                        </div>

                        <div>
                            <span>Location</span>
                            <input name="location" class="headline" type="text" placeholder="Location" required><br>
                        </div>

                        <div>
                            <span>Application Deadline</span><input name="deadline" class="headline" type="date" required><br>
                        </div>

                        <div>
                            <span>Job Description</span>
                            <textarea name="job-description" id="job-description" cols="70" rows="6" autocomplete="off" placeholder="Job Description" required></textarea><br>
                        </div>

                        <div>
                            <span>Job Responsibility</span>
                            <textarea name="responsibility" id="responsibility" cols="70" rows="6" autocomplete="off" placeholder="Job Responsibilities" required></textarea><br>
                        </div>

                        <div>
                            <span>Qualifications/Requirements</span>
                            <textarea name="qualification" id="qualification" cols="70" rows="6" autocomplete="off" placeholder="Job Qualification and Requirements" required></textarea><br>
                        </div>

                        <div>
                            <span>Preferred Skills (if any)</span>
                            <textarea name="skills" id="skills" cols="70" rows="6" autocomplete="off" placeholder="Preferred Skills" required></textarea><br>
                        </div>

                        <div>
                            <span>Application Instructions</span>
                            <textarea name="instruction" id="instruction" cols="70" rows="6" autocomplete="off" placeholder="Application Instructions" required></textarea><br>
                        </div>

                        <div>
                            <span>Benefits (if applicable)</span>
                            <textarea name="benefits" id="benefits" cols="70" rows="6" autocomplete="off" placeholder="Benefits" required></textarea><br>
                        </div>

                        <div>
                            <span>Company Overview (brief)</span>
                            <textarea name="co-overview" id="co-overview" cols="70" rows="6" autocomplete="off" placeholder="Company Overview" required></textarea><br>
                        </div>

                        <input type="submit" name="submit" id="submit" value="Post Vacancy">
                        <!-- <button type="submit">Upload Article</button> -->
                    </form>
                </div>

                <div class="news-page manage-news" id="manage-news">
                    <h1>Manage News</h1>
                    <div class="news-list">

                        <?php
                        include("../../back_end/config.php");
                        $query = "SELECT * FROM vacancy;";

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
                                // echo '        <img src="../../back_end/images/event/' . $data[$i]['event_image'] . '" alt="" srcset="">';
                                echo '    </div>';
                                echo '    <div class="news-headline">';
                                echo '            <p>' . $data[$i]['job_title'] . '</p>';
                                // echo '        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, suscipit quaerat.</p>';
                                echo '        <div class="date">';
                                echo '<i class="fa-solid fa-calendar-days"></i>' . substr($data[$i]["deadline"], 0, 10);

                                // echo '            August 13, 2023';
                                echo '        </div>';
                                echo '    </div>';
                                echo '    <div class="control-btn">';
                                echo '        <button id = "applications' . $i . '" onclick="view_applications(' . $data[$i]['job_id'] . ')" class="applications">Applications</button>';
                                echo '        <button id = "edit_event' . $i . '" onclick="edit(' . $data[$i]['job_id'] . ')" class="edit">Edit</button>';
                                echo '        <button id = "delete_event' . $i . '" onclick="delete_event(' . $data[$i]['job_id'] . ')" class="delete">Delete</button>';
                                echo '    </div>';
                                // echo '<input type="hidden" value="' . $data[$i]['news_id'] . '" style="width:30px; display:none;"';
                                echo '</div>';
                            }
                        } else {
                            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No vacancy</h1><br><hr>";
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

        function view_applications(param) {
            // if (confirm("Are you sure you want to delete this news?")) {
            // window.location.href = '../../back_end/delete_news.php?news_id=' + param;
            window.location.href = 'vacancy_applications.php?job_id=' + param;
            // }
        }

        function delete_news(param) {
            if (confirm("Are you sure you want to delete this news?")) {
                window.location.href = '../../back_end/delete_news.php?news_id=' + param;
            }
        }

        function edit(param) {
            window.location.href = 'edit_items_vacancy.php?job_id_no=' + param;
        }
    </script>
</body>

</html>