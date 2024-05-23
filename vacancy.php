<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacancy</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/vacancy_styles.css">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <main>
        <div class="vacancy-section">
            <div class="main-title">
                Vacancy
            </div>
            <div class="content vacancy-content">
                <?php
                include("../mint-portal/back_end/config.php");
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

                $home_page_news_cutOff = 0;

                if ($count != 0) {

                    for ($i = $count - 1; $i >= 0; $i--) {
                        echo '<div class="card vacancy-card">';

                        echo '<div class="vacancy-card-info">';

                        echo '    <div class="job-title">';
                        echo '        <p><span>Job Title: </span>' . $data[$i]['job_title'] . '</p>';
                        echo '    </div>';

                        echo '    <div class="department">';
                        echo '        <p><span>Department/Division: </span>' . $data[$i]['department_division'] . '</p>';
                        echo '    </div>';

                        echo '    <div class="location">';
                        echo '        <p><span>Location: </span>' . $data[$i]['location'] . '</p>';
                        echo '    </div>';

                        echo '    <div class="deadline">';
                        echo '        <p><span>Application Deadline: </span>' . $data[$i]['deadline'] . '</p>';
                        echo '    </div>';

                        echo '    <div class="job-summary">';
                        echo '        <p><span>Job Summary: </span>' . $data[$i]['job_description'] . '</p>';
                        echo '    </div>';

                        echo '    <div class="days_left" >';
                        echo '        <p><span>Application Days Left: </span> <p class="days_left_place"></p> </p>';
                        echo '    </div>';

                        $date_parts = explode('-', $data[$i]['deadline']);

                        echo '    <div class="year" style="display: none;">';
                        echo intval($date_parts[0]);
                        echo '    </div>';

                        echo '    <div class="month" style="display: none;">';
                        echo intval($date_parts[1]);
                        echo '    </div>';

                        echo '    <div class="date" style="display: none;">';
                        echo intval($date_parts[2]);
                        echo '    </div>';

                        echo '    </div>';

                        echo '    <div class="apply-button">';
                        echo '            <button onclick="vacancy_detail(' . $data[$i]['job_id'] . ')">';
                        echo '                View and Apply';
                        echo '            </button>';
                        echo '    </div>';
                        echo '</div>';

                        // echo '<div class="news-part">';
                        // echo '    <div class="news-image">';
                        // echo '        <img class="newsImage" src="back_end/images/' . $data[$i]['news_image'] . '" onclick="show_news_detail(this)" alt="news-image" srcset="">';
                        // echo '    </div>';
                        // echo '    <div class="news-text">';
                        // echo '        <div class="headline" onclick="appear(this)">';
                        // echo '            <p>' . $data[$i]['news_headline'] . '</p>';
                        // echo '        </div>';
                        // echo '        <div class="news-detail" style="display: none;">';
                        // echo $data[$i]['news_detail'];
                        // echo '        </div>';
                        // echo '        <div class="news-published-day" id="news_date">';
                        // echo '<i class="fa-solid fa-calendar-days"></i>' . substr($data[$i]["news_date"], 0, 10);
                        // echo '        </div>';
                        // echo '    </div>';
                        // echo '</div>';

                        // $home_page_news_cutOff++;

                        // if ($current_file == "C:\wamp64\www\mint-portal\\home.php" && $home_page_news_cutOff == 4) {
                        //     break;
                        // }
                    }
                } else {
                    echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Vacancy Available</h1><br><hr>";
                }

                // echo $current_file;

                ?>
                <!-- <div class="card vacancy-card">
                    <div class="job-title">
                        <p><span>Job Title: </span>Senior Innovation Specialist</p>
                    </div>
                    <div class="department">
                        <p><span>Department/Division: </span>Senior Innovation Specialist</p>
                    </div>
                    <div class="location">
                        <p><span>Location: </span>Addis Ababa, Ethiopia</p>
                    </div>
                    <div class="deadline">
                        <p><span>Application Deadline: </span>September 15, 2023</p>
                    </div>
                    <div class="job-summary">
                        <p><span>Job Summary: </span>Seeking a dynamic and experienced Senior Innovation Specialist to
                            drive transformative projects and initiatives in the field of innovation and technology.</p>
                    </div>
                    <div class="apply-button">
                        <a href="vacancy_detail.html">
                            <button>
                                View and Apply
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card vacancy-card">
                    <div class="job-title">
                        <p><span>Job Title: </span>Data Scientist</p>
                    </div>
                    <div class="department">
                        <p><span>Department/Division: </span>Data Analytics</p>
                    </div>
                    <div class="location">
                        <p><span>Location: </span>San Francisco, CA, USA</p>
                    </div>
                    <div class="deadline">
                        <p><span>Application Deadline: </span>October 10, 2023</p>
                    </div>
                    <div class="job-summary">
                        <p><span>Job Summary: </span>Join our data analytics team as a Data Scientist to analyze and
                            interpret complex datasets to drive business insights.</p>
                    </div>
                    <div class="apply-button">
                        <a href="vacancy_detail.html">
                            <button>
                                View and Apply
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card vacancy-card">
                    <div class="job-title">
                        <p><span>Job Title: </span>Marketing Manager</p>
                    </div>
                    <div class="department">
                        <p><span>Department/Division: </span>Marketing</p>
                    </div>
                    <div class="location">
                        <p><span>Location: </span>New York, NY, USA</p>
                    </div>
                    <div class="deadline">
                        <p><span>Application Deadline: </span>September 30, 2023</p>
                    </div>
                    <div class="job-summary">
                        <p><span>Job Summary: </span>We're looking for a creative Marketing Manager to develop and
                            execute innovative marketing strategies for our products.</p>
                    </div>
                    <div class="apply-button">
                        <a href="vacancy_detail.html">
                            <button>
                                View and Apply
                            </button>
                        </a>
                    </div>
                </div>


                <div class="card vacancy-card">
                    <div class="job-title">
                        <p><span>Job Title: </span>Software Engineer</p>
                    </div>
                    <div class="department">
                        <p><span>Department/Division: </span>Engineering</p>
                    </div>
                    <div class="location">
                        <p><span>Location: </span>Seattle, WA, USA</p>
                    </div>
                    <div class="deadline">
                        <p><span>Application Deadline: </span>October 5, 2023</p>
                    </div>
                    <div class="job-summary">
                        <p><span>Job Summary: </span>Join our engineering team as a Software Engineer to design and
                            develop cutting-edge software solutions.</p>
                    </div>
                    <div class="apply-button">
                        <a href="vacancy_detail.html">
                            <button>
                                View and Apply
                            </button>
                        </a>
                    </div>
                </div>
 -->


            </div>
        </div>
    </main>

    <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script>


    <script src="js/behavior.js"></script>
    <script src="js/event_behavior.js"></script>

    <script>
        function vacancy_detail(param) {
            window.location.href = 'vacancy_detail.php?job_id=' + param;
        }

        function vacancy_expire() {
            var cards = document.querySelectorAll(".vacancy-card");
            cards.forEach(function(card) {

                var year = card.querySelector(".year");
                var month = card.querySelector(".month");
                var date = card.querySelector(".date");

                var _days_left = card.querySelector(".days_left_place");

                var current_date = new Date();

                var current_year = current_date.getFullYear();
                var current_month = current_date.getMonth() + 1;
                var current_date = current_date.getDate();

                var left_year_days = (parseInt(year.textContent) - parseInt(current_year)) * 365;
                var left_month_days = (parseInt(month.textContent) - parseInt(current_month)) * 30;
                var left_date_days = parseInt(date.textContent) - parseInt(current_date);

                var days_left = left_year_days + left_month_days + left_date_days;

                _days_left.textContent = days_left.toString();
            });

        }

        setInterval(vacancy_expire, 1000);
    </script>
</body>

</html>