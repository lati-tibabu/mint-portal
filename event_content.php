<div class="events">

    <div class="page_name event_title">
        Events
    </div>

    <div class="event_content">

        <div class="event upcoming">

            <div class="upcoming_title">
                <i class="fa-solid fa-circle"></i>
                Upcoming Events
            </div>
            <div class="upcoming_event_content">

                <?php

                include("../mint-portal/back_end/config.php");
                $query = "SELECT * FROM event where event_is_published = '1';";

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
                        echo '<div class="event-details">';
                        echo '<div class="event-image">';
                        echo '        <img src="back_end/images/event/' . $data[$i]['event_image'] . '" alt="" srcset="" class="upcoming-event-photo">';

                        // echo '<img src="https://img.freepik.com/free-photo/people-carrying-light-bulb-icons_53876-30639.jpg?w=996&t=st=1691135803~exp=1691136403~hmac=5d969674288074500acf50c6de11402fad32b8a20c1f96ce388a818d822deda5" alt="" class="upcoming-event-photo">';
                
                        echo '</div>';

                        // echo '<div class="event-icon">';
                        //     echo '<i class="fa-solid fa-calendar"></i>';
                        // echo '</div>';
                
                        echo '<div class="event-content-text">';
                        echo '<div class="event_headline_text">';
                        // echo 'Blockchain and Cryptocurrencies: The Future of Finance';
                        echo '            <p>' . $data[$i]['event_name'] . '</p>';
                        echo '</div>';

                        echo '<div class="upcoming_event_time">';
                        echo '<div class="event_date">';
                        // echo 'Sep 20, 2023';
                        echo substr($data[$i]["event_date"], 0, 10);
                        echo '</div>';
                        echo '<div class="event_time">';
                        // echo '11:30 AM';
                        substr($data[$i]["event_happen_date"], 11, 8);
                        echo '</div>';

                        // echo '<div class="event_time">';
                        // $data[$i]["event_location"];
                        // echo '</div>';

                        echo '</div>';

                        echo '<p>';
                        // echo "Join us for an in-depth discussion on the impact of blockchain and cryptocurrencies on the financial landscape. Discover the potential of decentralized finance and how digital currencies are reshaping the global economy. Don't miss out on this opportunity to understand the future of finance.";
                        echo $data[$i]['event_description'];
                        echo '</p>';
                        echo '</div>';
                        echo '</div>';

                        $home_page_news_cutOff++;

                        // if ($current_file == "C:\wamp64\www\mint-portal\\home.php" && $home_page_news_cutOff == 6) {
                        //     break;
                        // }
                
                    }
                } else {
                    echo "<h1 style='color: orange; font-size: 1.6rem; font-style: italic'>No Events</h1><br><hr>";
                }

                // echo $current_file;
                
                ?>
            </div>


        </div>

        <div class="event past"></div>

    </div>

</div>