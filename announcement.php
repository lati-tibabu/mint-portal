<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/announcement_style.css">
</head>

<body>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>

    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->
    <?php
    include("header.php");
    ?>
    <main>

    <div class="page announcements-page">
        <div class="page_name announcement-page-title">
            Announcements
        </div>
        <div class="latest announcements_content">

            <div class="announcement-category">
                <div class="announcement-type">
                    <p>Latest Announcements</p>
                </div>
                <div class="announcement latest-announcements-content">
                    <?php
                    include("../mint-portal/back_end/config.php");
                    $query = "SELECT * FROM announcements;";

                    $result = mysqli_query($con, $query);

                    $data = array();

                    $count = 0;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                            $count = $count + 1;
                        }
                    }

                    $latest_announcement_cutOff = 0;

                    if ($count != 0) {

                        for ($i = $count - 1; $i >= 0; $i--) {
                            echo '<div class="latest-announcement announcement-detail">';
                            echo '    <div class="latest-announcement announcement-title">';
                            echo $data[$i]['announcement_name'];
                            echo '    </div>';
                            echo '    <div class="latest-announcement announcement-date">';
                            echo  $data[$i]['announcement_date'];
                            echo '    </div>';
                            echo '    <div class="latest-announcement announcement-description">';
                            echo          $data[$i]['announcement_description'];
                            echo '    </div>';
                            echo '</div>';

                            $latest_announcement_cutOff++;

                            if ($latest_announcement_cutOff == 4) {
                                break;
                            }
                        }
                    } else {
                        echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Announcements</h1><br><hr>";
                    }
                    ?>
                    
                </div>
            </div>

            <?php
            if ($count > 4) {

                echo '<div class="see-all-announcements">';
                echo '    <button onclick="see_all_announcements()" id="see_all_announcements">See All Announcements</button>';
                echo '</div>';
            }
            ?>

            <!-- <div class="see-all-announcements">
                <button onclick="see_all_announcements()" id="see_all_announcements">See All Announcements</button>
            </div> -->

            <div class="all announcement-category" id="all-announcement">
                <div class="announcement-type">
                    <p>All Announcements</p>
                </div>
                <div class="announcement all-announcements-content">

                    <?php
                    include("../mint-portal/back_end/config.php");
                    $query = "SELECT * FROM announcements;";

                    $result = mysqli_query($con, $query);

                    $data = array();

                    $count = 0;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                            $count = $count + 1;
                        }
                    }

                    $latest_announcement_cutOff = 0;

                    if ($count != 0 and $count > 4) {

                        for ($i = $count - 1; $i >= 0; $i--) {
                            echo '<div class="latest-announcement announcement-detail">';
                            echo '    <div class="latest-announcement announcement-title">';
                            echo $data[$i]['announcement_name'];
                            echo '    </div>';
                            echo '    <div class="latest-announcement announcement-date">';
                            echo  $data[$i]['announcement_date'];
                            echo '    </div>';
                            echo '    <div class="latest-announcement announcement-description">';
                            echo          $data[$i]['announcement_description'];
                            echo '    </div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Announcements</h1><br><hr>";
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>

    </main>
    
    <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script>

    <script src="js/behavior.js"></script>


    <script>
        let announcement_shown = 0;


        function see_all_announcements() {

            const all_announcements = document.getElementById("all-announcement");
            var see_all_announcements_btn = document.getElementById("see_all_announcements");

            if (announcement_shown === 0) {
                all_announcements.style.display = "flex";
                see_all_announcements_btn.innerHTML = "Hide All Announcements";
                announcement_shown = 1
            } else {
                all_announcements.style.display = "none";
                see_all_announcements_btn.innerHTML = "See All Announcements";
                announcement_shown = 0
            }
        }
    </script>
</body>

</html>