<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="style/style.css">
    <!-- <link rel="stylesheet" href="s"> -->
    <link rel="stylesheet" href="style/news_styles.css">

    <style>
        .news {
            padding-top: 30vh;
        }
    </style>
    <script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
</head>

<body>
    <!-- <a href="/back_end/config.php"></a> -->
    <!-- <a href="../mint-portal/back_end/config.php"></a> -->
    <!-- <div id="placeHolderHeader"></div>
    <script src="js/header.js"></script> -->

    <?php
    include("header.php");
    ?>


    <main class="newssection">
        <!-- <div class="side-content">

        </div> -->
        <div class="main2">
            <!-- <div class="news">
            
                <div class="news-content">
            
                    <div class="news-part">
                        <div class="news-image">
                            <img class="newsImage" src="images/mint_bg1.jpg" onclick="show_news_detail(this)" alt="news-image"
                                srcset="">
                        </div>
                        <div class="news-text">
                            <div class="headline" onclick="appear(this)">
                                <p>New AI Suit Sparks Breakthrough in Spinal Cord Injury Rehabilitation</p>
                            </div>
                            <div class="news-detail" style="display: none;">
                                A team of researchers at Florida Atlantic University (FAU) have developed a new AI suit
                                that could revolutionize the way spinal cord injury rehabilitation is conducted. The
                                suit, called the "ReWalk" suit, uses artificial intelligence to help patients regain
                                movement in their legs.
                            </div>
                            <div class="news-published-day" id="news_date">
                                Jul 20, 2023
                            </div>
                        </div>
                    </div>
            
                    <div class="news-part">
                        <div class="news-image">
                            <img class="newsImage"
                                src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=872&q=80"
                                onclick="show_news_detail(this)" alt="news-image" srcset="">
                        </div>
                        <div class="news-text">
                            <div class="headline" onclick="appear(this)">
                                <p>New AI Suit Sparks Breakthrough in Spinal Cord Injury Rehabilitation</p>
                            </div>
                            <div class="news-detail" style="display: none;">
                                A team of researchers at Florida Atlantic University (FAU) have developed a new AI suit
                                that could revolutionize the way spinal cord injury rehabilitation is conducted. The
                                suit, called the "ReWalk" suit, uses artificial intelligence to help patients regain
                                movement in their legs.
                            </div>
                            <div class="news-published-day" id="news_date">
                                Jul 20, 2023
                            </div>
                        </div>
                    </div>
            
                    <div class="news-part">
                        <div class="news-image">
                            <img class="newsImage"
                                src="https://images.unsplash.com/photo-1462331940025-496dfbfc7564?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1822&q=80"
                                onclick="show_news_detail(this)" alt="news-image">
                        </div>
                        <div class="news-text">
                            <div class="headline" onclick="appear(this)">
                                <p>Ethiopia's Ministry of Innovation Launches Tech Incubation Program</p>
                            </div>
                            <div class="news-detail">
                                Addis Ababa - Ethiopia's Ministry of Innovation and Technology announced the launch of a
                                new tech incubation program aimed at supporting local startups and fostering innovation
                                in the tech sector. The program will provide mentoring, funding, and access to resources
                                for aspiring entrepreneurs.
                            </div>
                            <div class="news-published-day" id="news_date">
                                Jul 15, 2023
                            </div>
                        </div>
                    </div>
            
                    <div class="news-part">
                        <div class="news-image">
                            <img class="newsImage" src="images/news3.jpg" onclick="show_news_detail(this)" alt="news-image" srcset="">
                        </div>
                        <div class="news-text">
                            <div class="headline" onclick="appear(this)">
                                <p>Scientists Discover New Species of Bioluminescent Marine Life in Unexplored Ocean Depths</p>
                            </div>
                            <div class="news-detail" style="display: none;">
                                A recent deep-sea expedition has revealed a stunning variety of bioluminescent creatures residing in the mysterious depths of the ocean. This discovery sheds light on the biodiversity of previously uncharted regions.
                            </div>
                            <div class="news-published-day" id="news_date">
                                Aug 18, 2023
                            </div>
                        </div>
                    </div>
                    
                    <div class="news-part">
                        <div class="news-image">
                            <img class="newsImage" src="images/news4.jpg" onclick="show_news_detail(this)" alt="news-image" srcset="">
                        </div>
                        <div class="news-text">
                            <div class="headline" onclick="appear(this)">
                                <p>Revolutionary Transportation System: Hyperloop Successfully Completes High-Speed Test</p>
                            </div>
                            <div class="news-detail" style="display: none;">
                                The hyperloop, a futuristic transportation concept, has achieved a significant milestone by successfully conducting a high-speed test. This innovation has the potential to revolutionize travel with its incredible speed and efficiency.
                            </div>
                            <div class="news-published-day" id="news_date">
                                Aug 25, 2023
                            </div>
                        </div>
                    </div>
                    
                    <div class="news-part">
                        <div class="news-image">
                            <img class="newsImage" src="images/news5.jpg" onclick="show_news_detail(this)" alt="news-image" srcset="">
                        </div>
                        <div class="news-text">
                            <div class="headline" onclick="appear(this)">
                                <p>Artificial Intelligence Creates Original Masterpiece Sold for Millions</p>
                            </div>
                            <div class="news-detail" style="display: none;">
                                A painting created entirely by an artificial intelligence algorithm has been sold at a prestigious art auction for a staggering amount. This raises questions about the intersection of creativity, technology, and art.
                            </div>
                            <div class="news-published-day" id="news_date">
                                Sep 2, 2023
                            </div>
                        </div>
                    </div>
                    
                    <div class="news-part">
                        <div class="news-image">
                            <img class="newsImage" src="images/news6.jpg" onclick="show_news_detail(this)" alt="news-image" srcset="">
                        </div>
                        <div class="news-text">
                            <div class="headline" onclick="appear(this)">
                                <p>Breakthrough in Alzheimer's Research: New Drug Shows Promise in Slowing Cognitive Decline</p>
                            </div>
                            <div class="news-detail" style="display: none;">
                                Scientists have developed a novel drug that exhibits potential in slowing down the progression of Alzheimer's disease and preserving cognitive function. This development offers hope to millions affected by this devastating condition.
                            </div>
                            <div class="news-published-day" id="news_date">
                                Sep 8, 2023
                            </div>
                        </div>
                    </div>
                    
                    <div class="news-part">
                        <div class="news-image">
                            <img class="newsImage" src="images/news7.jpg" onclick="show_news_detail(this)" alt="news-image" srcset="">
                        </div>
                        <div class="news-text">
                            <div class="headline" onclick="appear(this)">
                                <p>Space Exploration Milestone: Astronauts Successfully Cultivate Crops on Mars</p>
                            </div>
                            <div class="news-detail" style="display: none;">
                                In a groundbreaking achievement, astronauts on a Mars mission have managed to cultivate crops in the planet's harsh environment. This achievement has significant implications for future long-duration space travel and colonization efforts.
                            </div>
                            <div class="news-published-day" id="news_date">
                                Sep 15, 2023
                            </div>
                        </div>
                    </div>
                   
            
                </div>
            
            </div> -->

            <!-- <div id="newsPlaceholder">
                <script src="js/news_loader.js"></script>
            </div> -->
            <?php
            $current_file = __FILE__;
            include("news_content.php");
            // echo $current_file;
            ?>
        </div>
    </main>

    <?php
    include('footer.php');
    ?>

    <script src="js/news.js"></script>
    <script src="js/behavior.js"></script>
</body>

</html>