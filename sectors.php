<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sectors</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/sector_styles.css">
</head>

<body>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>

    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->
    <?php
    include("header.php");
    ?>

    <?php
    include("../mint-portal/back_end/config.php");
    $sector_id = $_GET['sector_id'];

    $query = "SELECT * FROM sector where sector_id = $sector_id;";
    $query2 = "SELECT * FROM office where sector_id = $sector_id;";

    $result = mysqli_query($con, $query);
    $result2 = mysqli_query($con, $query2);

    $sector_data = array();
    $office_data = array();

    $count = 0;
    $count2 = 0;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sector_data[] = $row;
            $count = $count + 1;
        }
    }

    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $office_data[] = $row;
            $count2 = $count2 + 1;
        }
    }

    ?>

    <div class="page">
        <div class="page_name">
            Sector
        </div>

        <!-- <div class="dark-light" id="dark-light" onclick="darklight()">
            <i class="fa-solid fa-moon"></i>
        </div>

        <script defer>
            function darklight() {
                // Select all elements with the class "page"
                const elements = document.querySelectorAll(".page");
                // Select the icon element
                const icon = document.getElementById("dark-light");

                // Initialize a variable to track the dark mode state
                let dark = 0;

                // Check the current state
                if (dark === 0) {
                    // Switch to dark mode
                    elements.forEach(element => {
                        element.style.background = "black";
                        element.style.color = "white";
                    });
                    // Change the icon to indicate light mode
                    icon.innerHTML = `<i class="fa-solid fa-sun"></i>`;
                    // Update the state variable
                    dark = 1;
                } else {
                    // Switch back to light mode (you can define your light mode styles here)
                    elements.forEach(element => {
                        element.style.background = ""; // Reset background
                        element.style.color = ""; // Reset text color
                    });
                    // Change the icon to indicate dark mode
                    icon.innerHTML = `<i class="fa-solid fa-moon"></i>`;
                    // Update the state variable
                    dark = 0;
                }
            }
        </script> -->

        <div class="office-page">
            <div class="page-subname">
                <!-- Minister Office -->
                <?php echo $sector_data[0]['sector_name']; ?>
            </div>

            <div class="description-section">
                <div class="description-box">
                    <div class="sector-info">
                        <div class="sector-image-section">
                            <img class="sector-image" src="../mint-portal/back_end/sector_images/<?php echo $sector_data[0]['sector_image']; ?>" alt="" srcset="">
                        </div>
                        <p><?php echo $sector_data[0]['description']; ?></p>

                    </div>
                    <!--  -->
                </div>
                <div class="office-section">
                    <h2>Offices</h2>
                    <div class="offices-list">

                        <?php

                        for ($i = $count2 - 1; $i >= 0; $i--) {
                            echo '<div class="office-detail" onclick="view_office(' . $office_data[$i]['office_id'] . ')">';

                            echo '<div class="office-name">';

                            echo '<p>' . $office_data[$i]['office_name'] . '</p>';

                            echo '<div id="expand-icon' . $office_data[$i]['office_id'] . '">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">';
                            echo '<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />';
                            echo '</svg>';
                            echo '</div>';

                            echo '</div>';

                            echo '<div class="office-description" id="office-description' . $office_data[$i]['office_id'] . '">';
                            echo '<p>' . $office_data[$i]['description'] . '</p>';
                            echo '</div>';

                            echo '</div>';

                            echo '<div class="desk-lists" id="desk-list' . $office_data[$i]['office_id'] . '">';

                            $query3 = "SELECT * FROM desk where office_id = " . $office_data[$i]['office_id'] . ";";
                            $result3 = mysqli_query($con, $query3);

                            $desk_data = array();

                            $count3 = 0;

                            if (mysqli_num_rows($result3) > 0) {
                                while ($row = mysqli_fetch_assoc($result3)) {
                                    $desk_data[] = $row;
                                    $count3 = $count3 + 1;
                                }
                            }

                            echo '<h4>Desks</h4>';
                            echo '<hr class="office-desk-horizontalbar">';
                            echo '<div class="desks">';
                            echo '<ul>';
                            for ($j = $count3 - 1; $j >= 0; $j--) {
                                echo '<li onclick =" view_desk(' . $desk_data[$j]['desk_id'] . ')">';
                                echo '<p>' . $desk_data[$j]["desk_name"] . '</p>';

                                echo '<div id="expand-desk-icon' . $desk_data[$j]['desk_id'] . '">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">';
                                echo '<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />';
                                echo '</svg>';
                                echo '</div>';

                                echo '</li>';

                                $query4 = "SELECT * FROM personnel where desk_id = " . $desk_data[$j]['desk_id'] . ";";
                                $result4 = mysqli_query($con, $query4);

                                $personnel_data = array();

                                $count4 = 0;

                                if (mysqli_num_rows($result4) > 0) {
                                    while ($row = mysqli_fetch_assoc($result4)) {
                                        $personnel_data[] = $row;
                                        $count4 = $count4 + 1;
                                    }
                                }
                                echo '<div class="subpage-contents-detail personnel-list" id="personnel-list' . $desk_data[$j]['desk_id'] . '">';

                                for ($k = $count4 - 1; $k >= 0; $k--) {
                                    echo '<div class="horizontal-card">';
                                    echo '    <div class="card-image">';
                                    echo '        <img src="back_end/personnel_images/' . $personnel_data[$k]['personnel_image'] . '" alt="' . $personnel_data[$k]['name'] . " image" . '" srcset="">';
                                    echo '    </div>';
                                    echo '    <div class="card-content">';
                                    echo '        <div class="card-content-detail">';
                                    echo '            <label for="name">Name: </label>';
                                    echo '            <span id="name">' . $personnel_data[$k]['name'] . '</span>';
                                    echo '        </div>';
                                    echo '        <div class="card-content-detail">';
                                    echo '            <label for="job-title">Job Title: </label>';
                                    echo '            <span id="job-title">' . $personnel_data[$k]['job_title'] . '</span>';
                                    echo '        </div>';
                                    echo '        <div class="card-content-detail">';
                                    echo '            <label for="department">Department: </label>';
                                    echo '            <span id="department">' . $personnel_data[$k]['department'] . '</span>';
                                    echo '        </div>';
                                    echo '    </div>';
                                    echo '</div>';
                                }

                                echo '</div>';
                            }

                            echo '</ul>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>



                    </div>


                </div>
            </div>

            <div class="news-sector">
                <div class="news_title">
                    <?php echo $sector_data[0]['sector_name']; ?> related News.
                </div>
                <hr class="news-sector-bar">
                <div class="sector-news-content">

                    <?php

                    include("../mint-portal/back_end/config.php");
                    $news_query = "SELECT * FROM news where sector_id = " . $sector_data[0]['sector_id'] . ";";

                    $news_result = mysqli_query($con, $news_query);

                    $news_data = array();

                    $news_count = 0;

                    if (mysqli_num_rows($news_result) > 0) {
                        while ($row = mysqli_fetch_assoc($news_result)) {
                            $news_data[] = $row;
                            $news_count = $news_count + 1;
                        }
                    }
                    for ($i = $news_count - 1; $i >= 0; $i--) {

                        echo '<div class="news-part">';
                        echo '    <div class="news-image">';
                        echo '        <img class="newsImage" src="back_end/images/' . $news_data[$i]['news_image'] . '" alt="news-image" srcset="">';
                        echo '    </div>';
                        echo '    <div class="news-text">';
                        echo '        <div class="sector_news_headline" onclick="detail_news(' . $news_data[$i]['news_id'] . ')">';
                        echo '            <p>' . $news_data[$i]['news_headline'] . '</p>';
                        echo '        </div>';
                        echo '        <div class="news-published-day" id="news_date">';
                        echo '<i class="fa-solid fa-calendar"></i>';
                        echo '<p>' . substr($news_data[$i]["news_date"], 0, 10) . '</p>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script> -->

    <?php
    include('footer.php');
    ?>

    <script src="js/behavior.js"></script>

    <script>
        let expanded = 0;

        function view_office(params) {
            // window.location.href = 'offices.php?office_id=' + params;
            var desk_lists = document.querySelectorAll(".desk-lists");

            var desk_office = document.getElementById("desk-list" + params);
            var expand_icon = document.getElementById("expand-icon" + params);
            var office_description = document.getElementById("office-description" + params);

            if (expanded === 0) {
                // desk_lists.style.display = "none";
                desk_office.style.display = "flex";
                expand_icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg>`;
                office_description.style.display = "flex";

                expanded = 1;
            } else {
                desk_office.style.display = "none"
                expand_icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>`;
                office_description.style.display = "none";

                expanded = 0;
            }
        }

        let personnel_expanded = 0;

        function view_desk(params) {
            // window.location.href = 'desk.php?desk_id=' + params;

            var personnel_list = document.getElementById("personnel-list" + params);
            var expand_desk_icon = document.getElementById("expand-desk-icon" + params);


            if (personnel_expanded === 0) {
                personnel_list.style.display = "flex";
                expand_desk_icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg>`;
                personnel_expanded = 1;
            } else {
                personnel_list.style.display = "none";
                expand_desk_icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>`;
                personnel_expanded = 0;
            }
        }

        function detail_news(params) {
            // if (confirm("Are you sure you want to delete this application?")) {
            window.location.href = 'news_detail.php?news_id=' + params;
            // }
        }
    </script>
</body>

</html>