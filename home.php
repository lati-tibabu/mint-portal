<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ministry Of Innovation and Technology</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>

    <?php
    include('header.php');
    ?>

    <section class="hero" id="hero">
        <?php

        include("../mint-portal/back_end/config.php");
        $query = "SELECT * FROM hero_image ORDER BY priority DESC;";

        $result = mysqli_query($con, $query);

        $data = array();

        $current_file_event = __FILE__;
        $count = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
                $count = $count + 1;
            }
        }

        ?>

        <div class="outer-circle">
        </div>
        <div id="hero_image_link" style="display: none;">
            <?php
            echo $data[0]['image_link'];
            ?>
        </div>

        <div class="innovate">
            <div class="text">
                <?php
                if ($count != 0) {
                    echo $data[0]['hero_text'];
                } else {
                    echo "Innovate";
                }
                ?>
            </div>
        </div>
        <script src="js/anima.js"></script>
        <!-- <script src="js/bg_slider.js"></script> -->
    </section>

    <!-- The following is the content of main -->
    <main>
        <!-- side bar -->
        <div class="side-main">
            <div class="title">
                <h1>M<span>in</span>T</h1>
            </div>
            <div class="side-content">
                <div class="side-content-detail">
                    <div class="side-content-title">
                        Announcements
                    </div>
                    <div class="side-content-content">
                        <ul>

                            <?php

                            include("../mint-portal/back_end/config.php");
                            $query = "SELECT * FROM announcements ;";

                            $result = mysqli_query($con, $query);

                            $data = array();

                            $current_file_event = __FILE__;
                            $count = 0;

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                    $count = $count + 1;
                                }
                            }

                            $home_page_announcement_cutOff = 0;

                            if ($count != 0) {

                                for ($i = $count - 1; $i >= 0; $i--) {

                                    echo '<li>';
                                    echo '<i class="fa-solid fa-play"></i>';
                                    echo '            <p>' . $data[$i]['announcement_name'] . '</p>';
                                    echo '</li>';


                                    $home_page_announcement_cutOff++;

                                    if ($current_file_event == "C:\wamp64\www\mint-portal\\home.php" && $home_page_announcement_cutOff == 6) {
                                        break;
                                    }
                                }
                            } else {
                                echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Events</h1><br><hr>";
                            }

                            // echo $current_file;

                            ?>

                        </ul>
                        <button class="more-announcement">
                            <a href="announcement.php">More</a>
                        </button>
                    </div>
                </div>

                <div class="side-content-detail">
                    <div class="side-content-title">
                        Events
                    </div>
                    <div class="side-content-content">
                        <ul>

                            <?php

                            include("../mint-portal/back_end/config.php");
                            $query = "SELECT * FROM event;";

                            $result = mysqli_query($con, $query);

                            $data = array();

                            $current_file_event = __FILE__;
                            $count = 0;

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                    $count = $count + 1;
                                }
                            }

                            $home_page_news_cutOff = 0;

                            if ($count != 0) {

                                for ($i = $count - 1; $i >= 0; $i--) {

                                    echo '<li>';
                                    echo '<i class="fa-solid fa-play"></i>';
                                    echo '            <p>' . $data[$i]['event_name'] . '</p>';
                                    echo '</li>';


                                    $home_page_news_cutOff++;

                                    if ($current_file_event == "C:\wamp64\www\mint-portal\\home.php" && $home_page_news_cutOff == 6) {
                                        break;
                                    }
                                }
                            } else {
                                echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Events</h1><br><hr>";
                            }

                            // echo $current_file;

                            ?>

                        </ul>
                        <button class="more-announcement">
                            <a href="events.php">More</a>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- main body -->
        <div class="main2">

            <div class="ministry-history homepage-main-section">
                <div class="ministry-name">
                    Ministry of Innovation and Technology
                </div>
                <div class="history-content">
                    <div class="ministry-history-timeline">

                        <?php
                        include("../mint-portal/back_end/config.php");
                        $query = "SELECT * FROM mint_history ORDER BY history_year ASC;";

                        $result = mysqli_query($con, $query);

                        $data = array();

                        $count = 0;

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $data[] = $row;
                                $count = $count + 1;
                            }
                        }

                        $hist_count = 0;
                        $history_threashold = 2;

                        if ($count != 0) {
                            for ($i = $count - 1; $i >= 0; $i--) {


                                echo '<div class="history-content">';
                                echo '    <div class="history-year">';
                                echo $data[$i]["history_year"];
                                echo '    </div>';
                                echo '    <div class="history-content-text">';
                                echo $data[$i]["history_event"];
                                echo '    </div>';
                                echo '</div>';

                                // if ($hist_count == $history_threashold-1) {
                                //     break;
                                // }
                                $hist_count++;
                            }
                        }

                        ?>


                    </div>

                </div>
            </div>
            <?php
            // if ($count > $history_threashold) {
            //     echo "<button class='custom-button'>More Historical Event</button>";
            // }
            ?>

            <div class="mission-vision-section homepage-main-section">
                <div class="section-name">
                    Our Mission and Vision
                </div>

                <?php
                include('mvv.php');
                ?>
            </div>

            <div class="home-page-news homepage-main-section">

                <div class="recent-news">
                    <div class="recent-news-title">
                        Recent News
                    </div>
                    <?php
                    $current_file = __FILE__;
                    include('news_content.php');
                    ?>
                    <div class="more-news">
                        <button>
                            <a href="news.php" target="_blank">More News</a>
                        </button>
                    </div>
                </div>
            </div>


            <div class="featured-events homepage-main-section">
                <div class="section-name">
                    Featured Event
                </div>
                <div class="featured-event-content">


                    <?php

                    include("../mint-portal/back_end/config.php");

                    $query = "SELECT * FROM event where event_is_featured = '1' and event_is_published = '1';";

                    $result = mysqli_query($con, $query);

                    $data = array();

                    $count = 0;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                            $count = $count + 1;
                        }
                    }
                    for ($i = $count - 1; $i >= 0; $i--) {

                        echo '<div class="featured-event-card">';
                        echo '    <div class="featured-event-image">';
                        echo '        <img src="back_end/images/event/' . $data[$i]['event_image'] . '" alt="event image">';
                        echo '    </div>';
                        echo '    <div class="featured-event-name">';
                        echo '        <h3>';
                        echo             $data[$i]['event_name'];
                        echo '        </h3>';
                        echo '    </div>';

                        echo "<div class='event_date'>";
                        $event_happen_date = substr($data[$i]["event_happen_date"], 0, 10);
                        $event_happen_time = $data[$i]["event_happen_time"];

                        $date_parts = explode('-', $event_happen_date);
                        $time_parts = explode(':', $event_happen_time);

                        echo "<div class='event_year' style='display:none;'>" . intval($date_parts[0]) . "</div>";
                        echo "<div class='event_month' style='display:none;'>" . intval($date_parts[1]) . "</div>";
                        echo "<div class='event_day' style='display:none;'>" . intval($date_parts[2]) . "</div>";
                        echo "<div class='event_hour' style='display:none;'>" . intval($time_parts[0]) . "</div>";
                        echo "<div class='event_minute' style='display:none;'>" . intval($time_parts[1]) . "</div>";


                        echo '    <div class="featured-event-countdown">';
                        echo '        <div class="countdown-section">';
                        echo '            <span class="countdown-week"></span>';
                        echo '            <div class="countdown-section-name">Weeks</div>';
                        echo '        </div>';
                        echo '        <div class="countdown-section">';
                        echo '            <span class="countdown-day"></span>';
                        echo '            <div class="countdown-section-name">Days</div>';
                        echo '        </div>';
                        echo '        <div class="countdown-section">';
                        echo '            <span class="countdown-hour"></span>';
                        echo '            <div class="countdown-section-name">Hour</div>';
                        echo '        </div>';
                        echo '        <div class="countdown-section">';
                        echo '            <span class="countdown-minute"></span>';
                        echo '            <div class="countdown-section-name">Minutes</div>';
                        echo '        </div>';
                        echo '        <div class="countdown-section">';
                        echo '            <span class="countdown-second"></span>';
                        echo '            <div class="countdown-section-name">Seconds</div>';
                        echo '        </div>';
                        echo '    </div>';
                        echo "</div>";
                        echo '</div>';
                    }

                    mysqli_close($con);

                    ?>


                    <!-- <div class="featured-event-card">
                        <div class="featured-event-image">
                            <img src="https://img.freepik.com/free-photo/image-by-rawpixel-com_53876-165282.jpg?w=740&t=st=1694238064~exp=1694238664~hmac=d2f679c0d0bf6449ab9bd71c874cdfed8a07b13ed5f45f938e4e40030d9f950e" alt="event image">
                        </div>
                        <div class="featured-event-name">
                            <h3>
                                AI Summit: Future of Artificial Intelligence
                            </h3>
                        </div>
                        <div class="featured-event-countdown">
                            <div class="countdown-section">
                                <span>5</span>
                                <div class="countdown-section-name">Weeks</div>
                            </div>
                            <div class="countdown-section">
                                <span>4</span>
                                <div class="countdown-section-name">Days</div>
                            </div>
                            <div class="countdown-section">
                                <span>15</span>
                                <div class="countdown-section-name">Hour</div>
                            </div>
                            <div class="countdown-section">
                                <span>25</span>
                                <div class="countdown-section-name">Minutes</div>
                            </div>
                        </div>
                    </div>
                -->
                </div>

                <div class="scroll-horizontally">
                    <i class="fa-solid fa-arrow-right pulse">Scroll</i>
                </div>

            </div>


            <div class="map-address homepage-main-section">
                <div class="section-name">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Map & Location</span>
                </div>
                <div class="location-address">
                    Tewdros Square, Addis Ababa
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2141.9419244300875!2d38.75523567816246!3d9.023560701757207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b85edaa8b8edb%3A0x2dc416a9b5ac4ac4!2z4Yuo4Yqi4YqW4Yms4Yi94YqVIOGKpeGKkyDhibThiq3hipbhiI7hjIIg4Yia4YqS4Yi14Ym04Yit!5e0!3m2!1sam!2set!4v1694158297286!5m2!1sam!2set" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>


        <!-- right bar -->
        <!-- <div class="main3"></div> -->
    </main>

    <!-- footer part the site -->

    <?php
    include('footer.php');
    ?>

    <script src="js/news.js"></script>
    <script src="js/about_scroll.js"></script>
    <script src="js/behavior.js"></script>

    <script>
        // Get all elements with the class 'card'
        function countdown() {

            var cards = document.querySelectorAll('.event_date');

            cards.forEach(function(card) {
                var eventYearField = card.querySelector('.event_year');
                var eventMonthField = card.querySelector('.event_month');
                var eventDayField = card.querySelector('.event_day');
                var eventHourField = card.querySelector('.event_hour');
                var eventMinuteField = card.querySelector('.event_minute');

                var leftWeekField = card.querySelector('.countdown-week');
                var leftDayField = card.querySelector('.countdown-day');
                var leftHourField = card.querySelector('.countdown-hour');
                var leftMinuteField = card.querySelector('.countdown-minute');
                var leftSecondField = card.querySelector('.countdown-second');

                var currentDate = new Date();

                var year = currentDate.getFullYear();
                var month = currentDate.getMonth() + 1;
                var day = currentDate.getDate();
                var hour = currentDate.getHours();
                var minute = currentDate.getMinutes();

                var second = currentDate.getSeconds();
                second = 59 - second;

                var eventYear = parseInt(eventYearField.textContent);
                var eventMonth = parseInt(eventMonthField.textContent);
                var eventDay = parseInt(eventDayField.textContent);
                var eventHour = parseInt(eventHourField.textContent);
                var eventMinute = parseInt(eventMinuteField.textContent);

                var leftYear_minute = (eventYear - year) * 525600;
                var leftMonth_minute = (eventMonth - month) * 43200;
                var leftDay_minute = (eventDay - day) * 1440;
                var leftHour_minute = (eventHour - hour) * 60;
                var leftMinute_minute = eventMinute - minute;

                var totalMinute_left = leftYear_minute + leftMonth_minute + leftDay_minute + leftHour_minute + leftMinute_minute;
                var totalSecond_left = totalMinute_left * 60;

                if (totalSecond_left > 0) {

                    var totalWeek = Math.floor(totalSecond_left / 604800);
                    totalSecond_left -= totalWeek * 604800;

                    var totalDay = Math.floor(totalSecond_left / 86400);
                    totalSecond_left -= totalDay * 86400;

                    var totalHour = Math.floor(totalSecond_left / 3600);
                    totalSecond_left -= totalHour * 3600;

                    var totalMinute = Math.floor(totalSecond_left / 60);
                    totalSecond_left -= totalMinute * 60;

                    // if (totalMinute > 0) {
                    leftWeekField.innerHTML = totalWeek;
                    leftDayField.innerHTML = totalDay;
                    leftHourField.innerHTML = totalHour;
                    leftMinuteField.innerHTML = totalMinute;
                    leftSecondField.innerHTML = second;
                } else {
                    leftWeekField.innerHTML = 0;
                    leftDayField.innerHTML = 0;
                    leftHourField.innerHTML = 0;
                    leftMinuteField.innerHTML = 0;
                    leftSecondField.innerHTML = 0;
                }
            });


        }

        setInterval(countdown, 1000);


        var hero = document.getElementById("hero");
        var hero_image_link = document.getElementById("hero_image_link");

        let image_link = hero_image_link.textContent;

        hero.style.background = `url(${image_link}), linear-gradient(45deg, #124a5eff 0%, #e6953cff 50%)`;

        hero.style.backgroundAttachment = "fixed";
        hero.style.backgroundSize = "cover";
    </script>
</body>

</html>

