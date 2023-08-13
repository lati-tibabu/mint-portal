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

    <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script>

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
                            <li>
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
                            </li>
                        </ul>
                        <button class="more-announcement">
                            <a href="announcement.html">See More...</a>
                        </button>
                    </div>
                </div>

                <div class="side-content-detail">
                    <div class="side-content-title">
                        Events
                    </div>
                    <div class="side-content-content">
                        <ul>
                            <li>
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
                            </li>
                        </ul>
                        <button class="more-announcement">
                            <a href="events.html">See More...</a>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- main body -->
        <div class="main2">

            <h1>
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


            <h1>
                Our Mission and Vision
            </h1>


            <div id="aboutPlaceholder"></div>
            <script src="js/aboutLoader.js"></script>


            <h1>
                News
            </h1>

            <?php
            include('news_content.php');
            ?>
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
</body>

</html>