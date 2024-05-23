<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ministry Of Innovation and Technology</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous"></script>

    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->
    <?php
    include('header.php');
    ?>

    <!-- 
    <div class="page_nav">
        <p>Home</p>
    </div>
     -->

    <section class="hero">
        <div class="outer-circle">
            <!-- <div class="middle-circle">
                <div class="inner-circle"></div>
            </div> -->
        </div>

        <div class="innovate">
            <div class="text">
                Innovate!
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
                            $query = "SELECT * FROM announcements   ;";

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


                            <!-- <li>
                                <i class="fa-solid fa-play"></i>
                                <p>
                                    Introduction to Artificial Intelligence and Machine Learning.
                                </p>
                            </li>
                            <li>
                                <i class="fa-solid fa-play"></i>
                                <p>
                                    The Future of Robotics and Automation in Industries.
                                </p>
                            </li>
                            <li>
                                <i class="fa-solid fa-play"></i>
                                <p>
                                    Blockchain: Revolutionizing the Finance Sector.
                                </p>
                            </li>
                            <li>
                                <i class="fa-solid fa-play"></i>
                                <p>
                                    Augmented Reality and its Applications in Education.
                                </p>
                            </li> -->
                        </ul>
                        <button class="more-announcement">
                            <a href="announcement.php">See More...</a>
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

                            <!-- <li>
                                <i class="fa-solid fa-play"></i>
                                <p>
                                    Cybersecurity: Protecting Your Data and Privacy.
                                </p>
                            </li>
                            <li>
                                <i class="fa-solid fa-play"></i>
                                <p>
                                    Internet of Things (IoT): Connecting the World Around Us.
                                </p>
                            </li>
                            <li>
                                <i class="fa-solid fa-play"></i>
                                <p>
                                    Green Technology: Sustainable Innovations for a Better Future.
                                </p>
                            </li>
                            <li>
                                <i class="fa-solid fa-play"></i>
                                <p>
                                    The Rise of 5G Technology and its Implications.
                                </p>
                            </li> -->

                        </ul>
                        <button class="more-announcement">
                            <a href="events.php">See More...</a>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- main body -->
        <div class="main2">

            <!-- <h1>
                Officials
            </h1>

            <div class="officials">

                <div class="department-personals2">
                    <div class="personal-photo2">
                        <img src="https://www.intgovforum.org/sites/default/files/2022-10/miniser-belete-mola-1-768x651.jpg"
                            alt="" srcset="">
                    </div>
                    <div class="personal-info2">
                        <div class="personal-name2">
                            H.E. Dr. Belete Molla
                        </div>
                        <div class="personal-role2">
                            Minister of Innovation and Technology
                            <hr>
                        </div>
                        <div class="personal-detail2">
                            H.E. Dr. Belete Molla is Minister of Innovation and Technology of the Federal Democratic
                            Republic of Ethiopia.
                        </div>
                    </div>
                </div>
                <div class="department-personals2">
                    <div class="personal-photo2">
                        <img src="https://media.licdn.com/dms/image/C4E03AQFE1udI0SxwmA/profile-displayphoto-shrink_800_800/0/1635241724688?e=1697068800&v=beta&t=RaPy4JItnubgRmGk0kcKgkivMbcGJC6Y-j-uWD3Idzw"
                            alt="" srcset="">
                    </div>
                    <div class="personal-info2">
                        <div class="personal-name2">
                            Huria Ali
                        </div>
                        <div class="personal-role2">
                            State Minister at Ministry of innovation and technology
                            <hr>
                        </div>
                        <div class="personal-detail2">
                            State Minister at Ministry of innovation and technology.
                        </div>
                    </div>
                </div>
            </div>

                        -->
            <h1>
                Our Mission and Vision
            </h1>


            <!-- <div id="aboutPlaceholder"></div>
            <script src="js/aboutLoader.js"></script> -->

            <?php
            include('mvv.php');
            ?>

            <div class="home-page-news">
                <div class="news-title-name">
                    <h1>News</h1>
                </div>

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

            <!-- <div class="officials">

                <div class="department-personals2">
                    <div class="personal-photo2">
                        <img src="https://www.intgovforum.org/sites/default/files/2022-10/miniser-belete-mola-1-768x651.jpg"
                            alt="" srcset="">
                    </div>
                    <div class="personal-info2">
                        <div class="personal-name2">
                            H.E. Dr. Belete Molla
                        </div>
                        <div class="personal-role2">
                            Minister of Innovation and Technology
                            <hr>
                        </div>
                        <div class="personal-detail2">
                            H.E. Dr. Belete Molla is Minister of Innovation and Technology of the Federal Democratic
                            Republic of Ethiopia.
                        </div>
                    </div>
                </div>
                <div class="department-personals2">
                    <div class="personal-photo2">
                        <img src="https://media.licdn.com/dms/image/C4E03AQFE1udI0SxwmA/profile-displayphoto-shrink_800_800/0/1635241724688?e=1697068800&v=beta&t=RaPy4JItnubgRmGk0kcKgkivMbcGJC6Y-j-uWD3Idzw"
                            alt="" srcset="">
                    </div>
                    <div class="personal-info2">
                        <div class="personal-name2">
                            Huria Ali
                        </div>
                        <div class="personal-role2">
                            State Minister at Ministry of innovation and technology
                            <hr>
                        </div>
                        <div class="personal-detail2">
                            State Minister at Ministry of innovation and technology.
                        </div>
                    </div>
                </div>
            </div> -->

        </div>


        <!-- right bar -->
        <!-- <div class="main3"></div> -->
    </main>

    <!-- footer part the site -->

    <div id="footerPlaceholder"></div>
    <script src="js/footer.js"></script>

    <script src="js/news.js"></script>
    <script src="js/about_scroll.js"></script>
    <script src="js/behavior.js"></script>
    <!-- <script src="js/menu_resp_behavior.js"></script> -->
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>