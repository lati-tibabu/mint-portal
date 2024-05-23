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

    <?php
    include('header_2.php');
    ?>

    <?php
    include('human-resource-checker.php');
    ?>

    <?php
    // include("../../back_end/config.php");
    // $sector_query = "SELECT * FROM sector;";

    // $sector_result = mysqli_query($con, $sector_query);

    // $sector_data = array();

    // $sector_count = 0;

    // if (mysqli_num_rows($sector_result) > 0) {
    //     while ($row = mysqli_fetch_assoc($sector_result)) {
    //         $sector_data[] = $row;
    //         $sector_count = $sector_count + 1;
    //     }
    // }
    ?>


    <main id="main">
        <div class="container">
            <div class="header">
                <!-- <ul>
                    <li><a href="" onclick="post_news()">Post News</a></li>
                    <li><a href="" onclick="manage_news()">Manage News</a></li>
                </ul> -->
                <h1><i class="fa-regular fa-office"></i>Desks</h1>
                <div class="buttons">
                    <button onclick="post()" id="add-btn"></i><i class="fa-solid fa-plus"></i>Upload Desk</button>
                    <button onclick="manage()" id="manage-btn"><i class="fa-solid fa-gear"></i>Manage Desks</button>
                </div>
            </div>
            <!-- <div class="news-page post-news"> -->

            <!-- </div> -->


            <div class="main-news-page">
                <div class="news-page post-news" id="post-news">
                    <!-- <form method="get" class='sector-choose'>
                        <select name="sector_id" id="sector-id" required> -->
                            <!-- <option value="0">Select Sector</option> -->
                            <?php
                            // for ($i = $sector_count - 1; $i >= 0; $i--) {
                            //     echo '<option value="' . $sector_data[$i]['sector_id'] . '">' . $sector_data[$i]['sector_name'] . '</option>';
                            // }
                            ?>
                        <!-- </select>

                        <input type="submit" value="Choose Sector">
                    </form>

                    <hr class="section-divider"> -->

                    <?php
                    // $sector_id = $_GET['sector_id'];

                    // if ($sector_id == 0) {
                    //     $sector_id = 1;
                    // }

                    include("../../back_end/config.php");

                    // if ($sector_id != 0) {
                    // $sector_id = 1;
                    // }
                    $office_query = "SELECT * FROM office;";

                    $office_result = mysqli_query($con, $office_query);

                    $office_data = array();

                    $office_count = 0;

                    if (mysqli_num_rows($office_result) > 0) {
                        while ($row = mysqli_fetch_assoc($office_result)) {
                            $office_data[] = $row;
                            $office_count = $office_count + 1;
                        }
                    }

                    // $selected_sector = "none";
                    // }

                    // $sector_query2 = "SELECT * FROM sector where sector_id = $sector_id;";

                    // $sector_result2 = mysqli_query($con, $sector_query2);

                    // $sector_data2 = array();

                    // $sector_count2 = 0;

                    // if (mysqli_num_rows($sector_result2) > 0) {
                    //     while ($row = mysqli_fetch_assoc($sector_result2)) {
                    //         $sector_data2[] = $row;
                    //         $sector_count2 = $sector_count2 + 1;
                    //     }
                    // }
                    // }

                    ?>

                    <!-- <span>Add Desk into <strong> <?php echo $sector_data2[0]['sector_name']; ?> </strong> sector.</span>

                    <hr class="section-divider"> -->

                    <form action="../../../mint-portal/back_end/desk-post.php" method="post" enctype="multipart/form-data">
                        <div>
                            <span>Desk Name</span>
                            <input name="desk-name" class="headline" type="text" placeholder="Desk Name" required><br>
                        </div>

                        <div>
                            <span>Desk Description</span>
                            <textarea name="desk-description" id="desk-description" cols="70" rows="6" autocomplete="off" placeholder="Desk Description" required></textarea><br>
                        </div>

                        <!-- <div>
                            <span>Sector ID</span>
                            <input name="sector-id" class="headline" type="text" placeholder="sector id" value="<?php echo $sector_id; ?>" readonly><br>
                        </div> -->

                        <div>
                            <span>Desk Office</span>
                            <!-- <input type="file" id="image" name="image" accept="image/*" class="image-input" required> -->
                            <select name="desk-office" id="desk-office">
                                <option value="0">Select Office</option>
                                
                                <?php
                                for ($i = $office_count - 1; $i >= 0; $i--) {
                                    echo '<option value="' . $office_data[$i]['office_id'] . '">' . $office_data[$i]['office_name'] . '</option>';
                                }
                                ?>

                            </select>
                        </div>

                        <!-- <img id="preview" src="#" alt="Selected Photo" style="max-width: 300px; display: none;"> -->

                        <input type="submit" name="submit" id="submit" value="Add Desk">
                        <!-- <button type="submit">Upload Article</button> -->
                    </form>
                </div>

                <div class="news-page manage-news" id="manage-news">
                    <h1>Manage Desks</h1>
                    <div class="news-list">

                        <?php
                        include("../../back_end/config.php");
                        $query = "SELECT * FROM desk;";

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
                                echo '            <p>' . $data[$i]['desk_name'] . '</p>';
                                // echo '        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, suscipit quaerat.</p>';
                                echo '        <div class="date">';
                                echo  $data[$i]["desk_description"];

                                // echo '            August 13, 2023';
                                echo '        </div>';
                                echo '    </div>';
                                echo '    <div class="control-btn">';
                                echo '        <button id = "edit_news' . $i . '" onclick="edit(' . $data[$i]['desk_id'] . ')" class="edit">Edit</button>';
                                echo '        <button id = "delete_news' . $i . '" onclick="delete_news(' . $data[$i]['desk_id'] . ')" class="delete">Delete</button>';
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
        let sector_id = document.getElementById('sector-id');

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
            if (confirm("Are you sure you want to delete this Desk?")) {
                window.location.href = '../../back_end/delete_desk.php?desk_id=' + param;
            }
        }

        function edit(param) {
            window.location.href = 'edit_items_desk.php?desk_id_no=' + param;
        }
    </script>
</body>

</html>