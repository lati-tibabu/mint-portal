<script src="https://kit.fontawesome.com/cfee536f6f.js" crossorigin="anonymous" defer></script>
<div class="news">
    <?php
    if ($current_file != "C:\wamp64\www\mint-portal\\home.php") {
        echo '<div class="page-name">';
        echo '    <h1>';
        echo '        News';
        echo '    </h1>';
        echo '</div>';

        echo '<div class="search-bar">';
        echo '    <form action="#">';
        echo '        <input type="text" name="news-query" placeholder="Search news" required>';
        echo '        <button>';
        echo '            <i class="fa-solid fa-magnifying-glass"></i>';
        echo '        </button>';
        echo '    </form>';
        echo '</div>';
    }
    ?>
    <!-- <div class="page-name">
        <h1>
            News
        </h1>
    </div>
    <div class="search-bar">
        <form action="#">
            <input type="text" name="news-query" placeholder="Search news" required>
            <button>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div> -->
    <div class="news-content">

        <?php
        include("../mint-portal/back_end/config.php");
        $query = "SELECT * FROM news;";

        $result = mysqli_query($con, $query);

        $data = array();

        $count = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
                $count = $count + 1;
            }
        }

        //current home page directory C:\wamp64\www\mint-portal

        //if user is viewing news from home page only maximum of 6 latest 
        //news should be appeared to him for that i used home_page_news_cutOff variable
        //and by each iteration it will increase one by one after it reaches 6 the loop must 
        //break and if user want to view more news user should click more news to navigate
        //to news page and view all news.

        $home_page_news_cutOff = 0;
        $news_page_news_cutOff = 0;

        // echo "<h1>".ceil($count/8)."</h1>";

        if ($current_file != "C:\wamp64\www\mint-portal\\home.php") {
            $number_of_pages = ceil($count / 8);
        } else {
            $number_of_pages = 1;
        }

        echo "<p id='number_of_pages' style='display:none;'>" . $number_of_pages . "</p>";

        if ($count != 0) {
            for ($j = 1; $j <= $number_of_pages; $j++) {

                echo '<div id="page' . $j . '" class="news_page">';

                echo "<div class='pages'>";

                for ($i = $count - 1; $i >= 0; $i--) {

                    echo '<div class="news-part">';
                    echo '    <div class="news-image">';
                    echo '        <img class="newsImage" src="back_end/images/' . $data[$i]['news_image'] . '" alt="news-image" srcset="">';
                    echo '    </div>';
                    echo '    <div class="news-text">';
                    echo '        <div class="headline" onclick="detail_news(' . $data[$i]['news_id'] . ')">';
                    echo '            <p>' . $data[$i]['news_headline'] . '</p>';
                    echo '        </div>';
                    echo '        <div class="news-detail" style="display: none;">';
                    echo $data[$i]['news_detail'];
                    echo '        </div>';
                    echo '        <div class="news-published-day" id="news_date">';
                    echo '<i class="fa-solid fa-calendar-days"></i>' . substr($data[$i]["news_date"], 0, 10);
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';

                    $home_page_news_cutOff++;
                    $news_page_news_cutOff++;

                    if ($current_file == "C:\wamp64\www\mint-portal\\home.php" && $home_page_news_cutOff == 4) {
                        break;
                    }

                    if ($news_page_news_cutOff == 8) {
                        break;
                    }
                    // echo "<h1>" . $i . "</h1>";
                    $count = $i - 1;
                }

                // echo "<h1>" . $count . "</h1>";
                if ($current_file != "C:\wamp64\www\mint-portal\\home.php") {
                    echo "</div>";

                    echo '<div class="button-section">';
                    echo '    <button onclick="load_previous(' . $j . ')">';
                    // echo '        <i class="fa-solid fa-chevron-left"></i>';

                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>';

                    // echo 'Previous';
                    echo '    </button>';
                    echo '    <button onclick="load_next(' . $j . ')">';
                    // echo 'Next';
                    // echo '        <i class="fa-solid fa-chevron-right"></i>';

                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>';
                    echo '    </button>';
                    echo '</div>';

                    echo '</div>';
                }
            }
        } else {
            echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No News</h1><br><hr>";
        }

        // echo $current_file;

        ?>

        <!-- <div class="button-section">
            <button>
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button>
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div> -->
    </div>
    <div id="newsData" style="display: none;"></div>
</div>

<script>
    function load_previous(params) {
        let current_page = document.getElementById('page' + params);
        let prev_page = document.getElementById('page' + (parseInt(params) - 1));
        // alert(params);
        if (params - 1 != 0) {
            current_page.style.display = 'none';
            prev_page.style.display = 'block';
            // alert("there is previous page");
        } else {
            alert("there is no previous page");
        }
    }

    function load_next(params) {
        // alert(params);

        let current_page = document.getElementById('page' + params);
        let next_page = document.getElementById('page' + ((parseInt(params) + 1)));

        let news_page = document.getElementById('number_of_pages');
        total_new_page = news_page.textContent;

        if (params != total_new_page) {

            current_page.style.display = 'none';
            next_page.style.display = 'block';

            // alert("there is next page");
        } else {
            alert("there is no next page");
        }
    }

    function detail_news(params) {
        // if (confirm("Are you sure you want to delete this application?")) {
        window.location.href = 'news_detail?news_id=' + params;
        // }
    }
    // function load_previous(params) {
    //     alert(params);
    // }
</script>